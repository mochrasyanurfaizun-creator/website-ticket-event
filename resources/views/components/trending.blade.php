@if($trendingEvent)
<section class="trending">
    <hr class="section-rule">
    <div class="section-wrap">

        <div class="section-head">
            <div class="section-head-left">
                <span class="section-eyebrow">Trending Now</span>
                <h2 class="section-title">Everyone's talking about</h2>
            </div>
        </div>

        <div class="trending-card">

            <div class="trending-visual"
                    style="--card-bg: {{ $trendingEvent->accent_color }}; --card-img: url('{{ $trendingEvent->image }}')">
                <div class="trending-badge">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                        <circle cx="9" cy="7" r="4"/>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/>
                    </svg>
                    {{ number_format($trendingEvent->tickets_sold) }}+ going fast
                </div>
            </div>

            <div class="trending-info">

                <div class="trending-meta">
                    <span class="trending-meta-tag">{{ $trendingEvent->category }}</span>
                    <span class="trending-meta-tag">
                        {{ $trendingEvent->event_date->format('d') }}–{{ $trendingEvent->event_date->addDay()->format('d M') }}
                    </span>
                </div>

                <h2 class="trending-title">{{ $trendingEvent->title }}</h2>

                <p class="trending-venue">
                    {{ $trendingEvent->event_date->format('F j') }} •
                    {{ $trendingEvent->venue }}, {{ $trendingEvent->city }}
                </p>

                <p class="trending-desc">{{ $trendingEvent->description }}</p>

                <div class="trending-footer">
                    <div class="trending-price">
                        <span class="price-label">from</span>
                        <span class="price-value">{{ $trendingEvent->formatted_price }}</span>
                    </div>
                    <a href="{{ route('events.show', $trendingEvent->slug) }}"
                       class="btn-gold">
                        Get Early Bird Tickets
                    </a>
                </div>

            </div>
        </div>

    </div>
</section>
@endif