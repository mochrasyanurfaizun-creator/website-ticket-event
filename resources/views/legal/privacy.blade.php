<x-app-layout>
    <x-slot name="title">Privacy Policy — TIXLY</x-slot>

    <div class="legal-page">
        <div class="legal-container">

            {{-- Header --}}
            <div class="legal-header">
                <span class="section-eyebrow">Legal</span>
                <h1 class="legal-title">Privacy Policy</h1>
                <p class="legal-meta">
                    Last updated: June 10, 2026 · Effective immediately
                </p>
            </div>

            {{-- Content --}}
            <div class="legal-body">

                <div class="legal-intro">
                    <p>
                        At TIXLY, your privacy matters. This Privacy Policy explains
                        how we collect, use, and protect your personal information
                        when you use our platform.
                    </p>
                </div>

                <div class="legal-section">
                    <h2 class="legal-h2">1. Information We Collect</h2>
                    <p>We collect the following types of information:</p>
                    <ul class="legal-list">
                        <li><strong>Account data:</strong> Name, email address, and password</li>
                        <li><strong>Purchase data:</strong> Ticket orders, payment method type, and transaction history</li>
                        <li><strong>Usage data:</strong> Pages visited, search queries, and click patterns</li>
                        <li><strong>Device data:</strong> IP address, browser type, and operating system</li>
                        <li><strong>Location data:</strong> City-level location when you search for nearby events</li>
                    </ul>
                </div>

                <div class="legal-section">
                    <h2 class="legal-h2">2. How We Use Your Information</h2>
                    <p>We use your information to:</p>
                    <ul class="legal-list">
                        <li>Process ticket purchases and send confirmations</li>
                        <li>Personalize event recommendations</li>
                        <li>Send transactional emails (order receipts, reminders)</li>
                        <li>Improve platform performance and features</li>
                        <li>Detect and prevent fraud</li>
                        <li>Comply with legal obligations</li>
                    </ul>
                    <p>We will never sell your personal data to third parties for marketing purposes.</p>
                </div>

                <div class="legal-section">
                    <h2 class="legal-h2">3. Data Sharing</h2>
                    <p>We may share your data with:</p>
                    <ul class="legal-list">
                        <li><strong>Event organizers:</strong> Name and contact info for ticket verification</li>
                        <li><strong>Payment processors:</strong> Necessary data to complete transactions</li>
                        <li><strong>Service providers:</strong> Analytics, email, and hosting services under strict data agreements</li>
                        <li><strong>Legal authorities:</strong> When required by law or court order</li>
                    </ul>
                </div>

                <div class="legal-section">
                    <h2 class="legal-h2">4. Data Security</h2>
                    <p>We protect your data using industry-standard measures including:</p>
                    <ul class="legal-list">
                        <li>SSL/TLS encryption for all data transmission</li>
                        <li>Hashed and salted password storage</li>
                        <li>Regular security audits and penetration testing</li>
                        <li>Limited employee access on a need-to-know basis</li>
                    </ul>
                    <p>While we take security seriously, no system is completely secure. Please use a strong, unique password for your TIXLY account.</p>
                </div>

                <div class="legal-section">
                    <h2 class="legal-h2">5. Cookies</h2>
                    <p>TIXLY uses cookies to:</p>
                    <ul class="legal-list">
                        <li>Keep you signed in across sessions</li>
                        <li>Remember your preferences and cart</li>
                        <li>Analyze traffic and usage patterns</li>
                    </ul>
                    <p>You can disable cookies in your browser settings, but some features may not work correctly without them.</p>
                </div>

                <div class="legal-section">
                    <h2 class="legal-h2">6. Your Rights</h2>
                    <p>As a user, you have the right to:</p>
                    <ul class="legal-list">
                        <li><strong>Access:</strong> Request a copy of your personal data</li>
                        <li><strong>Correction:</strong> Update inaccurate information via your account settings</li>
                        <li><strong>Deletion:</strong> Request account and data deletion</li>
                        <li><strong>Portability:</strong> Export your data in a machine-readable format</li>
                        <li><strong>Opt-out:</strong> Unsubscribe from marketing emails at any time</li>
                    </ul>
                    <p>To exercise these rights, contact us at privacy@tixly.id</p>
                </div>

                <div class="legal-section">
                    <h2 class="legal-h2">7. Data Retention</h2>
                    <p>We retain your personal data for as long as your account is active or as needed to provide services. After account deletion, we may retain anonymized data for analytics purposes for up to 2 years.</p>
                </div>

                <div class="legal-section">
                    <h2 class="legal-h2">8. Children's Privacy</h2>
                    <p>TIXLY is not intended for users under 13 years of age. We do not knowingly collect personal information from children. If you believe a child has provided us with personal data, please contact us immediately.</p>
                </div>

                <div class="legal-section">
                    <h2 class="legal-h2">9. Changes to This Policy</h2>
                    <p>We may update this Privacy Policy periodically. We will notify you of significant changes via email or a prominent notice on our platform. Continued use after changes means you accept the updated policy.</p>
                </div>

                <div class="legal-section">
                    <h2 class="legal-h2">10. Contact Us</h2>
                    <p>For privacy-related questions or requests:</p>
                    <div class="legal-contact">
                        <p>support@tixly.id</p>
                        <p>Jakarta, Indonesia</p>
                    </div>
                </div>

            </div>

            {{-- Footer nav --}}
            <div class="legal-footer-nav">
                <a href="{{ route('terms') }}" class="legal-nav-link">
                    Read our Terms of Service
                </a>
                <a href="{{ url('/') }}" class="legal-nav-link">
                    Back to TIXLY
                </a>
            </div>

        </div>
    </div>

</x-app-layout>