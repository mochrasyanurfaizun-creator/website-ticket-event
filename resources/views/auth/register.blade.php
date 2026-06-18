<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Account — TIXLY</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>
</head>
</head>
<body class="tixly-body auth-body">

<div class="auth-page">

    {{-- Left Panel: Visual --}}
    <div class="auth-visual">
        <div class="auth-visual-bg"></div>
        <div class="auth-visual-content">
            <a href="{{ url('/') }}" class="nav-logo" style="margin-bottom: auto;">
                <span class=""></span>
                TIXLY
            </a>
            <div class="auth-visual-text">
                <h2 class="auth-visual-headline">
                    Join thousands<br>
                    who never miss<br>
                    <em>a show.</em>
                </h2>
                <p class="auth-visual-sub">
                    Free account. No hidden fees.
                </p>
            </div>
            <div class="auth-visual-stats">
                <div class="auth-stat">
                    <span class="auth-stat-num">Free</span>
                    <span class="auth-stat-label">To join</span>
                </div>
                <div class="auth-stat">
                    <span class="auth-stat-num">2min</span>
                    <span class="auth-stat-label">Setup time</span>
                </div>
                <div class="auth-stat">
                    <span class="auth-stat-num">2,400+</span>
                    <span class="auth-stat-label">Events waiting</span>
                </div>
            </div>
        </div>
    </div>

    {{-- Right Panel: Form --}}
    <div class="auth-form-panel">
        <div class="auth-form-wrap">

            {{-- Mobile logo --}}
            <a href="{{ url('/') }}" class="nav-logo auth-mobile-logo">
                <span class=""></span>
                TIXLY
            </a>

            <div class="auth-form-header">
                <h1 class="auth-title">Create your account</h1>
                <p class="auth-subtitle">
                    Already have one?
                    <a href="{{ route('login') }}" class="auth-link">Sign in</a>
                </p>
            </div>

            <form method="POST" action="{{ route('register') }}" class="auth-form">
                @csrf

                {{-- Name --}}
                <div class="form-group">
                    <label class="form-label" for="name">Full name</label>
                    <input id="name"
                           type="text"
                           name="name"
                           value="{{ old('name') }}"
                           class="form-input {{ $errors->has('name') ? 'is-error' : '' }}"
                           placeholder="Your full name"
                           required
                           autofocus
                           autocomplete="name">
                    @error('name')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Email --}}
                <div class="form-group">
                    <label class="form-label" for="email">Email address</label>
                    <input id="email"
                           type="email"
                           name="email"
                           value="{{ old('email') }}"
                           class="form-input {{ $errors->has('email') ? 'is-error' : '' }}"
                           placeholder="you@example.com"
                           required
                           autocomplete="username">
                    @error('email')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Password --}}
                <div class="form-group">
                    <label class="form-label" for="password">Password</label>
                    <div class="input-password-wrap">
                        <input id="password"
                               type="password"
                               name="password"
                               class="form-input {{ $errors->has('password') ? 'is-error' : '' }}"
                               placeholder="Min. 8 characters"
                               required
                               autocomplete="new-password">
                        <button type="button"
                                class="input-eye-btn"
                                id="togglePassword"
                                aria-label="Toggle password">
                            <svg width="16" height="16" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="1.8">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                                <circle cx="12" cy="12" r="3"/>
                            </svg>
                        </button>
                    </div>
                    @error('password')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Confirm Password --}}
                <div class="form-group">
                    <label class="form-label" for="password_confirmation">
                        Confirm password
                    </label>
                    <input id="password_confirmation"
                           type="password"
                           name="password_confirmation"
                           class="form-input"
                           placeholder="Repeat your password"
                           required
                           autocomplete="new-password">
                    @error('password_confirmation')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Turnstile Widget --}}
                <div class="form-group">
                    <div class="cf-turnstile"
                        data-sitekey="{{ config('services.turnstile.site_key') }}"
                        data-theme="dark">
                    </div>
                    @error('cf-turnstile-response')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Submit --}}
                <button type="submit" class="auth-submit-btn">
                    Create Account
                </button>

            </form>

            <p class="auth-terms">
                By creating an account you agree to our
                 <a href="{{ route('terms') }}" class="auth-link">Terms</a> and
                 <a href="{{ route('privacy') }}" class="auth-link">Privacy Policy</a>.
            </p>

        </div>
    </div>

</div>

<script>
    const toggleBtn = document.getElementById('togglePassword');
    const pwInput   = document.getElementById('password');
    if (toggleBtn && pwInput) {
        toggleBtn.addEventListener('click', () => {
            const isText = pwInput.type === 'text';
            pwInput.type = isText ? 'password' : 'text';
            toggleBtn.style.opacity = isText ? '0.5' : '1';
        });
    }
</script>

</body>
</html>