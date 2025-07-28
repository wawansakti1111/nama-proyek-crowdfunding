@extends('layouts.app')

@section('title', 'Platform Crowdfunding Terpercaya')

@section('content')
<style>
    :root {
        --emerald-50: #ecfdf5;
        --emerald-100: #d1fae5;
        --emerald-200: #a7f3d0;
        --emerald-300: #6ee7b7;
        --emerald-400: #34d399;
        --emerald-500: #10b981;
        --emerald-600: #059669;
        --emerald-700: #047857;
        --emerald-800: #065f46;
        --emerald-900: #064e3b;
        --teal-400: #2dd4bf;
        --teal-500: #14b8a6;
        --teal-600: #0d9488;
        --teal-700: #0f766e;
        --green-400: #4ade80;
        --green-500: #22c55e;
        --green-600: #16a34a;
        --slate-50: #f8fafc;
        --slate-100: #f1f5f9;
        --slate-200: #e2e8f0;
        --slate-300: #cbd5e1;
        --slate-400: #94a3b8;
        --slate-500: #64748b;
        --slate-600: #475569;
        --slate-700: #334155;
        --slate-800: #1e293b;
        --slate-900: #0f172a;
        --white: #ffffff;
        --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }

    body {
        background: linear-gradient(135deg, var(--slate-50) 0%, var(--emerald-50) 100%);
        font-family: 'Inter', system-ui, -apple-system, sans-serif;
        line-height: 1.6;
    }

    .donator-count { 
        display: flex; 
        align-items: center; 
        gap: 5px; 
    }
    
    .hero-section {
        padding: 4rem 0 5rem 0;
        background: linear-gradient(135deg, var(--emerald-50) 0%, var(--teal-50) 100%);
    }
    
    .slider-container {
        position: relative;
        margin: 0 auto;
        max-width: 1200px;
        overflow: hidden;
        border-radius: 2rem;
        box-shadow: var(--shadow-xl);
        background: linear-gradient(135deg, var(--emerald-600), var(--teal-600));
        border: 3px solid var(--white);
    }

    .slider-wrapper {
        position: relative;
        height: 480px;
    }

    .slide {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        color: var(--white);
        padding: 4rem 3rem;
        text-align: center;
        opacity: 0;
        transform: translateX(100%);
        transition: all 0.6s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }

    .slide::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, rgba(16, 185, 129, 0.85), rgba(20, 184, 166, 0.85));
        z-index: 1;
    }

    .slide.active {
        opacity: 1;
        transform: translateX(0);
    }

    .slide.prev {
        transform: translateX(-100%);
    }

    .slide.next {
        transform: translateX(100%);
    }

    .slide-content {
        max-width: 800px;
        margin: 0 auto;
        position: relative;
        z-index: 2;
    }

    .slide h3 {
        font-size: 3rem;
        font-weight: 700;
        margin-bottom: 1.5rem;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        line-height: 1.1;
    }

    .slide p {
        font-size: 1.3rem;
        margin-bottom: 2.5rem;
        opacity: 0.95;
        text-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
        line-height: 1.6;
    }

    .slide-btn {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        background-color: var(--white);
        color: var(--emerald-700);
        padding: 1.2rem 2.5rem;
        border-radius: 2rem;
        text-decoration: none;
        font-weight: 600;
        font-size: 1.1rem;
        transition: all 0.3s ease;
        box-shadow: var(--shadow-lg);
    }

    .slide-btn:hover {
        transform: translateY(-3px);
        box-shadow: var(--shadow-xl);
        background: var(--emerald-50);
    }

    .slider-nav {
        position: absolute;
        bottom: 2rem;
        left: 50%;
        transform: translateX(-50%);
        display: flex;
        gap: 0.75rem;
        z-index: 10;
    }

    .nav-dot {
        width: 14px;
        height: 14px;
        border-radius: 50%;
        background-color: rgba(255, 255, 255, 0.5);
        cursor: pointer;
        transition: all 0.3s ease;
        border: 2px solid rgba(255, 255, 255, 0.7);
    }

    .nav-dot.active {
        background-color: var(--white);
        transform: scale(1.3);
    }

    .slider-arrow {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background-color: rgba(255, 255, 255, 0.25);
        color: var(--white);
        border: 3px solid rgba(255, 255, 255, 0.4);
        width: 60px;
        height: 60px;
        border-radius: 50%;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        z-index: 10;
        font-weight: bold;
    }

    .slider-arrow:hover {
        background-color: rgba(255, 255, 255, 0.4);
        transform: translateY(-50%) scale(1.1);
        border-color: rgba(255, 255, 255, 0.6);
    }

    .slider-arrow.prev {
        left: 2rem;
    }

    .slider-arrow.next {
        right: 2rem;
    }
    
    .section {
        padding: 3rem 0;
    }
    
    .section-kampanye {
        background: var(--white);
        border-radius: 1.5rem;
        box-shadow: var(--shadow-lg);
        border: 1px solid var(--emerald-100);
    }
    
    .section-tentang {
        background: var(--emerald-50);
        border-radius: 1.5rem;
    }
    
    .search-filter-section {
        background: var(--white);
        border-radius: 1rem;
        padding: 2rem;
        margin-bottom: 2rem;
        box-shadow: var(--shadow);
        border: 1px solid var(--emerald-100);
    }
    
    .search-filter-container {
        display: flex;
        gap: 1rem;
        align-items: center;
        flex-wrap: wrap;
    }
    
    .search-box {
        flex: 1;
        min-width: 300px;
        position: relative;
    }
    
    .search-input {
        width: 100%;
        padding: 1rem 1rem 1rem 3rem;
        border: 2px solid var(--emerald-200);
        border-radius: 2rem;
        font-size: 1rem;
        transition: all 0.3s ease;
        background: var(--slate-50);
    }
    
    .search-input:focus {
        outline: none;
        border-color: var(--emerald-500);
        background: var(--white);
        box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
    }
    
    .search-icon {
        position: absolute;
        left: 1rem;
        top: 50%;
        transform: translateY(-50%);
        color: var(--emerald-500);
        z-index: 2;
    }
    
    .filter-container {
        display: flex;
        gap: 0.5rem;
        align-items: center;
    }
    
    .filter-label {
        font-weight: 600;
        color: var(--slate-700);
        margin-right: 0.5rem;
    }
    
    .filter-select {
        padding: 0.75rem 1rem;
        border: 2px solid var(--emerald-200);
        border-radius: 1rem;
        background: var(--slate-50);
        color: var(--slate-700);
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s ease;
        min-width: 120px;
    }
    
    .filter-select:focus {
        outline: none;
        border-color: var(--emerald-500);
        background: var(--white);
        box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
    }
    
    .filter-select:hover {
        border-color: var(--emerald-400);
        background: var(--white);
    }
    
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 1.5rem;
        margin: 3rem 0;
    }
    
    .stat-card {
        background: var(--white);
        padding: 2rem 1.5rem;
        border-radius: 1rem;
        text-align: center;
        box-shadow: var(--shadow);
        border: 1px solid var(--emerald-100);
        transition: transform 0.2s ease;
    }
    
    .stat-card:hover {
        transform: translateY(-2px);
    }
    
    .stat-number {
        font-size: 2.5rem;
        font-weight: 700;
        color: var(--emerald-600);
        display: block;
        margin-bottom: 0.5rem;
    }
    
    .stat-label {
        color: var(--slate-600);
        font-weight: 500;
        font-size: 1rem;
    }
    
    .features-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 2rem;
        margin: 2.5rem 0;
    }
    
    .feature-card {
        background: var(--white);
        padding: 2rem;
        border-radius: 1rem;
        box-shadow: var(--shadow);
        text-align: center;
        transition: transform 0.2s ease;
        border: 1px solid var(--emerald-100);
    }
    
    .feature-card:hover {
        transform: translateY(-2px);
    }
    
    .feature-icon {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, var(--emerald-500), var(--teal-500));
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem auto;
        color: var(--white);
    }
    
    .feature-title {
        font-size: 1.25rem;
        font-weight: 600;
        margin-bottom: 1rem;
        color: var(--slate-800);
    }
    
    .feature-description {
        color: var(--slate-600);
        line-height: 1.6;
    }

    .campaign-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
        gap: 1.5rem;
        margin: 2rem 0;
    }

    .campaign-item {
        background: var(--white);
        border-radius: 1rem;
        overflow: hidden;
        box-shadow: var(--shadow);
        transition: transform 0.2s ease;
        border: 1px solid var(--emerald-100);
    }

    .campaign-item:hover {
        transform: translateY(-2px);
    }

    .campaign-item a {
        text-decoration: none;
        color: inherit;
        display: block;
    }

    .campaign-item img {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }

    .campaign-content {
        padding: 1.5rem;
    }

    .campaign-title {
        font-size: 1.2rem;
        font-weight: 600;
        margin-bottom: 1rem;
        color: var(--slate-800);
        line-height: 1.4;
    }

    .progress-bar-container {
        width: 100%;
        height: 6px;
        background-color: var(--emerald-100);
        border-radius: 3px;
        overflow: hidden;
        margin: 1rem 0;
        position: relative;
    }

    .progress-bar {
        height: 100%;
        background: linear-gradient(135deg, var(--emerald-500), var(--teal-500));
        border-radius: 3px;
        transition: width 0.3s ease;
    }

    .progress-percentage-text {
        position: absolute;
        top: -20px;
        right: 0;
        font-size: 0.8rem;
        font-weight: 600;
        color: var(--slate-700);
    }

    .campaign-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 1rem;
        font-size: 0.9rem;
    }

    .campaign-footer strong {
        color: var(--emerald-600);
        font-weight: 600;
    }

    .page-title {
        font-size: 3rem;
        font-weight: 700;
        text-align: center;
        margin-bottom: 1rem;
        color: var(--emerald-700);
        line-height: 1.2;
    }

    .page-subtitle {
        font-size: 1.2rem;
        text-align: center;
        color: var(--slate-600);
        margin-bottom: 3rem;
        max-width: 700px;
        margin-left: auto;
        margin-right: auto;
        line-height: 1.5;
    }

    .section-title {
        text-align: center;
        font-size: 2.5rem;
        font-weight: 700;
        color: var(--slate-800);
        margin-bottom: 2.5rem;
    }

    .contact-section {
        background: linear-gradient(135deg, var(--emerald-600), var(--teal-600));
        border-radius: 1.5rem;
    }

    .btn {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 1rem 2rem;
        border-radius: 2rem;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-secondary {
        background-color: var(--white);
        color: var(--emerald-700);
        box-shadow: var(--shadow);
    }

    .btn-secondary:hover {
        transform: translateY(-2px);
        box-shadow: var(--shadow-lg);
        background: var(--emerald-50);
    }

    .content-wrapper {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 1rem;
    }

    @media (max-width: 768px) {
        .hero-section {
            padding: 2rem 0 3rem 0;
        }
        
        .page-title {
            font-size: 2.2rem;
        }

        .page-subtitle {
            font-size: 1.1rem;
            margin-bottom: 2rem;
        }

        .section-title {
            font-size: 2rem;
        }

        .slide h3 {
            font-size: 2.2rem;
        }

        .slide p {
            font-size: 1.1rem;
        }

        .slider-wrapper {
            height: 400px;
        }
        
        .slider-container {
            max-width: 100%;
            margin: 0 1rem;
        }

        .stats-grid {
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 1rem;
            margin: 2rem 0;
        }

        .features-grid {
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }

        .campaign-grid {
            grid-template-columns: 1fr;
        }

        .slider-arrow {
            width: 50px;
            height: 50px;
            font-size: 1.2rem;
        }

        .slider-arrow.prev {
            left: 1rem;
        }

        .slider-arrow.next {
            right: 1rem;
        }
        
        .search-filter-container {
            flex-direction: column;
            align-items: stretch;
        }
        
        .search-box {
            min-width: auto;
        }
        
        .filter-container {
            justify-content: center;
        }
    }
</style>

{{-- Enhanced Hero Section with Prominent Slider --}}
<div class="hero-section">
    <div class="content-wrapper">
        <div class="slider-container">
            <div class="slider-wrapper">
                {{-- Slide 1: Pesantren Al-Hidayah --}}
                <div class="slide active" style="background-image: url('https://images.unsplash.com/photo-1583913582413-af01a8a238a2?q=80&w=2070&auto=format&fit=crop');">
                    <div class="slide-content">
                        <h3>Pesantren Al-Hidayah</h3>
                        <p>Mendidik generasi Qur'ani dengan fasilitas modern dan pembelajaran yang komprehensif. Bergabunglah dalam misi mulia membangun masa depan yang lebih baik.</p>
                        <a href="#" class="slide-btn">
                            <svg width="18" height="18" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
                            </svg>
                            Kunjungi Website
                        </a>
                    </div>
                </div>
                
                {{-- Slide 2: Pesantren Darul Ulum --}}
                <div class="slide" style="background-image: url('https://images.unsplash.com/photo-1618079493926-fe3e563513a3?q=80&w=2070&auto=format&fit=crop');">
                    <div class="slide-content">
                        <h3>Pesantren Darul Ulum</h3>
                        <p>Pusat pendidikan Islam terpadu yang mengombinasikan ilmu agama dan sains modern. Mari bersama membangun generasi yang berakhlak mulia dan berprestasi.</p>
                        <a href="#" class="slide-btn">
                            <svg width="18" height="18" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
                            </svg>
                            Kunjungi Website
                        </a>
                    </div>
                </div>
            </div>
            <div class="slider-nav">
                <span class="nav-dot active" data-slide="0"></span>
                <span class="nav-dot" data-slide="1"></span>
            </div>
            <div class="slider-arrow prev">&lt;</div>
            <div class="slider-arrow next">&gt;</div>
        </div>
    </div>
</div>

{{-- Search and Filter Section --}}
<div class="section content-wrapper">
    <div class="search-filter-section">
        <div class="search-filter-container">
            <div class="search-box">
                <svg class="search-icon" width="20" height="20" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"/>
                </svg>
                <input type="text" placeholder="Cari kampanye..." class="search-input">
            </div>
            <div class="filter-container">
                <span class="filter-label">Urutkan:</span>
                <select class="filter-select">
                    <option>Terbaru</option>
                    <option>Terpopuler</option>
                    <option>Target Terbesar</option>
                </select>
            </div>
            <div class="filter-container">
                <span class="filter-label">Kategori:</span>
                <select class="filter-select">
                    <option>Semua</option>
                    <option>Pendidikan</option>
                    <option>Kesehatan</option>
                    <option>Lingkungan</option>
                </select>
            </div>
        </div>
    </div>
</div>

{{-- Main Content Section --}}
<div class="section content-wrapper">
    <h2 class="section-title">Kampanye Terbaru</h2>
    <div class="campaign-grid">
        @foreach($campaigns as $campaign)
        <div class="campaign-item">
            <a href="{{ route('campaigns.show', $campaign->id) }}">
                <img src="{{ asset('storage/' . $campaign->image) }}" alt="{{ $campaign->title }}">
                <div class="campaign-content">
                    <h3 class="campaign-title">{{ $campaign->title }}</h3>
                    <p class="text-muted">{{ Str::limit($campaign->description, 100) }}</p>
                    
                    @php
                        $percentage = $campaign->target_amount > 0 ? round(($campaign->collected_amount / $campaign->target_amount) * 100) : 0;
                    @endphp
                    <div class="progress-bar-container">
                        <div class="progress-percentage-text">{{ $percentage }}%</div>
                        <div class="progress-bar" style="width: {{ $percentage }}%;"></div>
                    </div>

                    <div class="campaign-footer">
                        <div>Terkumpul: <strong>Rp {{ number_format($campaign->collected_amount, 0, ',', '.') }}</strong></div>
                        <div>Target: <span>Rp {{ number_format($campaign->target_amount, 0, ',', '.') }}</span></div>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>

{{-- About Us Section --}}
<div class="section content-wrapper">
    <div class="section-tentang p-8 text-center">
        <h2 class="section-title">Tentang Kami</h2>
        <p class="page-subtitle">Platform crowdfunding terpercaya untuk membantu mewujudkan impian dan memberikan dampak positif bagi masyarakat. Bergabunglah bersama kami!</p>
        <div class="stats-grid">
            <div class="stat-card">
                <span class="stat-number">100+</span>
                <span class="stat-label">Kampanye Berhasil</span>
            </div>
            <div class="stat-card">
                <span class="stat-number">5000+</span>
                <span class="stat-label">Donatur Setia</span>
            </div>
            <div class="stat-card">
                <span class="stat-number">Rp 10M+</span>
                <span class="stat-label">Dana Terkumpul</span>
            </div>
            <div class="stat-card">
                <span class="stat-number">99%</span>
                <span class="stat-label">Kepuasan Pengguna</span>
            </div>
        </div>
    </div>
</div>

{{-- Features Section --}}
<div class="section content-wrapper">
    <h2 class="section-title">Mengapa Memilih Kami?</h2>
    <div class="features-grid">
        <div class="feature-card">
            <div class="feature-icon">
                <svg width="30" height="30" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
            </div>
            <h3 class="feature-title">Terpercaya & Aman</h3>
            <p class="feature-description">Sistem keamanan terdepan untuk melindungi data dan transaksi Anda.</p>
        </div>
        <div class="feature-card">
            <div class="feature-icon">
                <svg width="30" height="30" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M11 3a1 1 0 100 2h2.586l-6.293 6.293a1 1 0 101.414 1.414L15 6.414V9a1 1 0 102 0V4a1 1 0 00-1-1h-5z"/>
                    <path d="M5 5a2 2 0 00-2 2v8a2 2 0 002 2h8a2 2 0 002-2v-3a1 1 0 10-2 0v3H5V7h3a1 1 0 000-2H5z"/>
                </svg>
            </div>
            <h3 class="feature-title">Mudah Digunakan</h3>
            <p class="feature-description">Antarmuka intuitif untuk pengalaman berdonasi yang lancar.</p>
        </div>
        <div class="feature-card">
            <div class="feature-icon">
                <svg width="30" height="30" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l3 3a1 1 0 001.414-1.414L11 9.586V6z" clip-rule="evenodd"/>
                </svg>
            </div>
            <h3 class="feature-title">Dampak Nyata</h3>
            <p class="feature-description">Setiap donasi Anda memberikan perubahan positif yang signifikan.</p>
        </div>
    </div>
</div>

{{-- Contact Section --}}
<div class="section content-wrapper">
    <div class="contact-section p-8 text-center text-white">
        <h2 class="section-title text-white">Hubungi Kami</h2>
        <p class="page-subtitle text-white">Punya pertanyaan atau ingin berkolaborasi? Jangan ragu untuk menghubungi kami!</p>
        <a href="#" class="btn btn-secondary">
            <svg width="20" height="20" fill="currentColor" viewBox="0 0 20 20">
                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
            </svg>
            Kirim Email
        </a>
    </div>
</div>

<script>
    // Slider functionality
    const slides = document.querySelectorAll('.slide');
    const navDots = document.querySelectorAll('.nav-dot');
    const prevArrow = document.querySelector('.slider-arrow.prev');
    const nextArrow = document.querySelector('.slider-arrow.next');
    let currentSlide = 0;

    function showSlide(index) {
        slides.forEach((slide, i) => {
            slide.classList.remove('active', 'prev', 'next');
            if (i === index) {
                slide.classList.add('active');
            } else if (i < index) {
                slide.classList.add('prev');
            } else {
                slide.classList.add('next');
            }
        });
        navDots.forEach((dot, i) => {
            dot.classList.remove('active');
            if (i === index) {
                dot.classList.add('active');
            }
        });
        currentSlide = index;
    }

    function nextSlide() {
        currentSlide = (currentSlide + 1) % slides.length;
        showSlide(currentSlide);
    }

    function prevSlide() {
        currentSlide = (currentSlide - 1 + slides.length) % slides.length;
        showSlide(currentSlide);
    }

    navDots.forEach(dot => {
        dot.addEventListener('click', (e) => {
            showSlide(parseInt(e.target.dataset.slide));
        });
    });

    prevArrow.addEventListener('click', prevSlide);
    nextArrow.addEventListener('click', nextSlide);

    // Auto-slide every 5 seconds
    setInterval(nextSlide, 5000);

    // Initial slide display
    showSlide(0);
</script>
@endsection

