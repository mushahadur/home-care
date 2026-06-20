<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use App\Models\CareService;
use App\Http\Requests\Pages\PlaceOrderRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function getOrder($id)
    {
        $careService = CareService::findOrFail($id);
        return view('frontend.pages.purchase', compact('careService'));
    }
    public function purchase($id)
    {
        $careService = CareService::findOrFail($id);
        return view('frontend.pages.purchase', compact('careService'));
    }

    public function serviceDetails($id)
    {
        $service = CareService::findOrFail($id);
        return view('frontend.pages.service.details', compact('service'));
    }
    public function placeOrder(PlaceOrderRequest $request)
    {
        // dd($request->all());
        DB::beginTransaction();

        try {
            // 1. Resolve User
            $user = Auth::user();
            if (!$user) {
                if (!$user) {
                    $user = User::create([
                        'name'         => $request-> patient_name,
                        'email'        => $request->email,
                        'phone'        => $request->phone,
                        'address'      => $request->address,
                        'password'     => bcrypt($request->phone),
                        'is_verified'  => false, 
                        'default_role' => 'user',
                    ]);
                    // dd($user);
                    // Spatie role assign
                    $user->assignRole('user');
                }
                // Auto login
                Auth::login($user);
            }

            // 2. Upload Prescription (if exists)
            $prescriptionPath = null;

            if ($request->hasFile('prescription')) {
                $prescriptionPath = $this->uploadFileImage($request->file('prescription'));
            }
            // dd($prescriptionPath);

            $service = CareService::findOrFail($request->service_id);
            $priceMap = [
                'single'      => 'single_services_price',
                'triple'      => 'triple_services_price',
                'seven_days'  => 'seven_services_price',
            ];
            if (!array_key_exists($request->service, $priceMap)) {
                abort(400, 'Invalid service plan');
            }
            $getPrice = $service->{$priceMap[$request->service]};
            // dd($getPrice);
            // 3. Save Order
            $order = Order::create([
                'user_id'         => auth()->id(),
                'care_service_id' => $request->service_id,
                'service_plan'    => $request->service,

                'total_price'     => $getPrice,
                'tax'             => $tax ?? 0,

                'preferred_date'  => $request->preferred_date,
                'preferred_time'  => $request->preferred_time,

                'prescription'    => $prescriptionPath,
                'notes'           => $request->additional_notes,
                'status'          => 'pending',

                'user_name'       => $request->patient_name,
                'user_email'      => $request->email,
                'user_phone'      => $request->phone,
                'user_address'    => $request->address,
            ]);
            // dd($order);

            DB::commit();

            return redirect()->route('user.profile')
                ->with('success', 'Order placed successfully!');
        } catch (\Exception $e) {
            DB::rollback();

            return back()->withInput()->with('error', $e->getMessage());
        }
    }

    protected function uploadFileImage($file)
    {
        $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $path = public_path('assets/user/prescriptions');

        if (!file_exists($path)) {
            mkdir($path, 0755, true);
        }

        $file->move($path, $filename);

        return 'assets/user/prescriptions/' . $filename;
    }

    public function store(Request $request)
    {
        // dd( $request->all());
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
        ]);

        // Check guest user
        if (!auth()->check()) {
            // Check if email already exists
            $existingUser = User::where('email', $request->email)->first();

            if ($existingUser) {
                $userId = $existingUser->id; // Use existing user
            } else {
                $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'password' => Hash::make($request->phone),
                ]);

                $userId = $user->id;
            }
        } else {
            $userId = auth()->id();
        }

        // FILE UPLOADS (same as before)
        $prescription = null;
        if ($request->hasFile('prescription')) {
            $prescription = $request->file('prescription')->store('uploads/prescriptions', 'public');
        }

        $otherDocs = [];
        if ($request->hasFile('other_documents')) {
            foreach ($request->file('other_documents') as $doc) {
                $otherDocs[] = $doc->store('uploads/documents', 'public');
            }
        }

        // Create ORDER
        $order = Order::create([
            'user_id' => $userId,

            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,

            'payment_method' => $request->payment_method,
            'card_number' => $request->card_number,
            'expiry' => $request->expiry,
            'cvv' => $request->cvv,
            'card_name' => $request->card_name,

            'notes' => $request->notes,
            'prescription' => $prescription,
            'other_documents' => $otherDocs,

            'service_id' => $request->service_id,
            'service_charge' => $request->service_charge,
            'tax' => $request->tax,
            'total' => $request->total,
        ]);
        $orderId = $order->id;

        return redirect()
            ->route('order.track', $orderId)
            ->with('success', 'Order placed successfully!');
    }
    public function orderTrack($id)
    {
        $services = Order::with('service')->findOrFail($id);
        // dd( $service);
        return view('frontend.pages.place-order.track-order', compact('services'));
    }
}
