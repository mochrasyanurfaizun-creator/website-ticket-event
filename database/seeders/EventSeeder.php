<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;
use Illuminate\Support\Str;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        $events = [
        [
            'title'        => 'Synchronize Festival',
            'artist'       => 'Multi-genre Lineup',
            'category'     => 'Festival',
            'venue'        => 'Gambir Expo',
            'city'         => 'Jakarta',
            'event_date'   => '2026-06-14',
            'event_time'   => '14:00:00',
            'price_start'  => 350000,
            'capacity'     => 5000,
            'tickets_sold' => 3200,
            'description'  => 'Festival musik terbesar dengan 50+ artis lintas genre dalam satu panggung.',
            'accent_color' => '#6d28d9',
            'image_url'    => 'https://images.unsplash.com/photo-1470229722913-7c0e2dbbafd3?w=1600&q=80',
            'is_featured'  => true,
            'is_trending'  => false,
        ],
        [
            'title'        => 'HONNE Live in Jakarta',
            'artist'       => 'HONNE',
            'category'     => 'Concert',
            'venue'        => 'Tennis Indoor Senayan',
            'city'         => 'Jakarta',
            'event_date'   => '2026-06-18',
            'event_time'   => '19:00:00',
            'price_start'  => 750000,
            'capacity'     => 3000,
            'tickets_sold' => 2800,
            'description'  => 'Duo elektronik asal Inggris kembali menyapa penggemarnya di Jakarta.',
            'accent_color' => '#b45309',
            'image_url'    => 'https://images.unsplash.com/photo-1493225457124-a3eb161ffa5f?w=1600&q=80',
            'is_featured'  => true,
            'is_trending'  => false,
        ],
        [
            'title'        => 'Taman Safari Night Run',
            'artist'       => '5K & 10K Categories',
            'category'     => 'Sports',
            'venue'        => 'Taman Safari',
            'city'         => 'Bogor',
            'event_date'   => '2026-06-21',
            'event_time'   => '17:00:00',
            'price_start'  => 200000,
            'capacity'     => 2000,
            'tickets_sold' => 900,
            'description'  => 'Fun run malam hari menyusuri kawasan Taman Safari yang ikonik.',
            'accent_color' => '#065f46',
            'image_url'    => 'https://images.unsplash.com/photo-1452626038306-9aae5e071dd3?w=1600&q=80',
            'is_featured'  => true,
            'is_trending'  => false,
        ],
        [
            'title'        => 'Weird Genius: EPOCH Tour',
            'artist'       => 'Weird Genius',
            'category'     => 'Concert',
            'venue'        => 'ICE BSD',
            'city'         => 'Tangerang',
            'event_date'   => '2026-06-28',
            'event_time'   => '20:00:00',
            'price_start'  => 450000,
            'capacity'     => 8000,
            'tickets_sold' => 5500,
            'description'  => 'Tur perdana Weird Genius keliling Indonesia dengan visual spektakuler.',
            'accent_color' => '#92400e',
            'image_url'    => 'https://images.unsplash.com/photo-1571266028243-d220c9c3b31e?w=1600&q=80',
            'is_featured'  => true,
            'is_trending'  => false,
        ],
        [
            'title'        => 'Soundrenaline 2026',
            'artist'       => '100+ Artists',
            'category'     => 'Festival',
            'venue'        => 'GBK Senayan',
            'city'         => 'Jakarta',
            'event_date'   => '2026-07-04',
            'event_time'   => '13:00:00',
            'price_start'  => 850000,
            'capacity'     => 60000,
            'tickets_sold' => 41000,
            'description'  => 'Festival multi-genre terbesar Indonesia dengan lebih dari 100 penampil.',
            'accent_color' => '#7c3aed',
            'image_url'    => 'https://images.unsplash.com/photo-1540039155733-5bb30b53aa14?w=1600&q=80',
            'is_featured'  => true,
            'is_trending'  => true,
        ],
];

        foreach ($events as $event) {
            Event::create(array_merge($event, [
                'slug' => Str::slug($event['title']),
            ]));
        }
    }
}