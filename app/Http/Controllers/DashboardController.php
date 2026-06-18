<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Ambil order dengan data event-nya
        $orders = $user->orders()->with('event')->get();

        // Pisahkan tiket mendatang dan lampau
        $upcoming = $orders->filter(fn($o) =>
            $o->event && $o->event->event_date >= now()
        );
        $past = $orders->filter(fn($o) =>
            $o->event && $o->event->event_date < now()
        );

        $stats = [
        ];

        return view('dashboard', compact('user', 'upcoming', 'past', 'stats'));
    }
}