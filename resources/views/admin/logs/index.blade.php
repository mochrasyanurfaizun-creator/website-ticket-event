<x-admin-layout>
    <x-slot name="title">Audit Log — Admin</x-slot>

    <div class="admin-header">
        <div>
            <h1 class="admin-page-title">Audit Log</h1>
            <p class="admin-page-sub">Riwayat aktivitas admin</p>
        </div>
    </div>

    {{-- Filter --}}
    <form method="GET" class="admin-order-filter">
        <input type="text" name="search" value="{{ request('search') }}"
               placeholder="Search admin, target, action..."
               class="form-input admin-filter-input">
        <select name="type" class="filter-select" onchange="this.form.submit()">
            <option value="">All types</option>
            @foreach($types as $t)
                <option value="{{ $t }}" {{ request('type') === $t ? 'selected' : '' }}>{{ $t }}</option>
            @endforeach
        </select>
        <button type="submit" class="admin-action-btn">Filter</button>
    </form>

    <div class="admin-table-wrap">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Admin</th>
                    <th>Action</th>
                    <th>Target</th>
                    <th>Details</th>
                    <th>IP</th>
                    <th>When</th>
                </tr>
            </thead>
            <tbody>
                @forelse($logs as $log)
                <tr>
                    <td>{{ $log->user_name ?? '—' }}</td>
                    <td><span class="log-action">{{ ucfirst($log->action) }}</span></td>
                    <td>
                        <span class="admin-event-name">{{ $log->target_type }}</span>
                        <span class="admin-event-venue">{{ $log->target_label ?? '' }}</span>
                    </td>
                    <td>
                        @if($log->changes)
                            <div class="log-changes">
                                @foreach($log->changes as $field => $change)
                                    <div class="log-change-item">
                                        <span class="log-field">{{ $field }}</span>
                                        <span class="log-from">{{ Str::limit($change['from'] ?? '—', 20) }}</span>
                                        <span class="log-arrow">→</span>
                                        <span class="log-to">{{ Str::limit($change['to'] ?? '—', 20) }}</span>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <span class="log-nodetail">—</span>
                        @endif
                    </td>
                    <td><span class="mono">{{ $log->ip_address ?? '—' }}</span></td>
                    <td>{{ $log->created_at->format('d M Y, H:i') }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="admin-empty">Belum ada aktivitas tercatat.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($logs->hasPages())
        <div class="admin-pagination">
            {{ $logs->links() }}
        </div>
    @endif

</x-admin-layout>