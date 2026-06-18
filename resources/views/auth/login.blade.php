<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign In — TIXLY</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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
                    Your next great<br>
                    <em>night out</em><br>
                    starts here.
                </h2>
                <p class="auth-visual-sub">
                    2,400+ events. One account.
                </p>
            </div>
            <div class="auth-visual-stats">
                <div class="auth-stat">
                    <span class="auth-stat-num">180K</span>
                    <span class="auth-stat-label">Tickets sold</span>
                </div>
                <div class="auth-stat">
                    <span class="auth-stat-num">4.9</span>
                    <span class="auth-stat-label">App rating</span>
                </div>
                <div class="auth-stat">
                    <span class="auth-stat-num">320+</span>
                    <span class="auth-stat-label">Venues</span>
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
                <h1 class="auth-title">Welcome back</h1>
                <p class="auth-subtitle">
                    Don't have an account?
                    <a href="{{ route('register') }}" class="auth-link">
                        Sign up free
                    </a>
                </p>
            </div>

            {{-- Session Status --}}
            @if (session('status'))
                <div class="auth-alert auth-alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="auth-form">
                @csrf

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
                           autofocus
                           autocomplete="username">
                    @error('email')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Password --}}
                <div class="form-group">
                    <label class="form-label" for="password">
                        Password
                        <a href="{{ route('password.request') }}" class="form-label-link">
                            Forgot password?
                        </a>
                    </label>
                    <div class="input-password-wrap">
                        <input id="password"
                               type="password"
                               name="password"
                               class="form-input {{ $errors->has('password') ? 'is-error' : '' }}"
                               placeholder="••••••••"
                               required
                               autocomplete="current-password">
                        <button type="button"
                                class="input-eye-btn"
                                id="togglePassword"
                                aria-label="Toggle password">
                            <svg id="eyeIcon" width="16" height="16"
                                 viewBox="0 0 24 24" fill="none"
                                 stroke="currentColor" stroke-width="1.8">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                                <circle cx="12" cy="12" r="3"/>
                            </svg>
                        </button>
                    </div>
                    @error('password')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Remember Me --}}
                <div class="form-check">
                    <input type="checkbox"
                           id="remember_me"
                           name="remember"
                           class="form-checkbox">
                    <label for="remember_me" class="form-check-label">
                        Remember me for 30 days
                    </label>
                </div>

                {{-- Submit --}}
                <button type="submit" class="auth-submit-btn">
                    Sign In
                </button>

            </form>

            <p class="auth-terms">
                By signing in you agree to our
                <a href="{{ route('terms') }}" class="auth-link">Terms</a> and
                <a href="{{ route('privacy') }}" class="auth-link">Privacy Policy</a>.
            </p>

        </div>
    </div>

</div>

<script>
    const toggleBtn  = document.getElementById('togglePassword');
    const pwInput    = document.getElementById('password');
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