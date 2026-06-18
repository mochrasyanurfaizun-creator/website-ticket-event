<section class="featured">
    <hr class="section-rule">
    <div class="section-wrap">

        <div class="section-head">
            <div class="section-head-left">
                <span class="section-eyebrow">Featured</span>
                <h2 class="section-title">Most-wanted tickets</h2>
            </div>
            <a href="{{ route('events.index') }}" class="view-all-btn">
                View all
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2">
                    <path d="M5 12h14M12 5l7 7-7 7"/>
                </svg>
            </a>
        </div>

        <div class="event-grid">
            @forelse ($events as $event)
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
            @empty
                <p class="no-events">Belum ada event tersedia.</p>
            @endforelse
        </div>

    </div>
</section>