<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CareService;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
     public function index()
     {
          $careServices = CareService::get();
          // dd( $careService);
          return view('frontend.pages.home.index', compact('careServices'));
     }
     public function service()
     {
          $careServices = CareService::get();
          // dd( $careServices);
          // return view('frontend.pages.service.index', compact('careServices'));
          return view('frontend.pages.purchase');
     }
         public function order()
     {
          $careServices = CareService::get();
          // dd( $careServices);
          // return view('frontend.pages.service.index', compact('careServices'));
          return view('frontend.pages.order');
     }
            public function profile()
     {
          $careServices = CareService::get();
          // dd( $careServices);
          // return view('frontend.pages.service.index', compact('careServices'));
          return view('frontend.pages.profile');
     }



     public function serviceDetails($id)
     {
          $service = CareService::findOrFail($id);
          return view('frontend.pages.service.details', compact('service'));
     }
     public function placeOrder($id)
     {
          $service = CareService::findOrFail($id);
          // dd( $service);
          return view('frontend.pages.place-order.index', compact('service'));
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
