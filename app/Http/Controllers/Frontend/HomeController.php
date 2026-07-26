<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CareService;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    public function index()
    {
        $careServices = CareService::where('care_services_status', '1')
            ->latest()
            ->get();
        return view('frontend.pages.home.index', compact('careServices'));
    }


    /**
     * Display the user's profile form.
     */
    public function userProfile()
    {
        $user = auth()->user();
        if (!$user) {
            return redirect()->route('login');
        }
        $order_inf = $user->orders()
            ->with('careService') // relation load
            ->latest()
            ->get();
        // dd($order_inf);

        return view('frontend.pages.profile.index', compact('user', 'order_inf'));
    }

    public function userOrders()
    {
        $user = auth()->user();
        if (!$user) {
            return redirect()->route('login');
        }

        $orders = $user->orders()
            ->with('careService')
            ->latest()
            ->take(10)
            ->get();

        return view('frontend.pages.order', compact('orders'));
    }
}
