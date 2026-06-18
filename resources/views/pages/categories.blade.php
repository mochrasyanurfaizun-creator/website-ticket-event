<x-app-layout>
    <x-slot name="title">Browse Categories — TIXLY</x-slot>

    <div class="cat-page">

        {{-- Header --}}
        <div class="cat-header">
            <div class="section-wrap">
                <span class="section-eyebrow">Explore</span>
                <h1 class="cat-page-title">Browse by category</h1>
                <p class="cat-page-sub">
                    Find exactly what you're in the mood for
                </p>
            </div>
        </div>

        {{-- Grid --}}
        <div class="section-wrap cat-body">
            <div class="cat-grid">
                @foreach($categories as $cat)
                    <a href="{{ route('events.index', ['category' => $cat['name']]) }}"
                       class="cat-card"
                       style="--cat-color: {{ $cat['color'] }}">

                        <div class="cat-card-glow"></div>

                        <div class="cat-card-content">
                            <div class="cat-card-top">
                                <span class="cat-card-count">
                                    {{ $cat['count'] }} {{ Str::plural('event', $cat['count']) }}
                                </span>
                            </div>

                            <div class="cat-card-bottom">
                                <h3 class="cat-card-name">{{ $cat['name'] }}</h3>
                                <p class="cat-card-desc">{{ $cat['desc'] }}</p>
                                <span class="cat-card-link">
                                    Explore
                                    <svg width="14" height="14" viewBox="0 0 24 24"
                                         fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M5 12h14M12 5l7 7-7 7"/>
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>

    </div>

</x-app-layout>