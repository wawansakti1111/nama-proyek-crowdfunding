@extends('layouts.app')

@section('title', 'Platform Crowdfunding Terpercaya')

@section('content')
<style>
    .donator-count { 
        display: flex; 
        align-items: center; 
        gap: 5px; 
    }
    
    /* Additional styles for enhanced sections */
    .section {
        padding: 4rem 0;
    }
    
    .section-kampanye {
        background: linear-gradient(135deg, var(--bg-light) 0%, var(--secondary-green) 100%);
    }
    
    .section-tentang {
        background: var(--white);
    }
    
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 2rem;
        margin: 3rem 0;
    }
    
    .stat-card {
        background: var(--white);
        padding: 2rem;
        border-radius: 1rem;
        text-align: center;
        box-shadow: var(--shadow);
        border: 2px solid transparent;
        transition: all 0.3s ease;
    }
    
    .stat-card:hover {
        border-color: var(--primary-green-light);
        transform: translateY(-5px);
    }
    
    .stat-number {
        font-size: 2.5rem;
        font-weight: 700;
        color: var(--primary-green);
        display: block;
    }
    
    .stat-label {
        color: var(--text-light);
        font-weight: 600;
        margin-top: 0.5rem;
    }
    
    .features-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
        margin: 3rem 0;
    }
    
    .feature-card {
        background: var(--white);
        padding: 2rem;
        border-radius: 1rem;
        box-shadow: var(--shadow);
        text-align: center;
        transition: all 0.3s ease;
    }
    
    .feature-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-lg);
    }
    
    .feature-icon {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, var(--primary-green), var(--primary-green-light));
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1rem auto;
        color: var(--white);
    }
    
    .feature-title {
        font-size: 1.25rem;
        font-weight: 600;
        margin-bottom: 1rem;
        color: var(--text-dark);
    }
    
    .feature-description {
        color: var(--text-light);
        line-height: 1.6;
    }
</style>

{{-- Hero Section with Slider --}}
<div class="slider-container">
    <div class="slider-wrapper">
        {{-- Slide 1: Pesantren Al-Hidayah --}}
        <div class="slide">
            <div class="slide-content">
                <h3>Pesantren Al-Hidayah</h3>
                <p>Mendidik generasi Qur'ani dengan fasilitas modern dan pembelajaran yang komprehensif. Bergabunglah dalam misi mulia membangun masa depan yang lebih baik.</p>
                <a href="https://pesantren-alhidayah.id" class="slide-btn" target="_blank">Kunjungi Website</a>
            </div>
        </div>
        
        {{-- Slide 2: Pesantren Darul Ulum --}}
        <div class="slide">
            <div class="slide-content">
                <h3>Pesantren Darul Ulum</h3>
                <p>Pusat pendidikan Islam terpadu yang mengombinasikan ilmu agama dan sains modern. Mari bersama membangun generasi yang berakhlak mulia dan berprestasi.</p>
                <a href="https://pesantren-darululum.id" class="slide-btn" target="_blank">Kunjungi Website</a>
            </div>
        </div>
        
        {{-- Slide 3: Pesantren An-Nur --}}
        <div class="slide">
            <div class="slide-content">
                <h3>Pesantren An-Nur</h3>
                <p>Lembaga pendidikan yang fokus pada pembentukan karakter Islami dan pengembangan potensi santri. Bersama kita wujudkan cita-cita pendidikan yang berkualitas.</p>
                <a href="https://pesantren-annur.id" class="slide-btn" target="_blank">Kunjungi Website</a>
            </div>
        </div>
        
        {{-- Slide 4: Pesantren Al-Falah --}}
        <div class="slide">
            <div class="slide-content">
                <h3>Pesantren Al-Falah</h3>
                <p>Menghadirkan pendidikan holistik yang menyeimbangkan spiritual, intelektual, dan sosial. Dukung kami dalam mencerdaskan anak bangsa melalui pendidikan Islam.</p>
                <a href="https://pesantren-alfalah.id" class="slide-btn" target="_blank">Kunjungi Website</a>
            </div>
        </div>
        
        {{-- Slide 5: Pesantren Baitul Hikmah --}}
        <div class="slide">
            <div class="slide-content">
                <h3>Pesantren Baitul Hikmah</h3>
                <p>Rumah kebijaksanaan yang melahirkan ulama dan cendekiawan Muslim. Bergabunglah dalam misi suci mencetak generasi pemimpin masa depan yang berintegritas.</p>
                <a href="https://pesantren-baitulhikmah.id" class="slide-btn" target="_blank">Kunjungi Website</a>
            </div>
        </div>
    </div>
    
    {{-- Slider Navigation Dots --}}
    <div class="slider-nav">
        <div class="nav-dot active"></div>
        <div class="nav-dot"></div>
        <div class="nav-dot"></div>
        <div class="nav-dot"></div>
        <div class="nav-dot"></div>
    </div>
</div>

{{-- Main Content --}}
<div class="content-wrapper">
    <div style="padding: 2rem;">
        <h1 class="page-title">Bantu Mereka yang Membutuhkan</h1>
        <p class="page-subtitle">Setiap donasi Anda membawa harapan baru. Mari berbuat baik bersama dan wujudkan mimpi pendidikan Islam yang berkualitas!</p>

        {{-- Statistics Section --}}
        <div class="stats-grid">
            <div class="stat-card">
                <span class="stat-number">5</span>
                <div class="stat-label">Pondok Pesantren</div>
            </div>
            <div class="stat-card">
                <span class="stat-number">2,500+</span>
                <div class="stat-label">Santri Aktif</div>
            </div>
            <div class="stat-card">
                <span class="stat-number">150+</span>
                <div class="stat-label">Ustadz & Ustadzah</div>
            </div>
            <div class="stat-card">
                <span class="stat-number">25+</span>
                <div class="stat-label">Tahun Pengalaman</div>
            </div>
        </div>

        {{-- Campaign Section --}}
        <section id="kampanye" class="section section-kampanye" style="margin: 3rem -2rem; padding: 3rem 2rem; border-radius: 1rem;">
            <h2 style="text-align: center; font-size: 2.5rem; font-weight: 700; color: var(--text-dark); margin-bottom: 3rem;">Kampanye Aktif</h2>
            
            <div class="campaign-grid">
                @forelse($campaigns as $campaign)
                    <div class="campaign-item">
                        <a href="{{ route('campaign.show', $campaign->id) }}">
                            @if($campaign->image)
                                <img src="{{ asset('storage/' . $campaign->image) }}" alt="{{ $campaign->title }}">
                            @else
                                <img src="https://via.placeholder.com/400x300/16a34a/ffffff?text=Bantu+Kami" alt="{{ $campaign->title }}">
                            @endif
                            <div class="campaign-content">
                                <h3 class="campaign-title">{{ $campaign->title }}</h3>

                                @php
                                    $progress = $campaign->target_amount > 0 ? ($campaign->collected_amount / $campaign->target_amount) * 100 : 0;
                                @endphp

                                <div class="progress-bar-container">
                                    <div class="progress-bar" style="width: {{ min($progress, 100) }}%;"></div>
                                </div>

                                <div class="campaign-footer">
                                    <div>
                                        <strong>Terkumpul:</strong>
                                        <span style="color: var(--primary-green); font-weight: 600;">Rp {{ number_format($campaign->collected_amount, 0, ',', '.') }}</span>
                                    </div>
                                    
                                    <div class="donator-count">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="9" cy="7" r="4"></circle>
                                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                        </svg>
                                        <strong>{{ $campaign->donations_count }}</strong> Donatur
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    <div style="text-align: center; grid-column: 1 / -1; padding: 40px;">
                        <div style="font-size: 3rem; color: var(--text-light); margin-bottom: 1rem;">📋</div>
                        <p style="font-size: 1.25rem; color: var(--text-light);">Saat ini belum ada kampanye yang aktif.</p>
                        <p style="color: var(--text-light);">Pantau terus halaman ini untuk kampanye terbaru!</p>
                    </div>
                @endforelse
            </div>

            {{-- Pagination --}}
            <div style="margin-top: 3rem; display: flex; justify-content: center;">
                {{ $campaigns->links() }}
            </div>
        </section>

        {{-- About Section --}}
        <section id="tentang" class="section section-tentang" style="margin: 3rem -2rem; padding: 3rem 2rem; border-radius: 1rem; box-shadow: var(--shadow);">
            <h2 style="text-align: center; font-size: 2.5rem; font-weight: 700; color: var(--text-dark); margin-bottom: 3rem;">Mengapa Memilih Kami?</h2>
            
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M9 12l2 2 4-4"></path>
                            <path d="M21 12c-1 0-3-1-3-3s2-3 3-3 3 1 3 3-2 3-3 3"></path>
                            <path d="M3 12c1 0 3-1 3-3s-2-3-3-3-3 1-3 3 2 3 3 3"></path>
                            <path d="M12 3c0 1-1 3-3 3s-3-2-3-3 1-3 3-3 3 2 3 3"></path>
                            <path d="M12 21c0-1 1-3 3-3s3 2 3 3-1 3-3 3-3-2-3-3"></path>
                        </svg>
                    </div>
                    <h3 class="feature-title">Terpercaya & Transparan</h3>
                    <p class="feature-description">Setiap donasi yang masuk dikelola dengan transparansi penuh dan dapat dipertanggungjawabkan kepada para donatur.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                        </svg>
                    </div>
                    <h3 class="feature-title">Dampak Nyata</h3>
                    <p class="feature-description">Kontribusi Anda memberikan dampak langsung pada kehidupan santri dan pengembangan fasilitas pesantren.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>
                    </div>
                    <h3 class="feature-title">Komunitas Peduli</h3>
                    <p class="feature-description">Bergabung dengan ribuan donatur lainnya yang peduli pada masa depan pendidikan Islam di Indonesia.</p>
                </div>
            </div>
        </section>

        {{-- Contact Section --}}
        <section id="kontak" class="section" style="background: linear-gradient(135deg, var(--primary-green), var(--primary-green-dark)); margin: 3rem -2rem; padding: 3rem 2rem; border-radius: 1rem; color: var(--white); text-align: center;">
            <h2 style="font-size: 2.5rem; font-weight: 700; margin-bottom: 1rem;">Mari Berkolaborasi</h2>
            <p style="font-size: 1.25rem; margin-bottom: 2rem; opacity: 0.9;">Hubungi kami untuk informasi lebih lanjut tentang program dan cara berkontribusi</p>
            
            <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
                <a href="mailto:info@platformpesantren.id" class="btn btn-secondary">
                    <svg style="display: inline-block; margin-right: 0.5rem;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                        <polyline points="22,6 12,13 2,6"></polyline>
                    </svg>
                    Email Kami
                </a>
                <a href="https://wa.me/6281234567890" class="btn btn-secondary" target="_blank">
                    <svg style="display: inline-block; margin-right: 0.5rem;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path>
                    </svg>
                    WhatsApp
                </a>
            </div>
        </section>
    </div>
</div>
@endsection

