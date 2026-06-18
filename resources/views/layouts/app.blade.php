<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">

    {{-- SEO --}}
    <meta name="description" content="{{ $description ?? 'TIXLY — Discover and book tickets for concerts, festivals, comedy, and live events across Indonesia.' }}">
    <meta name="theme-color" content="#080808">

    {{-- Open Graph (untuk share di sosmed) --}}
    <meta property="og:title" content="{{ $title ?? 'TIXLY — Live Events' }}">
    <meta property="og:description" content="{{ $description ?? 'Discover and book tickets for live events.' }}">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="TIXLY">

    <title>{{ $title ?? 'TIXLY — Find Your Next Event' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="tixly-body">
    @include('components.navbar')
    <main>{{ $slot }}</main>
    @hasSection('no-footer')
    @else
        @include('components.footer')
    @endif
    @stack('scripts')
</body>
</html>