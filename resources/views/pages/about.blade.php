<x-app-layout>
    <x-slot name="title">About — TIXLY</x-slot>

    <div class="about-page">

        {{-- HERO --}}
        <section class="about-hero">
            <div class="about-hero-bg"></div>
            <div class="section-wrap about-hero-content">
                <span class="section-eyebrow">Our Story</span>
                <h1 class="about-hero-title">
                    Every great night<br>
                    <em>starts with a ticket.</em>
                </h1>
                <p class="about-hero-sub">
                    TIXLY connects people with the live experiences they love —
                    from intimate gigs to sold-out festivals across Indonesia.
                </p>
            </div>
        </section>

        {{-- MISSION --}}
        <section class="about-section">
            <div class="section-wrap">
                <div class="about-mission">
                    <div class="about-mission-text">
                        <span class="section-eyebrow">Our Mission</span>
                        <h2 class="about-section-title">
                            Making live events accessible to everyone
                        </h2>
                        <p class="about-paragraph">
                            We believe live music and events bring people together
                            like nothing else. Our mission is to make discovering and
                            booking tickets effortless — no hidden fees, no confusion,
                            just a few taps between you and your next unforgettable night.
                        </p>
                        <p class="about-paragraph">
                            Since launching, we've helped thousands of fans find their
                            seats and helped artists fill their rooms.
                        </p>
                    </div>
                    <div class="about-mission-visual">
                        <div class="about-quote-card">
                            <span class="about-quote-mark">"</span>
                            <p class="about-quote">
                                The best memories happen when the lights go down
                                and the crowd goes quiet.
                            </p>
                            <span class="about-quote-author">— The TIXLY Team</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- STATS --}}
        <section class="about-stats">
            <div class="section-wrap">
                <div class="about-stats-grid">
                    <div class="about-stat">
                        <span class="about-stat-num">2,400+</span>
                        <span class="about-stat-label">Events listed</span>
                    </div>
                    <div class="about-stat">
                        <span class="about-stat-num">180K</span>
                        <span class="about-stat-label">Tickets sold</span>
                    </div>
                    <div class="about-stat">
                        <span class="about-stat-num">320+</span>
                        <span class="about-stat-label">Partner venues</span>
                    </div>
                    <div class="about-stat">
                        <span class="about-stat-num">4.9</span>
                        <span class="about-stat-label">App rating</span>
                    </div>
                </div>
            </div>
        </section>

        {{-- VALUES --}}
        <section class="about-section">
            <div class="section-wrap">
                <div class="about-section-head">
                    <span class="section-eyebrow">What We Value</span>
                    <h2 class="about-section-title">The principles behind TIXLY</h2>
                </div>

                <div class="about-values">
                    <div class="about-value">
                        <div class="about-value-icon">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none"
                                 stroke="currentColor" stroke-width="1.6">
                                <circle cx="12" cy="12" r="10"/>
                                <path d="M12 6v6l4 2"/>
                            </svg>
                        </div>
                        <h3 class="about-value-title">Transparency</h3>
                        <p class="about-value-desc">
                            No hidden fees, no surprises. The price you see is the
                            price you pay.
                        </p>
                    </div>

                    <div class="about-value">
                        <div class="about-value-icon">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none"
                                 stroke="currentColor" stroke-width="1.6">
                                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                            </svg>
                        </div>
                        <h3 class="about-value-title">Security</h3>
                        <p class="about-value-desc">
                            Every transaction is protected. Your tickets and data
                            are always safe with us.
                        </p>
                    </div>

                    <div class="about-value">
                        <div class="about-value-icon">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none"
                                 stroke="currentColor" stroke-width="1.6">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                                <circle cx="9" cy="7" r="4"/>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
                            </svg>
                        </div>
                        <h3 class="about-value-title">Community</h3>
                        <p class="about-value-desc">
                            We're built for fans and artists alike — bringing people
                            together through live experiences.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        {{-- CTA --}}
        <section class="about-cta">
            <div class="section-wrap">
                <h2 class="about-cta-title">Ready to find your next event?</h2>
                <p class="about-cta-sub">
                    Thousands of live experiences are waiting for you.
                </p>
                <a href="{{ route('events.index') }}" class="btn-hero-primary">
                    Browse Events
                </a>
            </div>
        </section>

    </div>

</x-app-layout>