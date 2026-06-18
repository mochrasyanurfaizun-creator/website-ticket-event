<x-app-layout>
    <x-slot name="title">Help Center — TIXLY</x-slot>

    <div class="help-page">

        {{-- Hero --}}
        <div class="help-hero">
            <div class="help-hero-bg"></div>
            <div class="section-wrap help-hero-content">
                <span class="section-eyebrow">Help Center</span>
                <h1 class="help-hero-title">Ada yang bisa <em>kami bantu?</em></h1>
                <p class="help-hero-sub">
                    Temukan jawaban untuk pertanyaan yang sering diajukan seputar
                    pembelian tiket, pembayaran, dan event di TIXLY.
                </p>
            </div>
        </div>

        <div class="section-wrap help-body">

            {{-- ── Kategori: Tiket & Pembelian ── --}}
            <div class="help-category">
                <h2 class="help-category-title">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="1.6">
                        <path d="M2 9a3 3 0 0 1 0 6v2a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-2a3 3 0 0 1 0-6V7a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2z"/>
                        <line x1="13" y1="5" x2="13" y2="19"/>
                    </svg>
                    Tiket &amp; Pembelian
                </h2>
                <div class="help-faq">
                    <details class="help-faq-item">
                        <summary class="help-faq-q">Bagaimana cara membeli tiket?</summary>
                        <div class="help-faq-a">Pilih event yang kamu inginkan, klik "Proceed to Checkout", pilih tipe tiket dan jumlah, isi data diri, lalu selesaikan pembayaran. E-ticket akan langsung tersedia di dashboard.</div>
                    </details>
                    <details class="help-faq-item">
                        <summary class="help-faq-q">Di mana saya bisa melihat tiket yang sudah dibeli?</summary>
                        <div class="help-faq-a">Semua tiket kamu tersimpan di Dashboard. Login ke akunmu, lalu buka menu Dashboard untuk melihat e-ticket beserta QR code-nya.</div>
                    </details>
                    <details class="help-faq-item">
                        <summary class="help-faq-q">Apakah saya bisa membeli tiket untuk orang lain?</summary>
                        <div class="help-faq-a">Bisa. Saat checkout, isi kolom data diri sesuai dengan nama pemegang tiket yang akan hadir di event.</div>
                    </details>
                    <details class="help-faq-item">
                        <summary class="help-faq-q">Berapa banyak tiket yang bisa saya beli sekaligus?</summary>
                        <div class="help-faq-a">Maksimal 10 tiket per transaksi, tergantung ketersediaan stok tipe tiket yang dipilih.</div>
                    </details>
                </div>
            </div>

            {{-- ── Kategori: E-Ticket & Masuk Venue ── --}}
            <div class="help-category">
                <h2 class="help-category-title">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="1.6">
                        <path d="M3 7V5a2 2 0 0 1 2-2h2M17 3h2a2 2 0 0 1 2 2v2M21 17v2a2 2 0 0 1-2 2h-2M7 21H5a2 2 0 0 1-2-2v-2"/>
                        <line x1="3" y1="12" x2="21" y2="12"/>
                    </svg>
                    E-Ticket &amp; Masuk Venue
                </h2>
                <div class="help-faq">
                    <details class="help-faq-item">
                        <summary class="help-faq-q">Bagaimana cara menggunakan e-ticket di pintu masuk?</summary>
                        <div class="help-faq-a">Tunjukkan QR code pada e-ticket kamu ke petugas di pintu masuk. Petugas akan men-scan QR untuk verifikasi. Pastikan layar HP cukup terang.</div>
                    </details>
                    <details class="help-faq-item">
                        <summary class="help-faq-q">Apakah saya perlu mencetak tiket?</summary>
                        <div class="help-faq-a">Tidak wajib. Kamu bisa menunjukkan e-ticket langsung dari HP. Tapi jika ingin, ada tombol "Download / Print" di halaman tiket.</div>
                    </details>
                    <details class="help-faq-item">
                        <summary class="help-faq-q">QR code saya sudah ter-scan, apakah bisa dipakai lagi?</summary>
                        <div class="help-faq-a">Tidak. Setiap tiket hanya bisa digunakan satu kali masuk. Setelah ter-scan, status tiket berubah menjadi "used".</div>
                    </details>
                    <details class="help-faq-item">
                        <summary class="help-faq-q">Tiket saya tidak muncul di dashboard, bagaimana?</summary>
                        <div class="help-faq-a">Pastikan pembayaran sudah berhasil. Jika sudah tapi tiket belum muncul, hubungi support dengan menyertakan kode order kamu.</div>
                    </details>
                </div>
            </div>

            {{-- ── Kategori: Pembayaran ── --}}
            <div class="help-category">
                <h2 class="help-category-title">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="1.6">
                        <rect x="2" y="5" width="20" height="14" rx="2"/>
                        <line x1="2" y1="10" x2="22" y2="10"/>
                    </svg>
                    Pembayaran
                </h2>
                <div class="help-faq">
                    <details class="help-faq-item">
                        <summary class="help-faq-q">Metode pembayaran apa saja yang tersedia?</summary>
                        <div class="help-faq-a">TIXLY mendukung berbagai metode pembayaran yang bisa kamu pilih saat checkout. Pilihan akan ditampilkan di halaman pembayaran.</div>
                    </details>
                    <details class="help-faq-item">
                        <summary class="help-faq-q">Apakah pembayaran di TIXLY aman?</summary>
                        <div class="help-faq-a">Ya. Seluruh proses checkout dilindungi dan kami tidak menyimpan data sensitif pembayaran kamu.</div>
                    </details>
                    <details class="help-faq-item">
                        <summary class="help-faq-q">Pembayaran berhasil tapi tiket belum terbit?</summary>
                        <div class="help-faq-a">Biasanya tiket terbit otomatis dalam beberapa saat. Jika lebih dari 15 menit belum muncul, hubungi support kami.</div>
                    </details>
                </div>
            </div>

            {{-- ── Kategori: Refund & Pembatalan ── --}}
            <div class="help-category">
                <h2 class="help-category-title">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="1.6">
                        <path d="M3 12a9 9 0 1 0 9-9 9.75 9.75 0 0 0-6.74 2.74L3 8"/>
                        <path d="M3 3v5h5"/>
                    </svg>
                    Refund &amp; Pembatalan
                </h2>
                <div class="help-faq">
                    <details class="help-faq-item">
                        <summary class="help-faq-q">Apakah tiket bisa direfund?</summary>
                        <div class="help-faq-a">Kebijakan refund mengikuti ketentuan masing-masing event. Silakan baca halaman Refund Policy untuk detail lengkapnya.</div>
                    </details>
                    <details class="help-faq-item">
                        <summary class="help-faq-q">Bagaimana jika event dibatalkan?</summary>
                        <div class="help-faq-a">Jika event dibatalkan oleh penyelenggara, kamu akan dihubungi melalui email terkait proses refund atau penjadwalan ulang.</div>
                    </details>
                    <details class="help-faq-item">
                        <summary class="help-faq-q">Bisakah saya mengganti nama di tiket?</summary>
                        <div class="help-faq-a">Perubahan nama pemegang tiket tergantung kebijakan event. Hubungi support untuk bantuan lebih lanjut.</div>
                    </details>
                </div>
            </div>

            {{-- ── Kategori: Akun ── --}}
            <div class="help-category">
                <h2 class="help-category-title">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="1.6">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                        <circle cx="12" cy="7" r="4"/>
                    </svg>
                    Akun
                </h2>
                <div class="help-faq">
                    <details class="help-faq-item">
                        <summary class="help-faq-q">Bagaimana cara membuat akun?</summary>
                        <div class="help-faq-a">Klik "Register" di pojok kanan atas, isi nama, email, dan kata sandi, lalu verifikasi. Akun kamu langsung siap digunakan.</div>
                    </details>
                    <details class="help-faq-item">
                        <summary class="help-faq-q">Saya lupa kata sandi, bagaimana?</summary>
                        <div class="help-faq-a">Di halaman login, klik "Forgot password?", masukkan email kamu, dan ikuti link reset yang dikirim ke email untuk membuat kata sandi baru.</div>
                    </details>
                    <details class="help-faq-item">
                        <summary class="help-faq-q">Bagaimana cara mengubah data profil?</summary>
                        <div class="help-faq-a">Login, buka Dashboard, lalu masuk ke pengaturan profil untuk mengubah nama, email, atau kata sandi.</div>
                    </details>
                </div>
            </div>

            {{-- CTA bawah --}}
            <div class="help-cta">
                <h3 class="help-cta-title">Belum menemukan jawaban?</h3>
                <p class="help-cta-sub">Tim support kami siap membantu kamu secara langsung.</p>
                <a href="{{ route('contact') }}" class="btn-gold">Hubungi Support</a>
            </div>

        </div>
    </div>

</x-app-layout>