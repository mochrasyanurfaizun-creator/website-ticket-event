<x-app-layout>
    <x-slot name="title">Access Denied — TIXLY</x-slot>

    <div class="error-page">
        <div class="error-content">
            <span class="error-code">403</span>
            <h1 class="error-title">Access denied</h1>
            <p class="error-sub">
                You don't have permission to view this page.
            </p>
            <div class="error-actions">
                <a href="{{ url('/') }}" class="btn-gold">Back to Home</a>
            </div>
        </div>
    </div>
</x-app-layout>