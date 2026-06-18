<footer class="footer">
    <div class="footer-container">

        {{-- Top: Brand + Links --}}
        <div class="footer-top">

            {{-- Brand --}}
            <div class="footer-brand">
                <a href="{{ url('/') }}" class="nav-logo" style="font-size:18px">
                    <span class=""></span>
                    TIXLY
                </a>
                <p class="footer-tagline">
                    Your one-stop platform for concerts,<br>
                    festivals, and live experiences.
                </p>
            </div>

            {{-- Links --}}
            <div class="footer-links-group">
                <div class="footer-col">
                    <h4 class="footer-col-title">Explore</h4>
                    <ul>
                        <li><a href="{{ route('events.index') }}" class="footer-link">All Events</a></li>
                        <li><a href="{{ route('events.index', ['category' => 'Concert']) }}" class="footer-link">Concerts</a></li>
                        <li><a href="{{ route('events.index', ['category' => 'Festival']) }}" class="footer-link">Festivals</a></li>
                        <li><a href="{{ route('events.index', ['category' => 'Comedy']) }}" class="footer-link">Comedy</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4 class="footer-col-title">Company</h4>
                    <ul>
                        <li><a href="{{ route('about') }}" class="footer-link">About</a></li>
                        <li><a href="{{ route('careers') }}" class="footer-link">Careers</a></li>
                        <li><a href="{{ route('press') }}" class="footer-link">Press</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4 class="footer-col-title">Support</h4>
                    <ul>
                        <li><a href="{{ route('help') }}" class="footer-link">Help Center</a></li>
                        <li><a href="{{ route('contact') }}" class="footer-link">Contact Us</a></li>
                        <li><a href="{{ route('refund') }}" class="footer-link">Refund Policy</a></li>
                    </ul>
                </div>
            </div>

        </div>

        {{-- Bottom: Copyright + Socials --}}
        <div class="footer-bottom">
            <p class="footer-copy">
                © {{ date('Y') }} Tixly. All rights reserved.
            </p>
            <div class="footer-socials">
                <a href="#" class="social-link" aria-label="Instagram">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="1.8">
                        <rect x="2" y="2" width="20" height="20" rx="5" ry="5"/>
                        <circle cx="12" cy="12" r="4"/>
                        <circle cx="17.5" cy="6.5" r="0.5" fill="currentColor"/>
                    </svg>
                </a>
                <a href="#" class="social-link" aria-label="Twitter/X">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.744l7.737-8.835L1.254 2.25H8.08l4.253 5.622zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
                    </svg>
                </a>
                <a href="#" class="social-link" aria-label="TikTok">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-2.88 2.5 2.89 2.89 0 0 1-2.89-2.89 2.89 2.89 0 0 1 2.89-2.89c.28 0 .54.04.79.1V9.01a6.33 6.33 0 0 0-.79-.05 6.34 6.34 0 0 0-6.34 6.34 6.34 6.34 0 0 0 6.34 6.34 6.34 6.34 0 0 0 6.33-6.34V8.69a8.18 8.18 0 0 0 4.78 1.52V6.75a4.85 4.85 0 0 1-1.01-.06z"/>
                    </svg>
                </a>
            </div>
        </div>

    </div>
</footer>