<x-admin-layout>
    <x-slot name="title">Events</x-slot>

    <div class="admin-header">
        <div>
            <h1 class="admin-page-title">Events</h1>
            <p class="admin-page-sub">{{ $events->total() }} events total</p>
        </div>
        <a href="{{ route('admin.events.create') }}" class="btn-gold">
            + New Event
        </a>
    </div>

    <div class="admin-table-wrap">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Event</th>
                    <th>Category</th>
                    <th>Date</th>
                    <th>Price</th>
                    <th>Sold</th>
                    <th>Flags</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse($events as $event)
                    <tr>
                        <td>
                            <div class="admin-event-cell">
                                <span class="admin-event-color"
                                      style="background: {{ $event->accent_color }}"></span>
                                <div>
                                    <span class="admin-event-name">{{ $event->title }}</span>
                                    <span class="admin-event-venue">{{ $event->venue }}, {{ $event->city }}</span>
                                </div>
                            </div>
                        </td>
                        <td>{{ $event->category }}</td>
                        <td>{{ $event->event_date->format('d M Y') }}</td>
                        <td>{{ $event->formatted_price }}</td>
                        <td>{{ $event->tickets_sold }}/{{ $event->capacity }}</td>
                        <td>
                            @if($event->is_featured)
                                <span class="admin-flag">Featured</span>
                            @endif
                            @if($event->is_trending)
                                <span class="admin-flag admin-flag-trending">Trending</span>
                            @endif
                        </td>
                        <td>
                            <div class="admin-actions">
                                <a href="{{ route('admin.events.tickets.index', $event) }}"
                                   class="admin-action-btn">Tickets</a>
                                <a href="{{ route('admin.events.edit', $event) }}"
                                   class="admin-action-btn">Edit</a>
                                <form method="POST"
                                      action="{{ route('admin.events.destroy', $event) }}"
                                      onsubmit="return confirm('Hapus event ini?')"
                                      style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="admin-action-btn admin-action-danger">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="admin-empty">No events yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($events->hasPages())
        <div class="admin-pagination">
            {{ $events->links() }}
        </div>
    @endif

</x-admin-layout>