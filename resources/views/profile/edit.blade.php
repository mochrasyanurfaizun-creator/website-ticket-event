<x-app-layout>
    <x-slot name="title">Profile Settings — TIXLY</x-slot>

    <div class="profile-page">

        {{-- Header --}}
        <div class="profile-header">
            <div class="section-wrap">
                <a href="{{ route('dashboard') }}" class="profile-back">
                    ← Back to dashboard
                </a>
                <span class="section-eyebrow">Settings</span>
                <h1 class="profile-title">Account Settings</h1>
                <p class="profile-sub">
                    Manage your profile, password, and account preferences
                </p>
            </div>
        </div>

        <div class="section-wrap profile-body">

            {{-- Profile Information --}}
            <div class="profile-card">
                @include('profile.partials.update-profile-information-form')
            </div>

            {{-- Password --}}
            <div class="profile-card">
                @include('profile.partials.update-password-form')
            </div>

            {{-- Delete Account --}}
            <div class="profile-card profile-card-danger">
                @include('profile.partials.delete-user-form')
            </div>

        </div>
    </div>

</x-app-layout>