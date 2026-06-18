<x-app-layout>
    <x-slot name="title">Press — TIXLY</x-slot>

    <div class="press-page">

        {{-- Hero --}}
        <div class="press-hero">
            <div class="press-hero-bg"></div>
            <div class="section-wrap press-hero-content">
                <span class="section-eyebrow">Press &amp; Media</span>
                <h1 class="press-hero-title">Ruang <em>pers</em> TIXLY</h1>
                <p class="press-hero-sub">
                    Sumber resmi untuk media, jurnalis, dan mitra yang ingin
                    meliput TIXLY. Temukan fakta, aset brand, dan kontak pers di sini.
                </p>
            </div>
        </div>

        {{-- Fakta perusahaan --}}
        <div class="press-facts-wrap">
            <div class="section-wrap">
                <div class="press-facts">
                    <div class="press-fact">
                        <span class="press-fact-num">2026</span>
                        <span class="press-fact-label">Tahun Berdiri</span>
                    </div>
                    <div class="press-fact">
                        <span class="press-fact-num">50K+</span>
                        <span class="press-fact-label">Tiket Terjual</span>
                    </div>
                    <div class="press-fact">
                        <span class="press-fact-num">200+</span>
                        <span class="press-fact-label">Event Terdaftar</span>
                    </div>
                    <div class="press-fact">
                        <span class="press-fact-num">20+</span>
                        <span class="press-fact-label">Kota di Indonesia</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Tentang singkat --}}
        <div class="section-wrap press-section">
            <div class="press-about">
                <div class="press-about-text">
                    <span class="section-eyebrow">About TIXLY</span>
                    <h2 class="press-section-title">Tentang Perusahaan</h2>
                    <p class="press-paragraph">
                        TIXLY adalah platform ticketing event di Indonesia yang menghubungkan
                        penonton dengan konser, festival, pertunjukan, dan acara langsung lainnya.
                        Dengan pengalaman pembelian yang mulus dan e-ticket berbasis QR,
                        TIXLY hadir untuk membuat menikmati live event jadi lebih mudah.
                    </p>
                    <p class="press-paragraph">
                        Untuk pertanyaan media, wawancara, atau permintaan informasi lebih lanjut,
                        silakan hubungi tim pers kami.
                    </p>
                </div>
            </div>
        </div>

        {{-- Media kit --}}
        <div class="press-kit-wrap">
            <div class="section-wrap">
                <div class="press-section-head">
                    <span class="section-eyebrow">Media Kit</span>
                    <h2 class="press-section-title">Aset Brand</h2>
                    <p class="press-section-sub">
                        Logo dan aset resmi TIXLY untuk keperluan pemberitaan.
                        Mohon gunakan sesuai panduan brand.
                    </p>
                </div>

                <div class="press-kit-grid">
                    <div class="press-kit-item">
                        <div class="press-kit-preview press-kit-dark">
                            <span class="press-kit-logo">TIXLY</span>
                        </div>
                        <div class="press-kit-info">
                            <span class="press-kit-name">Logo — Light on Dark</span>
                            <a href="{{ route('contact') }}" class="press-kit-link">Request asset →</a>
                        </div>
                    </div>

                    <div class="press-kit-item">
                        <div class="press-kit-preview press-kit-light">
                            <span class="press-kit-logo press-kit-logo-dark">TIXLY</span>
                        </div>
                        <div class="press-kit-info">
                            <span class="press-kit-name">Logo — Dark on Light</span>
                            <a href="{{ route('contact') }}" class="press-kit-link">Request asset →</a>
                        </div>
                    </div>

                    <div class="press-kit-item">
                        <div class="press-kit-preview press-kit-gold">
                            <span class="press-kit-swatch"></span>
                        </div>
                        <div class="press-kit-info">
                            <span class="press-kit-name">Brand Colors</span>
                            <a href="{{ route('contact') }}" class="press-kit-link">Request palette →</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Siaran pers --}}
        <div class="section-wrap press-section">
            <div class="press-section-head">
                <span class="section-eyebrow">Press Releases</span>
                <h2 class="press-section-title">Siaran Pers Terbaru</h2>
            </div>

            <div class="press-releases">
                <div class="press-release">
                    <span class="press-release-date">Juni 2026</span>
                    <div class="press-release-body">
                        <h3 class="press-release-title">TIXLY Resmi Diluncurkan di Indonesia</h3>
                        <p class="press-release-excerpt">
                            Platform ticketing event baru hadir untuk mempermudah penonton
                            menemukan dan membeli tiket konser serta festival.
                        </p>
                    </div>
                    <a href="{{ route('contact') }}" class="press-release-link">Baca →</a>
                </div>

                <div class="press-release">
                    <span class="press-release-date">Juni 2026</span>
                    <div class="press-release-body">
                        <h3 class="press-release-title">TIXLY Hadirkan E-Ticket Berbasis QR</h3>
                        <p class="press-release-excerpt">
                            Sistem verifikasi tiket digital untuk pengalaman masuk venue
                            yang lebih cepat dan aman.
                        </p>
                    </div>
                    <a href="{{ route('contact') }}" class="press-release-link">Baca →</a>
                </div>
            </div>
        </div>

        {{-- Kontak pers --}}
        <div class="press-contact-wrap">
            <div class="section-wrap" style="text-align:center;">
                <h3 class="press-contact-title">Kontak Pers</h3>
                <p class="press-contact-sub">
                    Untuk pertanyaan media, wawancara, atau permintaan aset brand.
                </p>
                <a href="mailto:press@tixly.id" class="press-contact-email">press@tixly.id</a>
            </div>
        </div>

    </div>

</x-app-layout>