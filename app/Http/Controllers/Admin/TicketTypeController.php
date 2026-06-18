<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\TicketType;
use Illuminate\Http\Request;

class TicketTypeController extends Controller
{
    // Halaman kelola tiket untuk satu event
    public function index(Event $event)
    {
        $event->load('ticketTypes');
        return view('admin.tickets.index', compact('event'));
    }

    // Simpan semua tipe tiket sekaligus
    public function sync(Request $request, Event $event)
    {
        $validated = $request->validate([
            'types'             => 'array',
            'types.*.id'        => 'nullable|integer',
            'types.*.name'      => 'required|string|max:100',
            'types.*.price'     => 'required|numeric|min:0',
            'types.*.quota'     => 'required|integer|min:0',
        ]);

        $types = $validated['types'] ?? [];
        $keepIds = [];

        foreach ($types as $i => $row) {
            $ticket = $event->ticketTypes()->updateOrCreate(
                ['id' => $row['id'] ?? null],
                [
                    'name'       => $row['name'],
                    'price'      => $row['price'],
                    'quota'      => $row['quota'],
                    'sort_order' => $i,
                ]
            );
            $keepIds[] = $ticket->id;
        }

        // Hapus tipe tiket yang dihapus dari form
        $event->ticketTypes()->whereNotIn('id', $keepIds)->delete();

        return redirect()
            ->route('admin.events.tickets.index', $event)
            ->with('success', 'Tipe tiket berhasil disimpan.');
    }
}