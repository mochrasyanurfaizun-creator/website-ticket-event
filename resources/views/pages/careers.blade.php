<x-app-layout>
    <x-slot name="title">Careers — TIXLY</x-slot>

    <div class="careers-page">

        {{-- Hero --}}
        <div class="careers-hero">
            <div class="careers-hero-bg"></div>
            <div class="section-wrap careers-hero-content">
                <span class="section-eyebrow">Careers</span>
                <h1 class="careers-hero-title">Bangun masa depan <em>live events</em> bersama kami</h1>
                <p class="careers-hero-sub">
                    TIXLY mencari orang-orang penuh semangat yang ingin mengubah cara
                    orang menemukan dan menikmati event di Indonesia.
                </p>
            </div>
        </div>

        {{-- Budaya kerja / nilai --}}
        <div class="section-wrap careers-section">
            <div class="careers-section-head">
                <span class="section-eyebrow">Why TIXLY</span>
                <h2 class="careers-section-title">Tempat tumbuh &amp; berkarya</h2>
            </div>

            <div class="careers-values">
                <div class="careers-value">
                    <div class="careers-value-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="1.6">
                            <path d="M13 2L3 14h9l-1 8 10-12h-9z"/>
                        </svg>
                    </div>
                    <h3 class="careers-value-title">Bergerak Cepat</h3>
                    <p class="careers-value-desc">Kami percaya pada eksperimen, iterasi cepat, dan belajar dari setiap langkah.</p>
                </div>

                <div class="careers-value">
                    <div class="careers-value-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="1.6">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                            <circle cx="9" cy="7" r="4"/>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/>
                        </svg>
                    </div>
                    <h3 class="careers-value-title">Tim Solid</h3>
                    <p class="careers-value-desc">Kolaborasi lintas tim tanpa ego. Kami menang dan belajar bersama.</p>
                </div>

                <div class="careers-value">
                    <div class="careers-value-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="1.6">
                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
                            <path d="M22 4 12 14.01l-3-3"/>
                        </svg>
                    </div>
                    <h3 class="careers-value-title">Dampak Nyata</h3>
                    <p class="careers-value-desc">Karyamu langsung dirasakan ribuan penonton dan penyelenggara event.</p>
                </div>
            </div>
        </div>

        {{-- Benefit --}}
        <div class="careers-perks-wrap">
            <div class="section-wrap">
                <div class="careers-section-head">
                    <span class="section-eyebrow">Benefits</span>
                    <h2 class="careers-section-title">Yang kamu dapatkan</h2>
                </div>

                <div class="careers-perks">
                    <div class="careers-perk"><span class="careers-perk-check">✓</span> Gaji kompetitif &amp; bonus kinerja</div>
                    <div class="careers-perk"><span class="careers-perk-check">✓</span> Fleksibel kerja remote / hybrid</div>
                    <div class="careers-perk"><span class="careers-perk-check">✓</span> Asuransi kesehatan</div>
                    <div class="careers-perk"><span class="careers-perk-check">✓</span> Tiket event gratis</div>
                    <div class="careers-perk"><span class="careers-perk-check">✓</span> Budget pengembangan diri</div>
                    <div class="careers-perk"><span class="careers-perk-check">✓</span> Cuti tahunan fleksibel</div>
                    <div class="careers-perk"><span class="careers-perk-check">✓</span> Perangkat kerja disediakan</div>
                    <div class="careers-perk"><span class="careers-perk-check">✓</span> Lingkungan kerja suportif</div>
                </div>
            </div>
        </div>

        {{-- Lowongan --}}
        <div class="section-wrap careers-section">
            <div class="careers-section-head">
                <span class="section-eyebrow">Open Positions</span>
                <h2 class="careers-section-title">Lowongan tersedia</h2>
            </div>

            <div class="careers-jobs">
                <div class="careers-job">
                    <div class="careers-job-info">
                        <h3 class="careers-job-title">Product Designer</h3>
                        <div class="careers-job-meta">
                            <span>Design</span><span>·</span><span>Full-time</span><span>·</span><span>Hybrid</span>
                        </div>
                    </div>
                    <a href="{{ route('contact') }}" class="btn-ghost careers-apply">Apply →</a>
                </div>

                <div class="careers-job">
                    <div class="careers-job-info">
                        <h3 class="careers-job-title">Customer Support Specialist</h3>
                        <div class="careers-job-meta">
                            <span>Operations</span><span>·</span><span>Full-time</span><span>·</span><span>Surabaya</span>
                        </div>
                    </div>
                    <a href="{{ route('contact') }}" class="btn-ghost careers-apply">Apply →</a>
                </div>

                <div class="careers-job">
                    <div class="careers-job-info">
                        <h3 class="careers-job-title">Marketing Lead</h3>
                        <div class="careers-job-meta">
                            <span>Marketing</span><span>·</span><span>Full-time</span><span>·</span><span>Jakarta</span>
                        </div>
                    </div>
                    <a href="{{ route('contact') }}" class="btn-ghost careers-apply">Apply →</a>
                </div>
            </div>
        </div>

        {{-- CTA --}}
        <div class="careers-cta">
            <div class="section-wrap" style="text-align:center;">
                <h3 class="careers-cta-title">Tidak menemukan posisi yang cocok?</h3>
                <p class="careers-cta-sub">Kami selalu terbuka untuk talenta hebat. Kirim CV-mu ke kami.</p>
                <a href="{{ route('contact') }}" class="btn-gold">Hubungi Kami</a>
            </div>
        </div>

    </div>

</x-app-layout>