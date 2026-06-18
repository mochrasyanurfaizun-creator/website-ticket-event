<x-app-layout>
    <x-slot name="title">Order Confirmed — TIXLY</x-slot>

    <div class="success-page">
        <div class="success-container">

            {{-- Check icon --}}
            <div class="success-icon">
                <svg width="32" height="32" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2">
                    <path d="M20 6L9 17l-5-5"/>
                </svg>
            </div>

            <h1 class="success-title">Order Confirmed</h1>
            <p class="success-sub">
                Your tickets are ready. A confirmation has been sent to your email.
            </p>

            {{-- Ticket Card --}}
            <div class="success-ticket">
                <div class="success-ticket-img"
                     style="--card-img: url('{{ $order->event->image }}')"></div>

                <div class="success-ticket-body">
                    <span class="ticket-category">{{ $order->event->category }}</span>
                    <h2 class="success-ticket-title">{{ $order->event->title }}</h2>
                    <p class="success-ticket-meta">
                        {{ $order->event->event_date->format('l, d F Y') }}<br>
                        {{ $order->event->venue }}, {{ $order->event->city }}
                    </p>

                    <div class="success-ticket-divider"></div>

                    <div class="success-ticket-info">
                        <div class="sti-item">
                            <span class="sti-label">Order Code</span>
                            <span class="sti-value sti-code">{{ $order->order_code }}</span>
                        </div>
                        <div class="sti-item">
                            <span class="sti-label">Quantity</span>
                            <span class="sti-value">{{ $order->quantity }} ticket(s)</span>
                        </div>
                        <div class="sti-item">
                            <span class="sti-label">Total Paid</span>
                            <span class="sti-value">{{ $order->formatted_total }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="success-actions">
                <a href="{{ route('ticket.show', $order->order_code) }}" class="btn-gold">
                    View My Ticket
                </a>
                <a href="{{ route('events.index') }}" class="view-all-btn">
                    Browse more events
                </a>
            </div>

        </div>
    </div>

</x-app-layout>