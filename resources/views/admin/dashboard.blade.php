<x-admin-layout>
    <x-slot name="title">Dashboard</x-slot>

    <div class="admin-header">
        <div>
            <h1 class="admin-page-title">Dashboard</h1>
            <p class="admin-page-sub">Overview of your platform</p>
        </div>
        <a href="{{ route('admin.events.create') }}" class="btn-gold">
            + New Event
        </a>
    </div>

    {{-- Stats --}}
    <div class="admin-stats">
        <div class="admin-stat">
            <span class="admin-stat-label">Total Events</span>
            <span class="admin-stat-num">{{ $stats['total_events'] }}</span>
        </div>
        <div class="admin-stat">
            <span class="admin-stat-label">Total Orders</span>
            <span class="admin-stat-num">{{ $stats['total_orders'] }}</span>
        </div>
        <div class="admin-stat">
            <span class="admin-stat-label">Tickets Sold</span>
            <span class="admin-stat-num">{{ number_format($stats['tickets_sold']) }}</span>
        </div>
        <div class="admin-stat">
            <span class="admin-stat-label">Users</span>
            <span class="admin-stat-num">{{ $stats['total_users'] }}</span>
        </div>
        <div class="admin-stat admin-stat-wide">
            <span class="admin-stat-label">Total Revenue</span>
            <span class="admin-stat-num">
                Rp {{ number_format($stats['total_revenue'], 0, ',', '.') }}
            </span>
        </div>
    </div>

    {{-- Recent Orders --}}
    <div class="admin-section">
        <h2 class="admin-section-title">Recent Orders</h2>

        @if($recentOrders->count() > 0)
            <div class="admin-table-wrap">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>Order Code</th>
                            <th>Customer</th>
                            <th>Event</th>
                            <th>Qty</th>
                            <th>Total</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($recentOrders as $order)
                            <tr>
                                <td class="mono">{{ $order->order_code }}</td>
                                <td>{{ $order->user->name ?? '—' }}</td>
                                <td>{{ $order->event->title ?? '—' }}</td>
                                <td>{{ $order->quantity }}</td>
                                <td>{{ $order->formatted_total }}</td>
                                <td>
                                    <span class="status-badge status-{{ $order->status }}">
                                        {{ ucfirst($order->status) }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="admin-empty">No orders yet.</p>
        @endif
    </div>

</x-admin-layout>