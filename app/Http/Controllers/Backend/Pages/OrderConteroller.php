<?php

namespace App\Http\Controllers\Backend\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderConteroller extends Controller
{
    public function index(Request $request)
    {
        $orders = Order::with('careService', 'user')->latest()->paginate(5);
        // dd($orders->toArray());
         $stats = Order::query()
        ->selectRaw('COUNT(*) as total')
        ->selectRaw("COUNT(CASE WHEN status = 'pending' THEN 1 END) as pending")
        ->selectRaw("COUNT(CASE WHEN status = 'completed' THEN 1 END) as completed")
        ->first();
        return view('backend.pages.orders.index', compact('orders', 'stats'))->with('i', ($request->input('page', 1) - 1) * 5);
    }



}
