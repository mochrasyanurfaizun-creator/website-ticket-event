<x-app-layout>
    <x-slot name="title">{{ $event->title }} — TIXLY</x-slot>

    <div class="event-detail">

        {{-- ── HERO BANNER ── --}}
        <div class="detail-banner"
            style="--card-bg: {{ $event->accent_color }}; --card-img: url('{{ $event->image }}')">
            <div class="detail-banner-content">
                <div class="detail-breadcrumb">
                    <a href="{{ url('/') }}">Home</a>
                    <span>/</span>
                    <a href="{{ route('events.index') }}">Events</a>
                    <span>/</span>
                    <span>{{ $event->title }}</span>
                </div>
                <span class="detail-category">{{ $event->category }}</span>
                <h1 class="detail-title">{{ $event->title }}</h1>
                <div class="detail-meta-row">
                    <span class="detail-meta-item">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2">
                            <rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/>
                        </svg>
                        {{ $event->event_date->format('l, d F Y') }}
                    </span>
                    <span class="detail-meta-item">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/>
                        </svg>
                        {{ $event->formatted_time }}
                    </span>
                    <span class="detail-meta-item">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2">
                            <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z"/>
                            <circle cx="12" cy="9" r="2.5"/>
                        </svg>
                        {{ $event->venue }}, {{ $event->city }}
                    </span>
                </div>
            </div>
        </div>

        {{-- ── MAIN CONTENT ── --}}
        <div class="detail-body">
            <div class="detail-container">

                {{-- Left: Deskripsi --}}
                <div class="detail-left">

                    <div class="detail-section">
                        <h2 class="detail-section-title">About This Event</h2>
                        <p class="detail-desc">{{ $event->description }}</p>
                    </div>

                    {{-- What to Expect --}}
                    <div class="detail-section">
                        <h2 class="detail-section-title">What to Expect</h2>
                        <div class="expect-grid">
                            <div class="expect-item">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="1.5">
                                    <path d="M9 18V5l12-2v13"/>
                                    <circle cx="6" cy="18" r="3"/><circle cx="18" cy="16" r="3"/>
                                </svg>
                                <div>
                                    <span class="expect-title">Live Performances</span>
                                    <span class="expect-text">Multiple artists across the night</span>
                                </div>
                            </div>

                            <div class="expect-item">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="1.5">
                                    <path d="M18 8h1a4 4 0 0 1 0 8h-1"/>
                                    <path d="M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z"/>
                                    <line x1="6" y1="1" x2="6" y2="4"/><line x1="10" y1="1" x2="10" y2="4"/>
                                    <line x1="14" y1="1" x2="14" y2="4"/>
                                </svg>
                                <div>
                                    <span class="expect-title">Food &amp; Drinks</span>
                                    <span class="expect-text">Food stalls and bars on site</span>
                                </div>
                            </div>

                            <div class="expect-item">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="1.5">
                                    <rect x="2" y="7" width="20" height="14" rx="2"/>
                                    <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/>
                                </svg>
                                <div>
                                    <span class="expect-title">Merchandise</span>
                                    <span class="expect-text">Official merch available</span>
                                </div>
                            </div>

                            <div class="expect-item">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="1.5">
                                    <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z"/>
                                    <circle cx="12" cy="9" r="2.5"/>
                                </svg>
                                <div>
                                    <span class="expect-title">Easy Access</span>
                                    <span class="expect-text">Near public transport &amp; parking</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Good to Know --}}
                    <div class="detail-section">
                        <h2 class="detail-section-title">Good to Know</h2>
                        <div class="detail-highlights">
                            <div class="highlight-item">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="1.6">
                                    <rect x="2" y="7" width="20" height="14" rx="2"/>
                                    <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/>
                                </svg>
                                <div>
                                    <span class="highlight-title">Age Policy</span>
                                    <span class="highlight-text">All ages welcome. Under 17 must be accompanied by an adult.</span>
                                </div>
                            </div>

                            <div class="highlight-item">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="1.6">
                                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                                    <path d="M9 22V12h6v10"/>
                                </svg>
                                <div>
                                    <span class="highlight-title">Doors Open</span>
                                    <span class="highlight-text">1 hour before showtime. Come early to avoid queues.</span>
                                </div>
                            </div>

                            <div class="highlight-item">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="1.6">
                                    <path d="M9 12l2 2 4-4"/>
                                    <circle cx="12" cy="12" r="10"/>
                                </svg>
                                <div>
                                    <span class="highlight-title">E-Ticket</span>
                                    <span class="highlight-text">Instant access from your dashboard after purchase</span>
                                </div>
                            </div>

                            <div class="highlight-item">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="1.6">
                                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                                </svg>
                                <div>
                                    <span class="highlight-title">Secure Payment</span>
                                    <span class="highlight-text">Protected checkout with multiple payment options</span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                {{-- Right: Ticket Purchase Box --}}
                <div class="detail-right">
                    <div class="ticket-box" id="ticketBox">
                        <div class="ticket-box-header">
                            <span class="ticket-box-label">Select Ticket</span>
                        </div>

                        {{-- Error alert (stok habis, dll) --}}
                        @if($errors->has('ticket'))
                            <div class="event-error-alert">
                                {{ $errors->first('ticket') }}
                            </div>
                        @endif

                        @if($event->ticketTypes->count() > 0)
                            {{-- Daftar tipe tiket --}}
                            <div class="ticket-types">
                                @foreach($event->ticketTypes as $type)
                                    <label class="ticket-type {{ $type->is_sold_out ? 'is-soldout' : '' }}">
                                        <input type="radio"
                                                name="ticket_type"
                                                value="{{ $type->id }}"
                                                data-price="{{ $type->price }}"
                                                data-name="{{ $type->name }}"
                                                data-remaining="{{ $type->remaining }}"
                                                {{ $type->is_sold_out ? 'disabled' : '' }}
                                                {{ $loop->first && !$type->is_sold_out ? 'checked' : '' }}>
                                        <span class="ticket-type-card">
                                            <span class="ticket-type-info">
                                                <span class="ticket-type-name">{{ $type->name }}</span>
                                                @if($type->perks)
                                                    <span class="ticket-type-perks">{{ $type->perks }}</span>
                                                @endif
                                            </span>
                                            <span class="ticket-type-right">
                                                <span class="ticket-type-price">{{ $type->formatted_price }}</span>
                                                @if($type->is_sold_out)
                                                    <span class="ticket-type-status soldout">Sold Out</span>
                                                @elseif($type->remaining <= 20)
                                                    <span class="ticket-type-status low">{{ $type->remaining }} left</span>
                                                @else
                                                    <span class="ticket-type-status">Available</span>
                                                @endif
                                            </span>
                                        </span>
                                    </label>
                                @endforeach
                            </div>

                            {{-- Quantity --}}
                            <div class="ticket-qty-row">
                                <span class="qty-label">Quantity</span>
                                <div class="qty-control">
                                    <button type="button" class="qty-btn" id="qtyMinus">−</button>
                                    <span class="qty-value" id="qtyValue">1</span>
                                    <button type="button" class="qty-btn" id="qtyPlus">+</button>
                                </div>
                            </div>

                            {{-- Total --}}
                            <div class="ticket-total-row">
                                <span>Total</span>
                                <span class="ticket-total-price" id="totalPrice"></span>
                            </div>

                            {{-- CTA --}}
                            @auth
                                <a href="#" class="btn-gold ticket-cta-btn" id="checkoutLink">
                                    Proceed to Checkout
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="btn-gold ticket-cta-btn">
                                    Sign In to Buy Tickets
                                </a>
                                <p class="ticket-login-note">
                                    Don't have an account?
                                    <a href="{{ route('register') }}">Register free</a>
                                </p>
                            @endauth

                        @else
                            <p class="ticket-login-note">Tickets not available yet.</p>
                        @endif

                        {{-- Event info --}}
                        <ul class="ticket-info-list">
                            <li>
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2">
                                    <rect x="3" y="4" width="18" height="18" rx="2"/>
                                    <path d="M16 2v4M8 2v4M3 10h18"/>
                                </svg>
                                {{ $event->event_date->format('d M Y') }}
                            </li>
                            <li>
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2">
                                    <circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/>
                                </svg>
                                {{ $event->formatted_time }}
                            </li>
                            <li>
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2">
                                    <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z"/>
                                    <circle cx="12" cy="9" r="2.5"/>
                                </svg>
                                {{ $event->venue }}, {{ $event->city }}
                            </li>
                        </ul>

                    </div>
                </div>

            </div>
        </div>
    </div>


    @push('scripts')
    <script>
        const qtyValue   = document.getElementById('qtyValue');
        const totalEl    = document.getElementById('totalPrice');
        const minusBtn   = document.getElementById('qtyMinus');
        const plusBtn    = document.getElementById('qtyPlus');
        const checkoutLink = document.getElementById('checkoutLink');
        const slug       = "{{ $event->slug }}";
        const typeRadios = document.querySelectorAll('input[name="ticket_type"]');

        function rupiah(n) { return 'Rp ' + n.toLocaleString('id-ID'); }

        function getSelectedType() {
            const checked = document.querySelector('input[name="ticket_type"]:checked');
            return checked ? {
                id: checked.value,
                price: parseFloat(checked.dataset.price),
                name: checked.dataset.name,
                remaining: parseInt(checked.dataset.remaining)
            } : null;
        }

        function getMaxQty() {
            const type = getSelectedType();
            if (!type) return 1;
            // Maksimal 10, tapi tidak lebih dari sisa stok
            return Math.max(1, Math.min(10, type.remaining));
        }

        function updateAll() {
            const type = getSelectedType();
            if (!type) return;

            let qty = parseInt(qtyValue.textContent);
            const maxQty = getMaxQty();

            // Kalau qty melebihi stok, turunkan
            if (qty > maxQty) {
                qty = maxQty;
                qtyValue.textContent = qty;
            }

            totalEl.textContent = rupiah(type.price * qty);

            // Disable tombol + kalau sudah mentok stok
            if (plusBtn) {
                plusBtn.disabled = qty >= maxQty;
                plusBtn.style.opacity = qty >= maxQty ? '0.3' : '1';
                plusBtn.style.cursor = qty >= maxQty ? 'not-allowed' : 'pointer';
            }
            // Disable tombol - kalau sudah 1
            if (minusBtn) {
                minusBtn.disabled = qty <= 1;
                minusBtn.style.opacity = qty <= 1 ? '0.3' : '1';
                minusBtn.style.cursor = qty <= 1 ? 'not-allowed' : 'pointer';
            }

            if (checkoutLink) {
                checkoutLink.href = "{{ url('checkout') }}/" + slug
                    + "?type=" + type.id + "&qty=" + qty;
            }
        }

        typeRadios.forEach(radio => {
            radio.addEventListener('change', () => {
                qtyValue.textContent = 1;  // reset qty saat ganti tipe
                updateAll();
            });
        });

        if (minusBtn) {
            minusBtn.addEventListener('click', () => {
                let qty = parseInt(qtyValue.textContent);
                if (qty > 1) { qtyValue.textContent = qty - 1; updateAll(); }
            });
        }
        if (plusBtn) {
            plusBtn.addEventListener('click', () => {
                let qty = parseInt(qtyValue.textContent);
                const maxQty = getMaxQty();
                if (qty < maxQty) { qtyValue.textContent = qty + 1; updateAll(); }
            });
        }

        updateAll();
    </script>
    @endpush

</x-app-layout>