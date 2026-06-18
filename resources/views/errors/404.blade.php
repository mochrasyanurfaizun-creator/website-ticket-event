<x-app-layout>
    <x-slot name="title">Page Not Found — TIXLY</x-slot>

    <div class="error-page">
        <div class="error-content">
            <span class="error-code">404</span>
            <h1 class="error-title">This page took a night off</h1>
            <p class="error-sub">
                The page you're looking for doesn't exist or may have been moved.
            </p>
            <div class="error-actions">
                <a href="{{ url('/') }}" class="btn-gold">Back to Home</a>
                <a href="{{ route('events.index') }}" class="view-all-btn">
                    Browse Events
                </a>
            </div>
        </div>
    </div>
</x-app-layout>