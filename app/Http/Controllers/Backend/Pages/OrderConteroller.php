<?php

namespace App\Http\Controllers\Backend\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderConteroller extends Controller
{
    public function index(Request $request)
    {
        $orders = Order::with('careService')->latest()->paginate(5);
        return view('backend.pages.orders.index', compact('orders'))->with('i', ($request->input('page', 1) - 1) * 5);
    }



}
