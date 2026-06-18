<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::orderBy('event_date', 'desc')->paginate(15);
        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function store(Request $request)
    {
        $validated = $this->validateEvent($request, true);
        $validated['slug'] = $this->uniqueSlug($validated['title']);
        $validated['is_featured'] = $request->has('is_featured');
        $validated['is_trending'] = $request->has('is_trending');

        // Upload gambar
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('events', 'public');
            $validated['image_url'] = '/storage/' . $path;
        }
        unset($validated['image']);

        Event::create($validated);

        return redirect()->route('admin.events.index')
                        ->with('success', 'Event berhasil dibuat.');
    }

    public function edit(Event $event)
    {
        return view('admin.events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $validated = $this->validateEvent($request, false);
        $validated['is_featured'] = $request->has('is_featured');
        $validated['is_trending'] = $request->has('is_trending');

        if ($validated['title'] !== $event->title) {
            $validated['slug'] = $this->uniqueSlug($validated['title'], $event->id);
        }

        // Upload gambar baru kalau ada
        if ($request->hasFile('image')) {
            // Hapus gambar lama kalau itu file upload (bukan URL eksternal)
            if ($event->image_url && str_starts_with($event->image_url, '/storage/')) {
                \Storage::disk('public')->delete(str_replace('/storage/', '', $event->image_url));
            }
            $path = $request->file('image')->store('events', 'public');
            $validated['image_url'] = '/storage/' . $path;
        }
        unset($validated['image']);

        $event->update($validated);

        return redirect()->route('admin.events.index')
                        ->with('success', 'Event berhasil diperbarui.');
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('admin.events.index')
                         ->with('success', 'Event berhasil dihapus.');
    }

    // ── Validasi bersama untuk store & update
    private function validateEvent(Request $request, bool $isCreate = false): array
    {
        return $request->validate([
            'title'        => 'required|string|max:255',
            'artist'       => 'nullable|string|max:255',
            'category'     => 'required|string',
            'venue'        => 'required|string|max:255',
            'city'         => 'required|string|max:255',
            'event_date'   => 'required|date',
            'event_time'   => 'required',
            'timezone'     => 'required|in:WIB,WITA,WIT',
            'price_start'  => 'required|numeric|min:0',
            'capacity'     => 'required|integer|min:1',
            'tickets_sold' => 'nullable|integer|min:0',
            'description'  => 'nullable|string',
            'accent_color' => 'required|string',
            'image'        => ($isCreate ? 'required' : 'nullable') . '|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);
    }

    // ── Buat slug unik
    private function uniqueSlug(string $title, ?int $ignoreId = null): string
    {
        $base = Str::slug($title);
        $slug = $base;
        $i = 1;

        while (Event::where('slug', $slug)
                    ->when($ignoreId, fn($q) => $q->where('id', '!=', $ignoreId))
                    ->exists()) {
            $slug = $base . '-' . $i++;
        }

        return $slug;
    }

}