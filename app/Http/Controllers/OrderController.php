<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function checkout(Request $request, string $slug)
    {
        $event = Event::where('slug', $slug)->with('ticketTypes')->firstOrFail();

        $typeId = $request->get('type');
        $ticketType = $event->ticketTypes->firstWhere('id', $typeId)
                    ?? $event->ticketTypes->first();

        if (!$ticketType) {
            return redirect()->route('events.show', $slug)
                            ->withErrors(['ticket' => 'Tipe tiket tidak tersedia.']);
        }

        // ── Tolak kalau tipe tiket sudah sold out
        if ($ticketType->is_sold_out) {
            return redirect()->route('events.show', $slug)
                            ->withErrors(['ticket' => "Tiket {$ticketType->name} sudah habis."]);
        }

        $quantity = (int) $request->get('qty', 1);
        $quantity = max(1, min(10, $quantity));

        // ── Jangan biarkan quantity melebihi sisa stok
        if ($quantity > $ticketType->remaining) {
            $quantity = $ticketType->remaining;
        }

        $total = $ticketType->price * $quantity;

        return view('checkout.show', compact('event', 'ticketType', 'quantity', 'total'));
    }

    public function store(Request $request, string $slug)
    {
        $event = Event::where('slug', $slug)->firstOrFail();

        $validated = $request->validate([
            'ticket_type_id' => 'required|exists:ticket_types,id',
            'buyer_name'     => 'required|string|max:255',
            'buyer_email'    => 'required|email|max:255',
            'buyer_phone'    => 'required|string|max:20',
            'quantity'       => 'required|integer|min:1|max:10',
            'payment_method' => 'required|string',
        ], [
            'buyer_name.required'  => 'Nama lengkap wajib diisi.',
            'buyer_email.required' => 'Email wajib diisi.',
            'buyer_phone.required' => 'Nomor HP wajib diisi.',
        ]);

        $ticketType = \App\Models\TicketType::findOrFail($validated['ticket_type_id']);
        $quantity = (int) $validated['quantity'];

        // ── Pastikan tipe tiket ini milik event yang benar
        if ($ticketType->event_id !== $event->id) {
            return back()->withErrors([
                'ticket_type_id' => 'Tipe tiket tidak valid untuk event ini.',
            ])->withInput();
        }

        // ── CEK SOLD OUT (penting!)
        if ($ticketType->is_sold_out) {
            return back()->withErrors([
                'quantity' => "Tiket {$ticketType->name} sudah habis terjual.",
            ])->withInput();
        }

        // ── CEK STOK CUKUP untuk jumlah yang diminta
        if ($quantity > $ticketType->remaining) {
            return back()->withErrors([
                'quantity' => "Hanya tersisa {$ticketType->remaining} tiket {$ticketType->name}.",
            ])->withInput();
        }

        $total = $ticketType->price * $quantity;

        $order = Order::create([
            'user_id'          => Auth::id(),
            'buyer_name'       => $validated['buyer_name'],
            'buyer_email'      => $validated['buyer_email'],
            'buyer_phone'      => $validated['buyer_phone'],
            'event_id'         => $event->id,
            'ticket_type_id'   => $ticketType->id,
            'ticket_type_name' => $ticketType->name,
            'order_code'       => 'TIX-' . strtoupper(Str::random(8)),
            'quantity'         => $quantity,
            'total_price'      => $total,
            'status'           => 'confirmed',
        ]);

        for ($i = 1; $i <= $quantity; $i++) {
            \App\Models\Ticket::create([
                'order_id'    => $order->id,
                'ticket_code' => $order->order_code . '-' . $i,
                'status'      => 'valid',
            ]);
        }

        $ticketType->increment('sold', $quantity);
        $event->increment('tickets_sold', $quantity);

        return redirect()->route('checkout.success', $order->order_code);
    }

    // Halaman sukses
    public function success(string $orderCode)
    {
        $order = Order::where('order_code', $orderCode)
                      ->where('user_id', Auth::id())
                      ->with('event')
                      ->firstOrFail();

        return view('checkout.success', compact('order'));
    }

    public function ticket(string $orderCode)
    {
        $order = Order::where('order_code', $orderCode)
                    ->where('user_id', Auth::id())
                    ->with(['event', 'tickets'])
                    ->firstOrFail();

        return view('tickets.show', compact('order'));
    }
}