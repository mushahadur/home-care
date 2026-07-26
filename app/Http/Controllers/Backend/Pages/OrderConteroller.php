<?php

namespace App\Http\Controllers\Backend\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;

class OrderConteroller extends Controller
{
    public function index(Request $request)
    {
        $usersWithOrderStats = User::whereHas('orders')
            ->withCount([
                'orders as total_orders',
                'orders as pending_orders' => function ($query) {
                    $query->where('status', 'Pending');
                },
                'orders as completed_orders' => function ($query) {
                    $query->where('status', 'Completed');
                }
            ])
            ->latest()
            ->paginate(5);

        return view('backend.pages.orders.index', compact('usersWithOrderStats'))->with('i', ($request->input('page', 1) - 1) * 5);
    }



    public function show(Request $request, int $userId)
    {
        // return "This is the show page for user with ID: " . $userId;
        // Fetch user or fail, ensuring orders and their dependent metadata are eager loaded
        $user = User::with(['orders.careService'])->findOrFail($userId);

        if ($request->ajax()) {
            return view('backend.pages.orders.order-modal-content', compact('user'))->render();
        }

        return view('backend.pages.orders.index', compact('user'));
    }
}

