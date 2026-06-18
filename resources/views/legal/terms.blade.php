<x-app-layout>
    <x-slot name="title">Terms of Service — TIXLY</x-slot>

    <div class="legal-page">
        <div class="legal-container">

            {{-- Header --}}
            <div class="legal-header">
                <span class="section-eyebrow">Legal</span>
                <h1 class="legal-title">Terms of Service</h1>
                <p class="legal-meta">
                    Last updated: June 10, 2026 · Effective immediately
                </p>
            </div>

            {{-- Content --}}
            <div class="legal-body">

                <div class="legal-intro">
                    <p>
                        Welcome to TIXLY. By accessing or using our platform,
                        you agree to be bound by these Terms of Service.
                        Please read them carefully before purchasing tickets
                        or creating an account.
                    </p>
                </div>

                <div class="legal-section">
                    <h2 class="legal-h2">1. Acceptance of Terms</h2>
                    <p>By accessing TIXLY, you confirm that you are at least 17 years of age and agree to these Terms. If you are using TIXLY on behalf of an organization, you represent that you have authority to bind that organization to these Terms.</p>
                </div>

                <div class="legal-section">
                    <h2 class="legal-h2">2. Account Registration</h2>
                    <p>To purchase tickets or access certain features, you must create an account. You agree to:</p>
                    <ul class="legal-list">
                        <li>Provide accurate and complete information</li>
                        <li>Maintain the security of your password</li>
                        <li>Notify us immediately of any unauthorized access</li>
                        <li>Be responsible for all activity under your account</li>
                    </ul>
                    <p>TIXLY reserves the right to suspend or terminate accounts that violate these Terms.</p>
                </div>

                <div class="legal-section">
                    <h2 class="legal-h2">3. Ticket Purchases</h2>
                    <p>All ticket purchases are subject to the following conditions:</p>
                    <ul class="legal-list">
                        <li>Prices are listed in Indonesian Rupiah (IDR) and include applicable taxes</li>
                        <li>Payment must be completed at the time of purchase</li>
                        <li>Tickets are non-transferable unless explicitly stated otherwise</li>
                        <li>Each ticket is valid for one-time entry only</li>
                        <li>TIXLY is not responsible for lost or stolen tickets</li>
                    </ul>
                </div>

                <div class="legal-section">
                    <h2 class="legal-h2">4. Refund Policy</h2>
                    <p>Refunds are available under the following circumstances:</p>
                    <ul class="legal-list">
                        <li><strong>Event cancellation:</strong> Full refund within 7 business days</li>
                        <li><strong>Event postponement:</strong> Option to request refund within 48 hours of announcement</li>
                        <li><strong>Buyer's remorse:</strong> No refunds once purchase is confirmed</li>
                        <li><strong>Technical issues:</strong> Contact support within 24 hours of the issue</li>
                    </ul>
                    <p>All refund requests must be submitted through your account dashboard or by contacting our support team.</p>
                </div>

                <div class="legal-section">
                    <h2 class="legal-h2">5. Prohibited Conduct</h2>
                    <p>You agree not to:</p>
                    <ul class="legal-list">
                        <li>Resell tickets above face value (scalping)</li>
                        <li>Use automated systems to purchase tickets in bulk</li>
                        <li>Create false or misleading events</li>
                        <li>Circumvent security measures on the platform</li>
                        <li>Use the platform for any unlawful purpose</li>
                    </ul>
                </div>

                <div class="legal-section">
                    <h2 class="legal-h2">6. Intellectual Property</h2>
                    <p>All content on TIXLY — including logos, text, graphics, and software — is owned by TIXLY or its licensors and protected by applicable intellectual property laws. You may not reproduce, distribute, or create derivative works without prior written consent.</p>
                </div>

                <div class="legal-section">
                    <h2 class="legal-h2">7. Limitation of Liability</h2>
                    <p>To the fullest extent permitted by law, TIXLY shall not be liable for any indirect, incidental, special, or consequential damages arising from your use of the platform, including but not limited to event cancellations, venue changes, or third-party actions.</p>
                </div>

                <div class="legal-section">
                    <h2 class="legal-h2">8. Governing Law</h2>
                    <p>These Terms are governed by the laws of the Republic of Indonesia. Any disputes arising from these Terms shall be resolved in the courts of Jakarta, Indonesia.</p>
                </div>

                <div class="legal-section">
                    <h2 class="legal-h2">9. Changes to Terms</h2>
                    <p>TIXLY reserves the right to modify these Terms at any time. We will notify registered users of significant changes via email. Continued use of the platform after changes constitutes acceptance of the new Terms.</p>
                </div>

                <div class="legal-section">
                    <h2 class="legal-h2">10. Contact Us</h2>
                    <p>If you have questions about these Terms, please contact us:</p>
                    <div class="legal-contact">
                        <p>support@tixly.id</p>
                        <p>Jakarta, Indonesia</p>
                    </div>
                </div>

            </div>

            {{-- Footer nav --}}
            <div class="legal-footer-nav">
                <a href="{{ route('privacy') }}" class="legal-nav-link">
                    Read our Privacy Policy
                </a>
                <a href="{{ url('/') }}" class="legal-nav-link">
                    Back to TIXLY
                </a>
            </div>

        </div>
    </div>

</x-app-layout>