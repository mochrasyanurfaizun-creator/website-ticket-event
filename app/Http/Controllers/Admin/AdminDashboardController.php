<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Order;
use App\Models\User;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_events'  => Event::count(),
            'total_orders'  => Order::count(),
            'total_users'   => User::count(),
            'total_revenue' => Order::where('status', '!=', 'cancelled')
                                    ->sum('total_price'),
            'tickets_sold'  => Order::sum('quantity'),
        ];

        $recentOrders = Order::with(['event', 'user'])
                             ->latest()
                             ->limit(8)
                             ->get();

        return view('admin.dashboard', compact('stats', 'recentOrders'));
    }
}