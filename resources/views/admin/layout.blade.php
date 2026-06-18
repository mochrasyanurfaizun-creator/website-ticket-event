<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Admin' }} — TIXLY</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="tixly-body">

<div class="admin-shell">

    {{-- Sidebar --}}
    <aside class="admin-sidebar">
        <a href="{{ url('/') }}" class="admin-logo">
            <span class="logo-dot"></span>
            TIXLY
            <span class="admin-logo-tag">Admin</span>
        </a>

        <nav class="admin-nav">
            <a href="{{ route('admin.dashboard') }}"
               class="admin-nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="1.8">
                    <rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/>
                    <rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/>
                </svg>
                Dashboard
            </a>
            <a href="{{ route('admin.events.index') }}"
               class="admin-nav-link {{ request()->routeIs('admin.events.*') ? 'active' : '' }}">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="1.8">
                    <rect x="3" y="4" width="18" height="18" rx="2"/>
                    <path d="M16 2v4M8 2v4M3 10h18"/>
                </svg>
                Events
            </a>
        </nav>

        <div class="admin-sidebar-footer">
            <a href="{{ url('/') }}" class="admin-nav-link">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="1.8">
                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4M16 17l5-5-5-5M21 12H9"/>
                </svg>
                Back to site
            </a>
        </div>
    </aside>

    {{-- Main --}}
    <main class="admin-main">
        @if(session('success'))
            <div class="admin-flash">{{ session('success') }}</div>
        @endif

        {{ $slot }}
    </main>

</div>

</body>
</html>