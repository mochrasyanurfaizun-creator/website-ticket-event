<x-admin-layout>
    <x-slot name="title">Tickets — {{ $event->title }}</x-slot>

    <div class="admin-header">
        <div>
            <a href="{{ route('admin.events.index') }}" class="admin-back">← Back to events</a>
            <h1 class="admin-page-title">Ticket Types</h1>
            <p class="admin-page-sub">{{ $event->title }}</p>
        </div>
    </div>

    @if($errors->any())
        <div class="event-error-alert" style="margin-bottom:20px;">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('admin.events.tickets.sync', $event) }}" id="ticketForm">
        @csrf

        <div class="admin-form-card">

            {{-- Header baris --}}
            <div class="tt-row tt-head">
                <span>Name</span>
                <span>Price (Rp)</span>
                <span>Quota</span>
                <span></span>
            </div>

            {{-- Container baris dinamis --}}
            <div id="ttRows">
                @forelse($event->ticketTypes as $type)
                    <div class="tt-row">
                        <input type="hidden" name="types[{{ $loop->index }}][id]" value="{{ $type->id }}">
                        <input type="text" class="form-input" name="types[{{ $loop->index }}][name]"
                               value="{{ $type->name }}" placeholder="e.g. Regular" required>
                        <input type="number" class="form-input" name="types[{{ $loop->index }}][price]"
                               value="{{ $type->price }}" placeholder="0" min="0" required>
                        <input type="number" class="form-input" name="types[{{ $loop->index }}][quota]"
                               value="{{ $type->quota }}" placeholder="0" min="0" required>
                        <button type="button" class="tt-remove admin-action-btn admin-action-danger">✕</button>
                    </div>
                @empty
                    {{-- kosong, JS akan tambah 1 baris default --}}
                @endforelse
            </div>

            <button type="button" id="addRow" class="admin-action-btn" style="margin-top:16px;">
                + Add Ticket Type
            </button>

            <div class="admin-form-actions">
                <a href="{{ route('admin.events.index') }}" class="admin-action-btn">Cancel</a>
                <button type="submit" class="btn-gold">Save Tickets</button>
            </div>
        </div>
    </form>

    @push('scripts')
    <script>
        const rowsContainer = document.getElementById('ttRows');
        const addBtn = document.getElementById('addRow');
        let rowIndex = {{ $event->ticketTypes->count() }};

        function makeRow(index) {
            const div = document.createElement('div');
            div.className = 'tt-row';
            div.innerHTML = `
                <input type="hidden" name="types[${index}][id]" value="">
                <input type="text" class="form-input" name="types[${index}][name]" placeholder="e.g. Regular" required>
                <input type="number" class="form-input" name="types[${index}][price]" placeholder="0" min="0" required>
                <input type="number" class="form-input" name="types[${index}][quota]" placeholder="0" min="0" required>
                <button type="button" class="tt-remove admin-action-btn admin-action-danger">✕</button>
            `;
            return div;
        }

        function attachRemove(btn) {
            btn.addEventListener('click', () => {
                btn.closest('.tt-row').remove();
            });
        }

        // Tombol tambah baris
        addBtn.addEventListener('click', () => {
            const row = makeRow(rowIndex++);
            rowsContainer.appendChild(row);
            attachRemove(row.querySelector('.tt-remove'));
        });

        // Pasang remove ke baris yang sudah ada
        document.querySelectorAll('.tt-remove').forEach(attachRemove);

        // Kalau belum ada baris sama sekali, tambah 1 default
        if (rowsContainer.querySelectorAll('.tt-row').length === 0) {
            addBtn.click();
        }
    </script>
    @endpush

</x-admin-layout>