<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    // Halaman detail event
    public function show(string $slug)
    {
        // Cari event berdasarkan slug, kalau tidak ada → 404
        $event = Event::where('slug', $slug)->firstOrFail();

        return view('events.show', compact('event'));
    }

    public function index(Request $request)
    {
        $query = Event::whereDate('event_date', '>=', today());

        // Filter kategori
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        // Search
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                ->orWhere('venue', 'like', '%' . $request->search . '%')
                ->orWhere('city',  'like', '%' . $request->search . '%');
            });
        }

        // Sort
        switch ($request->get('sort', 'date')) {
            case 'price_asc':
                $query->orderBy('price_start', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('price_start', 'desc');
                break;
            case 'popular':
                $query->orderBy('tickets_sold', 'desc');
                break;
            default:
                $query->orderBy('event_date', 'asc');
        }

        

        $events = $query->paginate(12)->withQueryString();

        return view('events.index', compact('events'));
    }

    // Halaman daftar semua kategori
    public function categories()
    {
        $categories = [
            ['name' => 'Concert',   'desc' => 'Live music from your favorite artists', 'color' => '#b45309'],
            ['name' => 'Festival',  'desc' => 'Multi-day music and arts experiences',  'color' => '#7c3aed'],
            ['name' => 'Comedy',    'desc' => 'Stand-up and comedy nights',            'color' => '#0891b2'],
            ['name' => 'Theatre',   'desc' => 'Plays, musicals, and performances',     'color' => '#be123c'],
            ['name' => 'Sports',    'desc' => 'Matches, runs, and competitions',       'color' => '#065f46'],
            ['name' => 'DJ Club',   'desc' => 'Electronic nights and club events',     'color' => '#4338ca'],
            ['name' => 'Arts',      'desc' => 'Exhibitions and cultural events',       'color' => '#a16207'],
        ];

        // Hitung jumlah event per kategori
        foreach ($categories as &$cat) {
            $cat['count'] = Event::where('category', $cat['name'])
                                ->whereDate('event_date', '>=', today())
                                ->count();
        }

        return view('pages.categories', compact('categories'));
    }

    public function nearby(Request $request)
    {
        $cities = [
            'Jakarta', 'Surabaya', 'Bandung', 'Medan', 'Semarang',
            'Makassar', 'Palembang', 'Tangerang', 'Depok', 'Bekasi',
            'Yogyakarta', 'Malang', 'Denpasar', 'Bali', 'Balikpapan',
            'Manado', 'Padang', 'Pekanbaru', 'Bogor', 'Batam',
        ];

        $query = Event::whereDate('event_date', '>=', today());

        if ($request->filled('city')) {
            $query->where('city', $request->city);
        }

        $events = $query->orderBy('event_date')->get();

        return view('pages.nearby', compact('events', 'cities'));
    }
}