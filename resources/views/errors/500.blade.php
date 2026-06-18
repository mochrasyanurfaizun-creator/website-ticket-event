<x-app-layout>
    <x-slot name="title">Something Went Wrong — TIXLY</x-slot>

    <div class="error-page">
        <div class="error-content">
            <span class="error-code">500</span>
            <h1 class="error-title">Something went wrong</h1>
            <p class="error-sub">
                We're working on it. Please try again in a moment.
            </p>
            <div class="error-actions">
                <a href="{{ url('/') }}" class="btn-gold">Back to Home</a>
            </div>
        </div>
    </div>
</x-app-layout>