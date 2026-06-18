<x-app-layout>
    <x-slot name="title">My Dashboard — TIXLY</x-slot>

    <div class="dash-page">

        {{-- ── HEADER ── --}}
        <div class="dash-header">
            <div class="section-wrap">
                <div class="dash-header-inner">
                    <div>
                        <span class="section-eyebrow">My Account</span>
                        <h1 class="dash-title">Hi, {{ $user->name }}</h1>
                        <p class="dash-sub">Welcome back to your ticket hub</p>
                    </div>
                    <a href="{{ route('events.index') }}" class="btn-gold">
                        Browse Events
                    </a>
                </div>
            </div>
        </div>

        <div class="section-wrap dash-body">

            {{-- ── UPCOMING TICKETS ── --}}
            <div class="dash-section">
                <h2 class="dash-section-title">My Ticket</h2>

                @if($upcoming->count() > 0)
                    <div class="ticket-list">
                        @foreach($upcoming as $order)
                            <div class=" my-ticket"
                                 style="--card-img: url('{{ $order->event->image }}')">

                                <div class="ticket-img"></div>

                                <div class="ticket-detail">
                                    <span class="ticket-category">
                                        {{ $order->event->category }}
                                    </span>
                                    <h3 class="ticket-event-title">
                                        {{ $order->event->title }}
                                    </h3>
                                    <p class="ticket-event-meta">
                                        {{ $order->event->event_date->format('l, d F Y') }}
                                        · {{ $order->event->venue }}, {{ $order->event->city }}
                                    </p>

                                    <div class="ticket-meta-row">
                                        <div class="ticket-meta-item">
                                            <span class="tm-label">Order Code</span>
                                            <span class="tm-value">{{ $order->order_code }}</span>
                                        </div>
                                        <div class="ticket-meta-item">
                                            <span class="tm-label">Quantity</span>
                                            <span class="tm-value">{{ $order->quantity }} ticket(s)</span>
                                        </div>
                                        <div class="ticket-meta-item">
                                            <span class="tm-label">Total</span>
                                            <span class="tm-value">{{ $order->formatted_total }}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="ticket-status">
                                    <span class="status-badge status-{{ $order->status }}">
                                        {{ ucfirst($order->status) }}
                                    </span>
                                    <a href="{{ route('ticket.show', $order->order_code) }}"
                                    class="ticket-view-link">
                                        View ticket →
                                    </a>
                                </div>

                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="dash-empty">
                        <p class="dash-empty-text">
                            You don't have any upcoming tickets yet.
                        </p>
                        <a href="{{ route('events.index') }}" class="btn-gold">
                            Discover Events
                        </a>
                    </div>
                @endif
            </div>

            {{-- ── PAST TICKETS ── --}}
            @if($past->count() > 0)
            <div class="dash-section">
                <h2 class="dash-section-title">Past Events</h2>
                <div class="ticket-list">
                    @foreach($past as $order)
                        <div class="my-ticket my-ticket-past"
                             style="--card-img: url('{{ $order->event->image }}')">
                            <div class="ticket-img"></div>
                            <div class="ticket-detail">
                                <span class="ticket-category">{{ $order->event->category }}</span>
                                <h3 class="ticket-event-title">{{ $order->event->title }}</h3>
                                <p class="ticket-event-meta">
                                    {{ $order->event->event_date->format('d F Y') }}
                                    · {{ $order->event->city }}
                                </p>
                            </div>
                            <div class="ticket-status">
                                <span class="status-badge status-used">Attended</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            @endif

            {{-- ── ACCOUNT SETTINGS LINK ── --}}
            <div class="dash-section">
                <h2 class="dash-section-title">Account</h2>
                <div class="dash-account-grid">
                    <a href="{{ route('profile.edit') }}" class="dash-account-card">
                        <div class="dac-icon">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                 stroke="currentColor" stroke-width="1.6">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                                <circle cx="12" cy="7" r="4"/>
                            </svg>
                        </div>
                        <div>
                            <h4 class="dac-title">Edit Profile</h4>
                            <p class="dac-sub">Update name, email, password</p>
                        </div>
                    </a>

                    <form method="POST" action="{{ route('logout') }}"
                          class="dash-account-card dash-logout">
                        @csrf
                        <div class="dac-icon">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                 stroke="currentColor" stroke-width="1.6">
                                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
                                <path d="M16 17l5-5-5-5M21 12H9"/>
                            </svg>
                        </div>
                        <button type="submit" class="dac-logout-btn">
                            <h4 class="dac-title">Sign Out</h4>
                            <p class="dac-sub">Log out of your account</p>
                        </button>
                    </form>
                </div>
            </div>

            @if(auth()->user()->is_admin)
                    <div class="dash-section">
                        <h2 class="dash-section-title">Admin</h2>
                        <a href="{{ route('admin.dashboard') }}" class="dash-admin-card">
                            <div class="dash-admin-icon">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="1.6">
                                    <path d="M12 2L2 7l10 5 10-5-10-5z"/>
                                    <path d="M2 17l10 5 10-5M2 12l10 5 10-5"/>
                                </svg>
                            </div>
                            <div class="dash-admin-text">
                                <span class="dash-admin-title">Panel Admin</span>
                                <span class="dash-admin-sub">Kelola event, order, tiket, dan scan QR</span>
                            </div>
                            <svg class="dash-admin-arrow" width="20" height="20" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="1.6">
                                <path d="M5 12h14M12 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
            @endif
        </div>
    </div>

</x-app-layout>