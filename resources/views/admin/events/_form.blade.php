<div class="admin-form-grid">

    <div class="admin-form-group admin-form-full">
        <label class="form-label">Event Title</label>
        <input type="text" name="title"
               value="{{ old('title', $event->title ?? '') }}"
               class="form-input" required>
        @error('title') <span class="form-error">{{ $message }}</span> @enderror
    </div>

    <div class="admin-form-group">
        <label class="form-label">Artist / Performer</label>
        <input type="text" name="artist"
               value="{{ old('artist', $event->artist ?? '') }}"
               class="form-input">
    </div>

    <div class="admin-form-group">
        <label class="form-label">Category</label>
        <select name="category" class="form-input" required>
            @php $cats = ['Concert','Festival','Comedy','Theatre','Sports','DJ Club','Arts']; @endphp
            @foreach($cats as $c)
                <option value="{{ $c }}"
                    {{ old('category', $event->category ?? '') === $c ? 'selected' : '' }}>
                    {{ $c }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="admin-form-group">
        <label class="form-label">Venue</label>
        <input type="text" name="venue"
               value="{{ old('venue', $event->venue ?? '') }}"
               class="form-input" required>
    </div>

    <div class="admin-form-group">
        <label class="form-label">City</label>
        <input type="text" name="city"
               value="{{ old('city', $event->city ?? '') }}"
               class="form-input" required>
    </div>

    <div class="admin-form-group">
        <label class="form-label">Date</label>
        <input type="date" name="event_date"
               value="{{ old('event_date', isset($event) ? $event->event_date->format('Y-m-d') : '') }}"
               class="form-input" required>
    </div>

    <div class="admin-form-group">
    <label class="form-label">Time</label>

    @php
        // Pecah jam lama jadi jam & menit (saat edit)
        $currentTime = old('event_time', isset($event) ? \Carbon\Carbon::parse($event->event_time)->format('H:i') : '');
        $currentHour = $currentTime ? explode(':', $currentTime)[0] : '';
        $currentMin  = $currentTime ? explode(':', $currentTime)[1] : '';
    @endphp

    <div class="time-dropdown-row">
        {{-- Dropdown Jam --}}
        <select id="timeHour" class="form-input time-select">
            <option value="">Jam</option>
            @for($h = 0; $h < 24; $h++)
                @php $hh = str_pad($h, 2, '0', STR_PAD_LEFT); @endphp
                <option value="{{ $hh }}" {{ $currentHour === $hh ? 'selected' : '' }}>{{ $hh }}</option>
            @endfor
        </select>

        <span class="time-colon">:</span>

        {{-- Dropdown Menit --}}
        <select id="timeMinute" class="form-input time-select">
            <option value="">Menit</option>
            @foreach(['00','05','10','15','20','25','30','35','40','45','50','55'] as $m)
                <option value="{{ $m }}" {{ $currentMin === $m ? 'selected' : '' }}>{{ $m }}</option>
            @endforeach
        </select>
    </div>

    {{-- Hidden input yang benar-benar dikirim ke server --}}
    <input type="hidden" name="event_time" id="eventTime" value="{{ $currentTime }}" required>
    @error('event_time') <span class="form-error">{{ $message }}</span> @enderror
    </div>

    <div class="admin-form-group">
        <label class="form-label">Time Zone</label>
        <select name="timezone" class="form-input" required>
            @php $tz = old('timezone', $event->timezone ?? 'WIB'); @endphp
            <option value="WIB"  {{ $tz === 'WIB'  ? 'selected' : '' }}>WIB — Indonesia Barat</option>
            <option value="WITA" {{ $tz === 'WITA' ? 'selected' : '' }}>WITA — Indonesia Tengah</option>
            <option value="WIT"  {{ $tz === 'WIT'  ? 'selected' : '' }}>WIT — Indonesia Timur</option>
        </select>
        @error('timezone') <span class="form-error">{{ $message }}</span> @enderror
    </div>

    <div class="admin-form-group">
        <label class="form-label">Price (Rp)</label>
        <input type="number" name="price_start"
               value="{{ old('price_start', $event->price_start ?? '') }}"
               class="form-input" min="0" required>
    </div>

    <div class="admin-form-group">
        <label class="form-label">Capacity</label>
        <input type="number" name="capacity"
               value="{{ old('capacity', $event->capacity ?? '') }}"
               class="form-input" min="1" required>
    </div>

    <div class="admin-form-group">
        <label class="form-label">Tickets Sold</label>
        <input type="number" name="tickets_sold"
               value="{{ old('tickets_sold', $event->tickets_sold ?? 0) }}"
               class="form-input" min="0">
    </div>

    <div class="admin-form-group">
        <label class="form-label">Accent Color</label>
        <input type="color" name="accent_color"
               value="{{ old('accent_color', $event->accent_color ?? '#c9a84c') }}"
               class="form-input admin-color-input">
    </div>

    <div class="admin-form-group admin-form-full">
    <label class="form-label">Gambar Event</label>

    {{-- Preview gambar lama (saat edit) --}}
    @if(isset($event) && $event->image_url)
        <div class="admin-img-current">
            <img src="{{ $event->image_url }}" alt="Current image" class="admin-img-preview">
            <span class="admin-img-note">Gambar saat ini. Upload baru untuk mengganti.</span>
        </div>
    @endif

    <input type="file" name="image" accept="image/*"
           class="form-input admin-file-input"
           {{ isset($event) ? '' : 'required' }}>
    <span class="checkout-field-hint">Format: JPG, PNG, WEBP. Maksimal 2MB.</span>
    @error('image') <span class="form-error">{{ $message }}</span> @enderror
    </div>

    <div class="admin-form-group admin-form-full">
        <label class="form-label">Description</label>
        <textarea name="description" rows="4"
                  class="form-input admin-textarea">{{ old('description', $event->description ?? '') }}</textarea>
    </div>

    <div class="admin-form-group admin-form-full">
        <div class="admin-checkboxes">
            <label class="admin-checkbox">
                <input type="checkbox" name="is_featured" value="1"
                    {{ old('is_featured', $event->is_featured ?? false) ? 'checked' : '' }}>
                <span>Featured (tampil di homepage)</span>
            </label>
            <label class="admin-checkbox">
                <input type="checkbox" name="is_trending" value="1"
                    {{ old('is_trending', $event->is_trending ?? false) ? 'checked' : '' }}>
                <span>Trending (tampil di section trending)</span>
            </label>
        </div>
    </div>

</div>