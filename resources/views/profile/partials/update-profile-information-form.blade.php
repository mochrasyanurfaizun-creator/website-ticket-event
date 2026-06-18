<section>
    <header class="profile-card-header">
        <h2 class="profile-card-title">Profile Information</h2>
        <p class="profile-card-desc">
            Update your account's name and email address.
        </p>
    </header>

    {{-- Form verifikasi email (hidden, dipakai Laravel) --}}
    <form id="send-verification" method="POST"
          action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="POST" action="{{ route('profile.update') }}"
          class="profile-form">
        @csrf
        @method('patch')

        <div class="form-group">
            <label class="form-label" for="name">Full Name</label>
            <input id="name"
                   name="name"
                   type="text"
                   class="form-input {{ $errors->has('name') ? 'is-error' : '' }}"
                   value="{{ old('name', $user->name) }}"
                   required
                   autofocus
                   autocomplete="name">
            @error('name')
                <span class="form-error">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label" for="email">Email Address</label>
            <input id="email"
                   name="email"
                   type="email"
                   class="form-input {{ $errors->has('email') ? 'is-error' : '' }}"
                   value="{{ old('email', $user->email) }}"
                   required
                   autocomplete="username">
            @error('email')
                <span class="form-error">{{ $message }}</span>
            @enderror

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="profile-verify-notice">
                    <p>Your email address is unverified.</p>
                    <button form="send-verification" class="profile-verify-link">
                        Click here to re-send the verification email.
                    </button>

                    @if (session('status') === 'verification-link-sent')
                        <p class="profile-verify-sent">
                            A new verification link has been sent to your email.
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="profile-form-footer">
            <button type="submit" class="btn-gold">Save Changes</button>

            @if (session('status') === 'profile-updated')
                <span class="profile-saved" x-data="{ show: true }"
                      x-show="show"
                      x-transition
                      x-init="setTimeout(() => show = false, 2500)">
                    Saved.
                </span>
            @endif
        </div>
    </form>
</section>