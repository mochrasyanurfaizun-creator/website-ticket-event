<x-admin-layout>
    <x-slot name="title">Order {{ $order->order_code }} — Admin</x-slot>


    <div class="admin-header">
        <div>
            <a href="{{ route('admin.orders.index') }}" class="admin-back">← Back to orders</a>
            <h1 class="admin-page-title">Order {{ $order->order_code }}</h1>
        </div>
    </div>

    <div class="admin-order-detail">

        {{-- Info --}}
        <div class="admin-order-card">
            <h3 class="admin-section-title">Order Details</h3>
            <div class="admin-detail-row"><span>Order Code</span><span class="mono">{{ $order->order_code }}</span></div>
            <div class="admin-detail-row"><span>Event</span><span>{{ $order->event->title ?? '—' }}</span></div>
            <div class="admin-detail-row"><span>Ticket Type</span><span>{{ $order->ticket_type_name ?? 'Regular' }}</span></div>
            <div class="admin-detail-row"><span>Quantity</span><span>{{ $order->quantity }}</span></div>
            <div class="admin-detail-row"><span>Total</span><span>Rp {{ number_format($order->total_price, 0, ',', '.') }}</span></div>
            <div class="admin-detail-row"><span>Order Date</span><span>{{ $order->created_at->format('d M Y, H:i') }}</span></div>
        </div>

        {{-- Buyer --}}
        <div class="admin-order-card">
            <h3 class="admin-section-title">Buyer Information</h3>
            <div class="admin-detail-row"><span>Name</span><span>{{ $order->buyer_name ?? $order->user->name }}</span></div>
            <div class="admin-detail-row"><span>Email</span><span>{{ $order->buyer_email ?? $order->user->email }}</span></div>
            <div class="admin-detail-row"><span>Phone</span><span>{{ $order->buyer_phone ?? '—' }}</span></div>
            <div class="admin-detail-row"><span>Account</span><span>{{ $order->user->name ?? '—' }}</span></div>
        </div>

        {{-- Status --}}
        <div class="admin-order-card">
            <h3 class="admin-section-title">Status</h3>
            <div class="admin-detail-row">
                <span>Current</span>
                <span class="status-badge status-{{ $order->status }}">{{ ucfirst($order->status) }}</span>
            </div>

            <form method="POST" action="{{ route('admin.orders.status', $order) }}" class="admin-status-form">
                @csrf
                @method('PATCH')
                <select name="status" class="filter-select">
                    <option value="confirmed" {{ $order->status === 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                    <option value="used" {{ $order->status === 'used' ? 'selected' : '' }}>Used</option>
                    <option value="cancelled" {{ $order->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                </select>
                <button type="submit" class="btn-gold">Update Status</button>
            </form>
        </div>

    </div>

</x-admin-layout>