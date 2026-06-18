<x-app-layout>
    <x-slot name="title">Checkout — TIXLY</x-slot>

    <div class="checkout-page">
        <div class="section-wrap">

            <div class="checkout-breadcrumb">
                <a href="{{ route('events.show', $event->slug) }}">← Back to event</a>
            </div>

            <div class="checkout-grid">

                {{-- LEFT: Form --}}
                <div class="checkout-main">
                    <span class="section-eyebrow">Checkout</span>
                    <h1 class="checkout-title">Complete your order</h1>

                    <form method="POST"
                          action="{{ route('checkout.store', $event->slug) }}"
                          class="checkout-form"
                          id="checkoutForm">
                        @csrf
                        <input type="hidden" name="ticket_type_id" value="{{ $ticketType->id }}">

                        {{-- Buyer Information --}}
                        <div class="checkout-block">
                            <h3 class="checkout-block-title">Your Information</h3>

                            <div class="checkout-field">
                                <label class="form-label" for="buyer_name">Full Name</label>
                                <input type="text" name="buyer_name" id="buyer_name"
                                       class="form-input {{ $errors->has('buyer_name') ? 'is-error' : '' }}"
                                       value="{{ old('buyer_name', auth()->user()->name) }}"
                                       placeholder="As shown on your ID" required>
                                @error('buyer_name')<span class="form-error">{{ $message }}</span>@enderror
                            </div>

                            <div class="checkout-field">
                                <label class="form-label" for="buyer_email">Email Address</label>
                                <input type="email" name="buyer_email" id="buyer_email"
                                       class="form-input {{ $errors->has('buyer_email') ? 'is-error' : '' }}"
                                       value="{{ old('buyer_email', auth()->user()->email) }}"
                                       placeholder="ticket@example.com" required>
                                @error('buyer_email')<span class="form-error">{{ $message }}</span>@enderror
                                <span class="checkout-field-hint">E-ticket will be sent here</span>
                            </div>

                            <div class="checkout-field">
                                <label class="form-label" for="buyer_phone">Phone Number</label>
                                <input type="tel" name="buyer_phone" id="buyer_phone"
                                       class="form-input {{ $errors->has('buyer_phone') ? 'is-error' : '' }}"
                                       value="{{ old('buyer_phone') }}"
                                       placeholder="08xxxxxxxxxx" required>
                                @error('buyer_phone')<span class="form-error">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        {{-- Quantity --}}
                        <div class="checkout-block">
                            <h3 class="checkout-block-title">Quantity</h3>
                            <div class="checkout-qty">
                                <button type="button" class="qty-btn" id="coMinus">−</button>
                                <input type="number" name="quantity" id="coQty"
                                       value="{{ $quantity }}" min="1" max="10"
                                       class="checkout-qty-input" readonly>
                                <button type="button" class="qty-btn" id="coPlus">+</button>
                            </div>
                            @error('quantity')<span class="form-error">{{ $message }}</span>@enderror
                        </div>

                        {{-- Payment Method --}}
                        <div class="checkout-block">
                            <h3 class="checkout-block-title">Payment Method</h3>
                            <div class="payment-options">
                                <label class="payment-option">
                                    <input type="radio" name="payment_method" value="bank_transfer" checked>
                                    <span class="payment-card">
                                        <span class="payment-name">Bank Transfer</span>
                                        <span class="payment-desc">BCA, Mandiri, BNI</span>
                                    </span>
                                </label>
                                <label class="payment-option">
                                    <input type="radio" name="payment_method" value="ewallet">
                                    <span class="payment-card">
                                        <span class="payment-name">E-Wallet</span>
                                        <span class="payment-desc">GoPay, OVO, DANA</span>
                                    </span>
                                </label>
                                <label class="payment-option">
                                    <input type="radio" name="payment_method" value="credit_card">
                                    <span class="payment-card">
                                        <span class="payment-name">Credit Card</span>
                                        <span class="payment-desc">Visa, Mastercard</span>
                                    </span>
                                </label>
                            </div>
                        </div>

                        <button type="submit" class="btn-gold checkout-submit" id="coSubmitBtn">
                            Pay · <span id="coTotal">{{ 'Rp ' . number_format($total, 0, ',', '.') }}</span>
                        </button>

                        <p class="checkout-disclaimer">
                            This is a demo checkout. No real payment will be processed.
                        </p>
                    </form>
                </div>

                {{-- RIGHT: Order Summary --}}
                <div class="checkout-summary">
                    <div class="summary-card">
                        <div class="summary-event-img"
                             style="--card-img: url('{{ $event->image }}')"></div>

                        <div class="summary-body">
                            <span class="summary-category">{{ $event->category }}</span>
                            <h3 class="summary-event-title">{{ $event->title }}</h3>
                            <p class="summary-event-meta">
                                {{ $event->event_date->format('d F Y') }}<br>
                                {{ $event->venue }}, {{ $event->city }}
                            </p>

                            <div class="summary-ticket-type">
                                <span class="summary-type-name">{{ $ticketType->name }}</span>
                                @if($ticketType->perks)
                                    <span class="summary-type-perks">{{ $ticketType->perks }}</span>
                                @endif
                            </div>

                            <div class="summary-line-items">
                                <div class="summary-line">
                                    <span>{{ $ticketType->name }} ticket</span>
                                    <span>{{ $ticketType->formatted_price }}</span>
                                </div>
                                <div class="summary-line">
                                    <span>Quantity</span>
                                    <span id="sumQty">{{ $quantity }}</span>
                                </div>
                                <div class="summary-line">
                                    <span>Service fee</span>
                                    <span>Rp 0</span>
                                </div>
                            </div>

                            <div class="summary-total">
                                <span>Total</span>
                                <span id="sumTotal">Rp {{ number_format($total, 0, ',', '.') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        const price    = {{ $ticketType->price }};
        const coQty    = document.getElementById('coQty');
        const coMinus  = document.getElementById('coMinus');
        const coPlus   = document.getElementById('coPlus');
        const coTotal  = document.getElementById('coTotal');
        const sumQty   = document.getElementById('sumQty');
        const sumTotal = document.getElementById('sumTotal');

        function rupiah(n) { return 'Rp ' + n.toLocaleString('id-ID'); }

        function sync() {
            const q = parseInt(coQty.value);
            coTotal.textContent  = rupiah(price * q);
            sumQty.textContent   = q;
            sumTotal.textContent = rupiah(price * q);
        }

        coMinus.addEventListener('click', () => {
            let q = parseInt(coQty.value);
            if (q > 1) { coQty.value = q - 1; sync(); }
        });
        coPlus.addEventListener('click', () => {
            let q = parseInt(coQty.value);
            if (q < 10) { coQty.value = q + 1; sync(); }
        });

        // Prevent double submit
        const form = document.getElementById('checkoutForm');
        if (form) {
            form.addEventListener('submit', () => {
                const btn = document.getElementById('coSubmitBtn');
                if (btn) {
                    btn.disabled = true;
                    btn.innerHTML = 'Processing...';
                    btn.style.opacity = '0.6';
                }
            });
        }
    </script>
    @endpush

</x-app-layout>