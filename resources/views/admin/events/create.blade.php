<x-admin-layout>
    <x-slot name="title">New Event</x-slot>

    <div class="admin-header">
        <div>
            <a href="{{ route('admin.events.index') }}" class="admin-back">← Back to events</a>
            <h1 class="admin-page-title">New Event</h1>
        </div>
    </div>

    <form method="POST" action="{{ route('admin.events.store') }}" class="admin-form-card" enctype="multipart/form-data">
        @csrf
        @include('admin.events._form')

        <div class="admin-form-actions">
            <a href="{{ route('admin.events.index') }}" class="btn-ghost">Cancel</a>
            <button type="submit" class="btn-gold">Create Event</button>
        </div>
    </form>

    @push('scripts')
    <script>
        const hourSel  = document.getElementById('timeHour');
        const minSel   = document.getElementById('timeMinute');
        const hidden   = document.getElementById('eventTime');

        function updateTime() {
            const h = hourSel.value;
            const m = minSel.value;
            // Gabung jadi HH:MM hanya kalau keduanya dipilih
            hidden.value = (h && m) ? `${h}:${m}` : '';
        }

        if (hourSel && minSel) {
            hourSel.addEventListener('change', updateTime);
            minSel.addEventListener('change', updateTime);
        }
    </script>
    @endpush

</x-admin-layout>