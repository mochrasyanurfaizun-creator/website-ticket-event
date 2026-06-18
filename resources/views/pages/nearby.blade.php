<x-app-layout>
    <x-slot name="title">Nearby Events — TIXLY</x-slot>

    <div class="cat-page">

        {{-- Header --}}
        <div class="cat-header">
            <div class="section-wrap">
                <span class="section-eyebrow">Nearby</span>
                <h1 class="cat-page-title">Events Near You</h1>
                <p class="cat-page-sub">Temukan event di kotamu</p>
            </div>
        </div>

        <div class="section-wrap cat-body">

            {{-- Filter kota --}}
            <form method="GET" class="nearby-filter">
                <label class="form-label" for="city">Pilih Kota</label>
                <div class="nearby-filter-row">
                    <select name="city" id="city" class="filter-select" onchange="this.form.submit()">
                        <option value="">Semua Kota</option>
                        @foreach($cities as $c)
                            <option value="{{ $c }}" {{ request('city') === $c ? 'selected' : '' }}>
                                {{ $c }}
                            </option>
                        @endforeach
                    </select>
                    @if(request('city'))
                        <a href="{{ route('nearby') }}" class="admin-action-btn">Reset</a>
                    @endif
                </div>
            </form>

            {{-- Hasil --}}
            @if($events->count() > 0)
                <div class="event-grid" style="margin-top:32px;">
                    @foreach($events as $event)
                        <a href="{{ route('events.show', $event->slug) }}" class="event-card">
                            <div class="card-visual"
                                 style="--card-bg: {{ $event->accent_color }}; --card-img: url('{{ $event->image }}')">
                                <span class="card-category">{{ $event->category }}</span>
                                <span class="card-date">{{ $event->event_date->format('d M') }}</span>
                            </div>
                            <div class="card-info">
                                <h3 class="card-title">{{ $event->title }}</h3>
                                <span class="card-venue">
                                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none"
                                         stroke="currentColor" stroke-width="2">
                                        <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z"/>
                                        <circle cx="12" cy="9" r="2.5"/>
                                    </svg>
                                    {{ $event->venue }}, {{ $event->city }}
                                </span>
                                <div class="card-footer">
                                    <span class="card-price">{{ $event->formatted_price }}</span>
                                    <span class="card-cta">View →</span>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            @else
                <div class="events-empty" style="margin-top:32px;">
                    <div class="empty-icon">
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="1.2">
                            <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z"/>
                            <circle cx="12" cy="9" r="2.5"/>
                        </svg>
                    </div>
                    <h2 class="empty-title">Belum ada event</h2>
                    <p class="empty-sub">
                        @if(request('city'))
                            Tidak ada event di {{ request('city') }} saat ini. Coba kota lain.
                        @else
                            Belum ada event mendatang. Cek lagi nanti!
                        @endif
                    </p>
                </div>
            @endif

        </div>
    </div>

</x-app-layout>