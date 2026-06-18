<x-app-layout>
    <x-slot name="title">All Events — TIXLY</x-slot>

    <div class="events-page">

        {{-- ── PAGE HEADER ── --}}
        <div class="events-header">
            <div class="events-header-inner">
                <div class="events-header-text">
                    <span class="section-eyebrow">Browse</span>
                    <h1 class="events-page-title">All Events</h1>
                    <p class="events-page-sub">
                        {{ $events->total() }} events found
                        @if(request('search'))
                            for "{{ request('search') }}"
                        @endif
                    </p>
                </div>
            </div>
        </div>

        {{-- ── FILTER BAR ── --}}
        <div class="filter-bar-wrap">
            <div class="section-wrap">
                <form method="GET" action="{{ route('events.index') }}"
                      class="filter-bar" id="filterForm">

                    {{-- Search --}}
                    <div class="filter-search">
                        <svg width="15" height="15" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor" stroke-width="1.8">
                            <circle cx="11" cy="11" r="8"/>
                            <path d="m21 21-4.35-4.35"/>
                        </svg>
                        <input type="text"
                               name="search"
                               class="filter-search-input"
                               placeholder="Search events..."
                               value="{{ request('search') }}">
                    </div>

                    {{-- Category Filter --}}
                    <div class="filter-cats">
                        @php
                            $categories = ['All', 'Concert', 'Festival', 'Comedy',
                                           'Theatre', 'Sports', 'DJ Club', 'Arts'];
                        @endphp
                        @foreach($categories as $cat)
                            <button type="submit"
                                    name="category"
                                    value="{{ $cat === 'All' ? '' : $cat }}"
                                    class="filter-pill {{ request('category', '') === ($cat === 'All' ? '' : $cat) ? 'active' : '' }}">
                                {{ $cat }}
                            </button>
                        @endforeach
                    </div>

                    {{-- Sort --}}
                    <select name="sort" class="filter-select"
                            onchange="this.form.submit()">
                        <option value="date"
                            {{ request('sort','date') === 'date' ? 'selected' : '' }}>
                            Date
                        </option>
                        <option value="price_asc"
                            {{ request('sort') === 'price_asc' ? 'selected' : '' }}>
                            Price: Low
                        </option>
                        <option value="price_desc"
                            {{ request('sort') === 'price_desc' ? 'selected' : '' }}>
                            Price: High
                        </option>
                        <option value="popular"
                            {{ request('sort') === 'popular' ? 'selected' : '' }}>
                            Popular
                        </option>
                    </select>

                </form>
            </div>
        </div>

        {{-- ── EVENT GRID ── --}}
        <div class="section-wrap" style="padding-bottom: 80px;">

            @if($events->count() > 0)
                <div class="events-index-grid">
                    @foreach($events as $event)
                        <a href="{{ route('events.show', $event->slug) }}"
                            class="event-card"
                            style="--card-bg: {{ $event->accent_color }}; --card-img: url('{{ $event->image }}')">

                            <div class="card-visual">
                                <span class="card-category">{{ $event->category }}</span>
                                <span class="card-date">{{ $event->short_date }}</span>
                            </div>

                            <div class="card-info">
                                <h3 class="card-title">{{ $event->title }}</h3>
                                <p class="card-venue">
                                    <svg width="11" height="11" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2.5">
                                        <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z"/>
                                        <circle cx="12" cy="9" r="2.5"/>
                                    </svg>
                                    {{ $event->venue }}, {{ $event->city }}
                                </p>

                                <div class="card-footer">
                                    <span class="card-price">{{ $event->formatted_price }}</span>
                                    <span class="card-cta">Get tickets →</span>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>

                {{-- Pagination --}}
                @if($events->hasPages())
                    <div class="pagination-wrap">
                        {{-- Previous --}}
                        @if($events->onFirstPage())
                            <span class="page-btn disabled">← Prev</span>
                        @else
                            <a href="{{ $events->previousPageUrl() }}"
                               class="page-btn">← Prev</a>
                        @endif

                        {{-- Page Numbers --}}
                        @foreach($events->getUrlRange(1, $events->lastPage()) as $page => $url)
                            @if($page == $events->currentPage())
                                <span class="page-btn active">{{ $page }}</span>
                            @else
                                <a href="{{ $url }}" class="page-btn">{{ $page }}</a>
                            @endif
                        @endforeach

                        {{-- Next --}}
                        @if($events->hasMorePages())
                            <a href="{{ $events->nextPageUrl() }}"
                               class="page-btn">Next →</a>
                        @else
                            <span class="page-btn disabled">Next →</span>
                        @endif
                    </div>
                @endif

            @else
                {{-- Empty state --}}
                <div class="events-empty">
                    <div class="empty-icon">
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="1">
                            <rect x="3" y="4" width="18" height="18" rx="2"/>
                            <path d="M16 2v4M8 2v4M3 10h18"/>
                            <path d="M8 14h.01M12 14h.01M16 14h.01"/>
                        </svg>
                    </div>
                    <h3 class="empty-title">No events found</h3>
                    <p class="empty-sub">
                        Try adjusting your search or browse all categories.
                    </p>
                    <a href="{{ route('events.index') }}" class="btn-gold">
                        Clear Filters
                    </a>
                </div>
            @endif

        </div>

    </div>

</x-app-layout>