<x-app-layout>
    <x-slot name="title">Contact Us — TIXLY</x-slot>

    <div class="contact-page">

        {{-- Hero --}}
        <div class="contact-hero">
            <div class="contact-hero-bg"></div>
            <div class="section-wrap contact-hero-content">
                <span class="section-eyebrow">Support</span>
                <h1 class="contact-hero-title">Hubungi <em>Kami</em></h1>
                <p class="contact-hero-sub">
                    Punya pertanyaan tentang tiket, pembayaran, atau event?
                    Tim support TIXLY siap membantu kamu.
                </p>
            </div>
        </div>

        {{-- Kontak cards --}}
        <div class="section-wrap contact-body">

            <div class="contact-grid">
                <div class="contact-card">
                    <div class="contact-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="1.6">
                            <rect x="2" y="4" width="20" height="16" rx="2"/>
                            <path d="m22 7-10 5L2 7"/>
                        </svg>
                    </div>
                    <h3 class="contact-card-title">Email</h3>
                    <p class="contact-card-text">Respon dalam 1×24 jam</p>
                    <a href="mailto:support@tixly.id" class="contact-card-link">support@tixly.id</a>
                </div>

                <div class="contact-card">
                    <div class="contact-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="1.6">
                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07
                                     19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3
                                     a2 2 0 0 1 2 1.72c.13.96.36 1.9.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91
                                     a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.91.34 1.85.57 2.81.7
                                     A2 2 0 0 1 22 16.92z"/>
                        </svg>
                    </div>
                    <h3 class="contact-card-title">WhatsApp</h3>
                    <p class="contact-card-text">Senin–Jumat, 09.00–18.00 WIB</p>
                    <a href="https://wa.me/6281234567890" class="contact-card-link">+62 812 3456 7890</a>
                </div>

                <div class="contact-card">
                    <div class="contact-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="1.6">
                            <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z"/>
                            <circle cx="12" cy="9" r="2.5"/>
                        </svg>
                    </div>
                    <h3 class="contact-card-title">Kantor</h3>
                    <p class="contact-card-text">Kunjungi kami</p>
                    <span class="contact-card-link">Jakarta, Indonesia</span>
                </div>
            </div>

            {{-- Jam operasional + sosmed --}}
            <div class="contact-info-row">
                <div class="contact-hours">
                    <h3 class="contact-section-title">Jam Operasional Support</h3>
                    <ul class="contact-hours-list">
                        <li><span>Senin – Jumat</span><span>09.00 – 18.00 WIB</span></li>
                        <li><span>Sabtu</span><span>09.00 – 14.00 WIB</span></li>
                        <li><span>Minggu &amp; Libur</span><span>Tutup</span></li>
                    </ul>
                </div>

                <div class="contact-social">
                    <h3 class="contact-section-title">Ikuti Kami</h3>
                    <div class="contact-social-links">
                        <a href="#" class="contact-social-btn">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                                 stroke="currentColor" stroke-width="1.6">
                                <rect x="2" y="2" width="20" height="20" rx="5"/>
                                <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/>
                                <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/>
                            </svg>
                            Instagram
                        </a>
                        <a href="#" class="contact-social-btn">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                                 stroke="currentColor" stroke-width="1.6">
                                <path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1
                                         A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5
                                         a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"/>
                            </svg>
                            Twitter / X
                        </a>
                        <a href="#" class="contact-social-btn">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                                 stroke="currentColor" stroke-width="1.6">
                                <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/>
                            </svg>
                            Facebook
                        </a>
                    </div>
                </div>
            </div>

            {{-- FAQ singkat --}}
            <div class="contact-faq">
                <h3 class="contact-section-title">Pertanyaan Umum</h3>
                <div class="contact-faq-grid">
                    <div class="contact-faq-item">
                        <span class="contact-faq-q">Bagaimana cara mendapatkan e-ticket?</span>
                        <span class="contact-faq-a">Setelah pembayaran, e-ticket langsung tersedia di dashboard akun kamu.</span>
                    </div>
                    <div class="contact-faq-item">
                        <span class="contact-faq-q">Apakah tiket bisa direfund?</span>
                        <span class="contact-faq-a">Kebijakan refund mengikuti ketentuan tiap event. Lihat halaman Refund Policy.</span>
                    </div>
                    <div class="contact-faq-item">
                        <span class="contact-faq-q">Tiket saya tidak muncul, bagaimana?</span>
                        <span class="contact-faq-a">Hubungi support via email dengan menyertakan kode order kamu.</span>
                    </div>
                    <div class="contact-faq-item">
                        <span class="contact-faq-q">Bisa beli tiket untuk orang lain?</span>
                        <span class="contact-faq-a">Bisa. Saat checkout, isi data diri sesuai pemegang tiket.</span>
                    </div>
                </div>
            </div>

        </div>
    </div>

</x-app-layout>