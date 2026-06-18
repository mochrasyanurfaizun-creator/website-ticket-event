<x-app-layout>
    <x-slot name="title">Refund Policy — TIXLY</x-slot>

    <div class="legal-page">
        <div class="legal-container">

            {{-- Header --}}
            <div class="legal-header">
                <span class="section-eyebrow">Legal</span>
                <h1 class="legal-title">Refund Policy</h1>
                <p class="legal-meta">Last updated: June 2026</p>
            </div>

            {{-- Intro --}}
            <div class="legal-intro">
                <p>
                    We want you to feel confident when booking through TIXLY.
                    This policy explains when and how refunds are issued for
                    tickets purchased on our platform.
                </p>
            </div>

            {{-- Body --}}
            <div class="legal-body">

                <div class="legal-section">
                    <h2 class="legal-h2">1. Event Cancellations</h2>
                    <p>
                        If an event is <strong>cancelled</strong> by the organizer,
                        you are entitled to a full refund of the ticket price.
                        Refunds are processed automatically to your original payment
                        method within 7–14 business days.
                    </p>
                </div>

                <div class="legal-section">
                    <h2 class="legal-h2">2. Event Rescheduling</h2>
                    <p>
                        If an event is <strong>rescheduled</strong>, your ticket
                        remains valid for the new date. If you cannot attend the
                        new date, you may request a refund within the timeframe
                        announced by the organizer.
                    </p>
                </div>

                <div class="legal-section">
                    <h2 class="legal-h2">3. Change of Mind</h2>
                    <p>
                        Tickets purchased are generally <strong>non-refundable</strong>
                        for change of mind, in line with standard event ticketing
                        practice. Please review your order carefully before completing
                        your purchase.
                    </p>
                </div>

                <div class="legal-section">
                    <h2 class="legal-h2">4. How to Request a Refund</h2>
                    <p>To request an eligible refund, follow these steps:</p>
                    <ul class="legal-list">
                        <li>Log in to your TIXLY account and go to your dashboard.</li>
                        <li>Find the relevant order under "My Tickets".</li>
                        <li>Contact our support team with your order code.</li>
                        <li>Our team will review and process eligible requests.</li>
                    </ul>
                </div>

                <div class="legal-section">
                    <h2 class="legal-h2">5. Processing Time</h2>
                    <p>
                        Approved refunds are returned to your original payment method.
                        Processing typically takes 7–14 business days, depending on
                        your bank or payment provider.
                    </p>
                </div>

                <div class="legal-section">
                    <h2 class="legal-h2">6. Service Fees</h2>
                    <p>
                        Service fees may be <strong>non-refundable</strong> except in
                        the case of event cancellation. The refundable amount will be
                        clearly communicated during the refund process.
                    </p>
                </div>

                <div class="legal-section">
                    <h2 class="legal-h2">7. Contact Us</h2>
                    <p>
                        For any refund questions or to start a request, reach out to
                        our support team.
                    </p>
                    <div class="legal-contact">
                        <p>Email: support@tixly.id</p>
                        <p>Response time: within 1–2 business days</p>
                    </div>
                </div>

            </div>

            {{-- Footer nav --}}
            <div class="legal-footer-nav">
                <a href="{{ route('terms') }}" class="legal-nav-link">← Terms of Service</a>
                <a href="{{ route('privacy') }}" class="legal-nav-link">Privacy Policy →</a>
            </div>

        </div>
    </div>

</x-app-layout>