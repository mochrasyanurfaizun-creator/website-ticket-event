<section>
    <header class="profile-card-header">
        <h2 class="profile-card-title">Update Password</h2>
        <p class="profile-card-desc">
            Use a long, random password to keep your account secure.
        </p>
    </header>

    <form method="POST" action="{{ route('password.update') }}"
          class="profile-form">
        @csrf
        @method('put')

        <div class="form-group">
            <label class="form-label" for="update_password_current_password">
                Current Password
            </label>
            <input id="update_password_current_password"
                   name="current_password"
                   type="password"
                   class="form-input {{ $errors->updatePassword->has('current_password') ? 'is-error' : '' }}"
                   autocomplete="current-password">
            @error('current_password', 'updatePassword')
                <span class="form-error">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label" for="update_password_password">
                New Password
            </label>
            <input id="update_password_password"
                   name="password"
                   type="password"
                   class="form-input {{ $errors->updatePassword->has('password') ? 'is-error' : '' }}"
                   autocomplete="new-password">
            @error('password', 'updatePassword')
                <span class="form-error">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label" for="update_password_password_confirmation">
                Confirm Password
            </label>
            <input id="update_password_password_confirmation"
                   name="password_confirmation"
                   type="password"
                   class="form-input {{ $errors->updatePassword->has('password_confirmation') ? 'is-error' : '' }}"
                   autocomplete="new-password">
            @error('password_confirmation', 'updatePassword')
                <span class="form-error">{{ $message }}</span>
            @enderror
        </div>

        <div class="profile-form-footer">
            <button type="submit" class="btn-gold">Update Password</button>

            @if (session('status') === 'password-updated')
                <span class="profile-saved"
                      x-data="{ show: true }"
                      x-show="show"
                      x-transition
                      x-init="setTimeout(() => show = false, 2500)">
                    Saved.
                </span>
            @endif
        </div>
    </form>
</section>