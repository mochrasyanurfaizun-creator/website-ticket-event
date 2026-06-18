<x-admin-layout>
    <x-slot name="title">Orders — Admin</x-slot>

    <div class="admin-header">
        <div>
            <h1 class="admin-page-title">Orders</h1>
            <p class="admin-page-sub">Manage all ticket purchases</p>
        </div>
    </div>

    {{-- Stats --}}
    <div class="admin-stats">
        <div class="admin-stat">
            <span class="admin-stat-label">Total Orders</span>
            <span class="admin-stat-num">{{ number_format($stats['total']) }}</span>
        </div>
        <div class="admin-stat">
            <span class="admin-stat-label">Confirmed</span>
            <span class="admin-stat-num">{{ number_format($stats['confirmed']) }}</span>
        </div>
        <div class="admin-stat">
            <span class="admin-stat-label">Cancelled</span>
            <span class="admin-stat-num">{{ number_format($stats['cancelled']) }}</span>
        </div>
        <div class="admin-stat">
            <span class="admin-stat-label">Revenue</span>
            <span class="admin-stat-num">Rp {{ number_format($stats['revenue'], 0, ',', '.') }}</span>
        </div>
    </div>

    {{-- Filter --}}
    <form method="GET" class="admin-order-filter">
        <input type="text" name="search" value="{{ request('search') }}"
               placeholder="Search order code, name, email..."
               class="form-input admin-filter-input">
        <select name="status" class="filter-select" onchange="this.form.submit()">
            <option value="">All status</option>
            <option value="confirmed" {{ request('status') === 'confirmed' ? 'selected' : '' }}>Confirmed</option>
            <option value="cancelled" {{ request('status') === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
            <option value="used" {{ request('status') === 'used' ? 'selected' : '' }}>Used</option>
        </select>
        <button type="submit" class="admin-action-btn">Filter</button>
    </form>

    {{-- Table --}}
    <div class="admin-table-wrap">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Order Code</th>
                    <th>Buyer</th>
                    <th>Event</th>
                    <th>Qty</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse($orders as $order)
                <tr>
                    <td><span class="mono">{{ $order->order_code }}</span></td>
                    <td>
                        <span class="admin-event-name">{{ $order->buyer_name ?? '—' }}</span>
                        <span class="admin-event-venue">{{ $order->buyer_email ?? '' }}</span>
                    </td>
                    <td>{{ $order->event->title ?? '—' }}</td>
                    <td>{{ $order->quantity }}</td>
                    <td>Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                    <td>
                        <span class="status-badge status-{{ $order->status }}">
                            {{ ucfirst($order->status) }}
                        </span>
                    </td>
                    <td>{{ $order->created_at->format('d M Y') }}</td>
                    <td>
                        <a href="{{ route('admin.orders.show', $order) }}" class="admin-action-btn">View</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="admin-empty">No orders found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="admin-pagination">
        {{ $orders->links() }}
    </div>

</x-admin-layout>