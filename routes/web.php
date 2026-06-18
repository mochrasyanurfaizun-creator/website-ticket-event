<?php

use Illuminate\Support\Facades\Route;
use App\Models\Event;
use App\Http\Controllers\EventController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\EventController as AdminEventController;

Route::get('/', function () {
    $featuredEvents = Event::featured()->limit(4)->get();
    $trendingEvent  = Event::trending()->first();
    return view('welcome', compact('featuredEvents', 'trendingEvent'));
});

Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::get('/events/{slug}', [EventController::class, 'show'])->name('events.show');

// Static pages
Route::get('/terms', fn() => view('legal.terms'))->name('terms');
Route::get('/privacy', fn() => view('legal.privacy'))->name('privacy');

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/ticket/{orderCode}', [OrderController::class, 'ticket'])
    ->name('ticket.show');

Route::get('/categories', [EventController::class, 'categories'])->name('categories');
Route::get('/nearby', [EventController::class, 'nearby'])->name('nearby');

Route::get('/about', fn() => view('pages.about'))->name('about');
Route::get('/refund-policy', fn() => view('legal.refund'))->name('refund');
Route::view('/contact', 'pages.contact')->name('contact');
Route::view('/help', 'pages.help')->name('help');
Route::view('/careers', 'pages.careers')->name('careers');
Route::view('/press', 'pages.press')->name('press');

// Profile (Breeze) + Checkout
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/checkout/{slug}', [OrderController::class, 'checkout'])->name('checkout.show');
    Route::post('/checkout/{slug}', [OrderController::class, 'store'])->name('checkout.store');
    Route::get('/order/{orderCode}/success', [OrderController::class, 'success'])->name('checkout.success');
});

// Admin
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::get('/events', [AdminEventController::class, 'index'])->name('events.index');
    Route::get('/events/create', [AdminEventController::class, 'create'])->name('events.create');
    Route::post('/events', [AdminEventController::class, 'store'])->name('events.store');
    Route::get('/events/{event}/edit', [AdminEventController::class, 'edit'])->name('events.edit');
    Route::put('/events/{event}', [AdminEventController::class, 'update'])->name('events.update');
    Route::delete('/events/{event}', [AdminEventController::class, 'destroy'])->name('events.destroy');
    Route::get('/orders', [\App\Http\Controllers\Admin\OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}', [\App\Http\Controllers\Admin\OrderController::class, 'show'])->name('orders.show');
    Route::patch('/orders/{order}/status', [\App\Http\Controllers\Admin\OrderController::class, 'updateStatus'])->name('orders.status');
    Route::get('/scan', [\App\Http\Controllers\Admin\ScanController::class, 'index'])->name('scan.index');
    Route::post('/scan/check', [\App\Http\Controllers\Admin\ScanController::class, 'check'])->name('scan.check');
    Route::post('/scan/confirm', [\App\Http\Controllers\Admin\ScanController::class, 'confirm'])->name('scan.confirm');
    Route::get('/events/{event}/tickets', [\App\Http\Controllers\Admin\TicketTypeController::class, 'index'])->name('events.tickets.index');
    Route::post('/events/{event}/tickets', [\App\Http\Controllers\Admin\TicketTypeController::class, 'sync'])->name('events.tickets.sync');
    Route::get('/logs', [\App\Http\Controllers\Admin\AuditLogController::class, 'index'])->name('logs.index');
});

require __DIR__.'/auth.php';