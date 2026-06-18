<section x-data="{ open: false }">
    <header class="profile-card-header">
        <h2 class="profile-card-title profile-danger-title">Delete Account</h2>
        <p class="profile-card-desc">
            Once your account is deleted, all of its resources and data will be
            permanently removed. This action cannot be undone.
        </p>
    </header>

    <button class="btn-danger" @click="open = true">
        Delete Account
    </button>

    {{-- Modal --}}
    <div class="profile-modal-overlay"
         x-show="open"
         x-transition.opacity
         @click="open = false"
         style="display: none;">
    </div>

    <div class="profile-modal"
         x-show="open"
         x-transition
         style="display: none;">

        <form method="POST" action="{{ route('profile.destroy') }}"
              class="profile-modal-form">
            @csrf
            @method('delete')

            <h2 class="profile-modal-title">
                Are you sure you want to delete your account?
            </h2>
            <p class="profile-modal-desc">
                This action is permanent. Please enter your password to confirm.
            </p>

            <div class="form-group">
                <label class="form-label" for="password" class="sr-only">Password</label>
                <input id="password"
                       name="password"
                       type="password"
                       class="form-input {{ $errors->userDeletion->has('password') ? 'is-error' : '' }}"
                       placeholder="Enter your password">
                @error('password', 'userDeletion')
                    <span class="form-error">{{ $message }}</span>
                @enderror
            </div>

            <div class="profile-modal-actions">
                <button type="button" class="btn-ghost" @click="open = false">
                    Cancel
                </button>
                <button type="submit" class="btn-danger">
                    Delete Account
                </button>
            </div>
        </form>
    </div>
</section>