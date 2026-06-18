<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reset Password — TIXLY</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="tixly-body auth-body">

<div class="auth-page">

    {{-- Kiri: Visual --}}
    <div class="auth-visual">
        <div class="auth-visual-bg"></div>
        <div class="auth-visual-content">
            <a href="{{ url('/') }}" class="nav-logo">TIXLY</a>
            <div class="auth-visual-text">
                <h1 class="auth-visual-headline">
                    Lupa kata<br><em>sandi?</em>
                </h1>
                <p class="auth-visual-sub">Tenang, kami bantu kamu kembali masuk.</p>
            </div>
        </div>
    </div>

    {{-- Kanan: Form --}}
    <div class="auth-form-panel">
        <div class="auth-form-wrap">

            <a href="{{ url('/') }}" class="nav-logo auth-mobile-logo">TIXLY</a>

            <div class="auth-form-header">
                <h2 class="auth-title">Reset Password</h2>
                <p class="auth-subtitle">
                    Masukkan email kamu, kami akan kirim link untuk membuat kata sandi baru.
                </p>
            </div>

            {{-- Status sukses --}}
            @if (session('status'))
                <div class="auth-alert auth-alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}" class="auth-form">
                @csrf

                <div class="form-group">
                    <label class="form-label" for="email">Email</label>
                    <input id="email" type="email" name="email"
                           value="{{ old('email') }}"
                           class="form-input {{ $errors->has('email') ? 'is-error' : '' }}"
                           placeholder="you@example.com" required autofocus>
                    @error('email')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="auth-submit-btn">
                    Kirim Link Reset
                </button>
            </form>

            <p class="auth-terms" style="margin-top:24px;">
                Ingat kata sandi kamu?
                <a href="{{ route('login') }}" class="auth-link">Kembali ke login</a>
            </p>

        </div>
    </div>

</div>

</body>
</html>