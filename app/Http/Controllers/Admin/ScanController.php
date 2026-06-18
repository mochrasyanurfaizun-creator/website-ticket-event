<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class ScanController extends Controller
{
    // Halaman scanner
    public function index()
    {
        return view('admin.scan.index');
    }

    public function check(Request $request)
    {
        $code = trim($request->input('code', ''));

        $order = Order::with('event')->where('order_code', $code)->first();

        if (!$order) {
            return response()->json([
                'status'  => 'invalid',
                'message' => 'Tiket tidak ditemukan.',
            ]);
        }

        if ($order->status === 'cancelled') {
            return response()->json([
                'status'  => 'cancelled',
                'message' => 'Tiket ini sudah dibatalkan.',
                'order'   => $this->orderData($order),
            ]);
        }

        if ($order->status === 'used') {
            return response()->json([
                'status'  => 'used',
                'message' => 'Tiket ini SUDAH dipakai masuk.',
                'order'   => $this->orderData($order),
            ]);
        }

        // Valid tapi BELUM diubah — tunggu konfirmasi
        return response()->json([
            'status'  => 'valid',
            'message' => 'Tiket valid. Konfirmasi untuk meloloskan.',
            'order'   => $this->orderData($order),
        ]);
    }

// Konfirmasi masuk — BARU ubah status jadi used
public function confirm(Request $request)
{
    $code = trim($request->input('code', ''));

    $order = Order::with('event')->where('order_code', $code)->first();

    if (!$order) {
        return response()->json([
            'status'  => 'invalid',
            'message' => 'Tiket tidak ditemukan.',
        ]);
    }

    // Pastikan masih valid (belum keduluan orang lain)
    if ($order->status !== 'confirmed') {
        return response()->json([
            'status'  => $order->status === 'used' ? 'used' : 'cancelled',
            'message' => $order->status === 'used'
                ? 'Tiket sudah dipakai.' : 'Tiket dibatalkan.',
            'order'   => $this->orderData($order),
        ]);
    }

    $order->update(['status' => 'used']);

    return response()->json([
        'status'  => 'done',
        'message' => 'Tiket diloloskan. Selamat datang!',
        'order'   => $this->orderData($order),
    ]);
}

    private function orderData(Order $order): array
    {
        return [
            'code'     => $order->order_code,
            'event'    => $order->event->title ?? '—',
            'buyer'    => $order->buyer_name ?? $order->user->name ?? '—',
            'type'     => $order->ticket_type_name ?? 'Regular',
            'quantity' => $order->quantity,
        ];
    }
}