<x-app-layout>
    <x-slot name="title">Your Ticket — TIXLY</x-slot>

    <div class="eticket-page">
        <div class="eticket-container">

            <div class="eticket-back">
                <a href="{{ route('dashboard') }}">← Back to dashboard</a>
            </div>

            {{-- The Ticket --}}
            <div class="eticket">

                {{-- Top: Event visual --}}
                <div class="eticket-top"
                     style="--card-img: url('{{ $order->event->image }}')">
                    <div class="eticket-top-overlay"></div>
                    <div class="eticket-top-content">
                        <span class="eticket-category">{{ $order->event->category }}</span>
                        <h1 class="eticket-title">{{ $order->event->title }}</h1>
                    </div>
                </div>

                {{-- Perforated divider --}}
                <div class="eticket-perforation">
                    <span class="perf-circle perf-left"></span>
                    <span class="perf-line"></span>
                    <span class="perf-circle perf-right"></span>
                </div>

                {{-- Bottom: Details + QR --}}
                <div class="eticket-bottom">

                    <div class="eticket-details">
                        <div class="eticket-row">
                            <span class="eticket-label">Date</span>
                            <span class="eticket-value">
                                {{ $order->event->event_date->format('l, d F Y') }}
                            </span>
                        </div>
                        <div class="eticket-row">
                            <span class="eticket-label">Time</span>
                            <span class="eticket-value">
                                {{ \Carbon\Carbon::parse($order->event->event_time)->format('H:i') }} WIB
                            </span>
                        </div>
                        <div class="eticket-row">
                            <span class="eticket-label">Venue</span>
                            <span class="eticket-value">
                                {{ $order->event->venue }}, {{ $order->event->city }}
                            </span>
                        </div>
                        <div class="eticket-row">
                            <span class="eticket-label">Ticket Type</span>
                            <span class="eticket-value">{{ $order->ticket_type_name ?? 'Regular' }}</span>
                        </div>
                        <div class="eticket-row">
                            <span class="eticket-label">Quantity</span>
                            <span class="eticket-value">{{ $order->quantity }} ticket(s)</span>
                        </div>
                        <div class="eticket-row">
                            <span class="eticket-label">Holder</span>
                            <span class="eticket-value">{{ $order->buyer_name ?? $order->user->name }}</span>
                        </div>
                    </div>

                    {{-- QR Code --}}
                    <div class="eticket-qr">
                        <div class="eticket-qr-box">
                            {!! QrCode::size(160)->margin(1)->generate($order->order_code) !!}
                        </div>
                        <span class="eticket-code">{{ $order->order_code }}</span>
                        <span class="eticket-scan-note">
                            Show this at the entrance · valid for {{ $order->quantity }}
                            {{ Str::plural('person', $order->quantity) }}
                        </span>
                    </div>

                </div>
            </div>

            {{-- Actions --}}
            <div class="eticket-actions">
                <button onclick="window.print()" class="btn-gold">
                    Download / Print
                </button>
            </div>

        </div>
    </div>

</x-app-layout>