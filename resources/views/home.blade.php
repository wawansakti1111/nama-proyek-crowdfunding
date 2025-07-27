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
    
    /* Hero Section with Enhanced Slider */
    .hero-section {
        padding: 4rem 0 5rem 0; /* Increased spacing from header and to next section */
        background: linear-gradient(135deg, var(--emerald-50) 0%, var(--teal-50) 100%);
    }
    
    .slider-container {
        position: relative;
        margin: 0 auto;
        max-width: 1200px; /* Increased from 1000px */
        overflow: hidden;
        border-radius: 2rem; /* Increased border radius */
        box-shadow: var(--shadow-xl); /* Enhanced shadow */
        background: linear-gradient(135deg, var(--emerald-600), var(--teal-600));
        border: 3px solid var(--white); /* Added white border for prominence */
    }

    .slider-wrapper {
        position: relative;
        height: 480px; /* Increased from 400px */
    }

    .slide {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        color: var(--white);
        padding: 4rem 3rem; /* Increased padding */
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
        position: relative;
    }

    /* Enhanced overlay for better prominence */
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
        max-width: 800px; /* Increased from 700px */
        margin: 0 auto;
        position: relative;
        z-index: 2;
    }

    .slide h3 {
        font-size: 3rem; /* Increased from 2.5rem */
        font-weight: 700;
        margin-bottom: 1.5rem;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        line-height: 1.1;
    }

    .slide p {
        font-size: 1.3rem; /* Increased from 1.2rem */
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
        padding: 1.2rem 2.5rem; /* Increased padding */
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
        bottom: 2rem; /* Increased from 1.5rem */
        left: 50%;
        transform: translateX(-50%);
        display: flex;
        gap: 0.75rem; /* Increased gap */
        z-index: 10;
    }

    .nav-dot {
        width: 14px; /* Increased from 12px */
        height: 14px;
        border-radius: 50%;
        background-color: rgba(255, 255, 255, 0.5);
        cursor: pointer;
        transition: all 0.3s ease;
        border: 2px solid rgba(255, 255, 255, 0.7);
    }

    .nav-dot.active {
        background-color: var(--white);
        transform: scale(1.3); /* Increased from 1.2 */
    }

    /* Enhanced Slider Arrow Navigation */
    .slider-arrow {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background-color: rgba(255, 255, 255, 0.25);
        color: var(--white);
        border: 3px solid rgba(255, 255, 255, 0.4);
        width: 60px; /* Increased from 50px */
        height: 60px;
        border-radius: 50%;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem; /* Increased from 1.2rem */
        z-index: 10;
        font-weight: bold;
    }

    .slider-arrow:hover {
        background-color: rgba(255, 255, 255, 0.4);
        transform: translateY(-50%) scale(1.1);
        border-color: rgba(255, 255, 255, 0.6);
    }

    .slider-arrow.prev {
        left: 2rem; /* Increased from 1.5rem */
    }

    .slider-arrow.next {
        right: 2rem;
    }
    
    /* Natural Grid Sections - Minimal Effects */
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
    
    /* Search and Filter Section */
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
    
    /* Natural Statistics Grid */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 1.5rem;
        margin: 3rem 0; /* Increased margin */
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
    
    /* Natural Features Grid */
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

    /* Natural Campaign Grid */
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
    }

    .progress-bar {
        height: 100%;
        background: linear-gradient(135deg, var(--emerald-500), var(--teal-500));
        border-radius: 3px;
        transition: width 0.3s ease;
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

    /* Simple Page Titles */
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
        margin-bottom: 3rem; /* Increased margin */
        max-width: 700px;
        margin-left: auto;
        margin-right: auto;
        line-height: 1.5;
    }

    /* Simple Section Titles */
    .section-title {
        text-align: center;
        font-size: 2.5rem;
        font-weight: 700;
        color: var(--slate-800);
        margin-bottom: 2.5rem;
    }

    /* Contact Section */
    .contact-section {
        background: linear-gradient(135deg, var(--emerald-600), var(--teal-600));
        border-radius: 1.5rem;
    }

    /* Simple Buttons */
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

    /* Content Wrapper */
    .content-wrapper {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 1rem;
    }

    /* Responsive Design */
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
                <div class="slide active" style="background-image: url('{{ asset('images/slider/pesantren-1.jpg') }}');">
                    <div class="slide-content">
                        <h3>Pesantren Al-Hidayah</h3>
                        <p>Mendidik generasi Qur'ani dengan fasilitas modern dan pembelajaran yang komprehensif. Bergabunglah dalam misi mulia membangun masa depan yang lebih baik.</p>
                        <a href="https://pesantren-alhidayah.id" class="slide-btn" target="_blank">
                            <svg width="18" height="18" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
                            </svg>
                            Kunjungi Website
                        </a>
                    </div>
                </div>
                
                {{-- Slide 2: Pesantren Darul Ulum --}}
                <div class="slide" style="background-image: url('{{ asset('images/slider/pesantren-2.jpg') }}');">
                    <div class="slide-content">
                        <h3>Pesantren Darul Ulum</h3>
                        <p>Pusat pendidikan Islam terpadu yang mengombinasikan ilmu agama dan sains modern. Mari bersama membangun generasi yang berakhlak mulia dan berprestasi.</p>
                        <a href="https://pesantren-darululum.id" class="slide-btn" target="_blank">
                            <svg width="18" height="18" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
                            </svg>
                            Kunjungi Website
                        </a>
                    </div>
                </div>
                
                {{-- Slide 3: Pesantren An-Nur --}}
                <div class="slide" style="background-image: url('{{ asset('images/slider/pesantren-3.jpg') }}');">
                    <div class="slide-content">
                        <h3>Pesantren An-Nur</h3>
                        <p>Lembaga pendidikan yang fokus pada pembentukan karakter Islami dan pengembangan potensi santri. Bersama kita wujudkan cita-cita pendidikan yang berkualitas.</p>
                        <a href="https://pesantren-annur.id" class="slide-btn" target="_blank">
                            <svg width="18" height="18" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
                            </svg>
                            Kunjungi Website
                        </a>
                    </div>
                </div>
                
                {{-- Slide 4: Pesantren Al-Falah --}}
                <div class="slide" style="background-image: url('{{ asset('images/slider/pesantren-4.jpg') }}');">
                    <div class="slide-content">
                        <h3>Pesantren Al-Falah</h3>
                        <p>Menghadirkan pendidikan holistik yang menyeimbangkan spiritual, intelektual, dan sosial. Dukung kami dalam mencerdaskan anak bangsa melalui pendidikan Islam.</p>
                        <a href="https://pesantren-alfalah.id" class="slide-btn" target="_blank">
                            <svg width="18" height="18" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
                            </svg>
                            Kunjungi Website
                        </a>
                    </div>
                </div>
                
                {{-- Slide 5: Pesantren Baitul Hikmah --}}
                <div class="slide" style="background-image: url('{{ asset('images/slider/pesantren-5.jpg') }}');">
                    <div class="slide-content">
                        <h3>Pesantren Baitul Hikmah</h3>
                        <p>Rumah kebijaksanaan yang melahirkan ulama dan cendekiawan Muslim. Bergabunglah dalam misi suci mencetak generasi pemimpin masa depan yang berintegritas.</p>
                        <a href="https://pesantren-baitulhikmah.id" class="slide-btn" target="_blank">
                            <svg width="18" height="18" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
                            </svg>
                            Kunjungi Website
                        </a>
                    </div>
                </div>
            </div>
            
            {{-- Enhanced Slider Arrow Navigation --}}
            <button class="slider-arrow prev" onclick="changeSlide(-1)">‹</button>
            <button class="slider-arrow next" onclick="changeSlide(1)">›</button>
            
            {{-- Enhanced Slider Navigation Dots --}}
            <div class="slider-nav">
                <div class="nav-dot active" onclick="currentSlide(1)"></div>
                <div class="nav-dot" onclick="currentSlide(2)"></div>
                <div class="nav-dot" onclick="currentSlide(3)"></div>
                <div class="nav-dot" onclick="currentSlide(4)"></div>
                <div class="nav-dot" onclick="currentSlide(5)"></div>
            </div>
        </div>
    </div>
</div>

{{-- Main Content --}}
<div class="content-wrapper">
    <div style="padding: 2.5rem 0;">
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

        {{-- Campaign Section with Search and Filter --}}
        <section id="kampanye" class="section section-kampanye" style="margin: 3rem 0; padding: 3rem 2rem;">
            <h2 class="section-title">Kampanye Aktif</h2>
            
            {{-- Search and Filter Section --}}
            <div class="search-filter-section">
                <form method="GET" action="{{ route('home') }}" class="search-filter-container">
                    {{-- Search Box --}}
                    <div class="search-box">
                        <svg class="search-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="11" cy="11" r="8"></circle>
                            <path d="M21 21l-4.35-4.35"></path>
                        </svg>
                        <input 
                            type="text" 
                            name="search" 
                            class="search-input" 
                            placeholder="Cari kampanye berdasarkan judul atau deskripsi..."
                            value="{{ request('search') }}"
                        >
                    </div>
                    
                    {{-- Filter Section --}}
                    <div class="filter-container">
                        <span class="filter-label">Urutkan:</span>
                        <select name="sort" class="filter-select" onchange="this.form.submit()">
                            <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Terbaru</option>
                            <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Terlama</option>
                            <option value="most_funded" {{ request('sort') == 'most_funded' ? 'selected' : '' }}>Dana Terbanyak</option>
                            <option value="most_donors" {{ request('sort') == 'most_donors' ? 'selected' : '' }}>Donatur Terbanyak</option>
                            <option value="ending_soon" {{ request('sort') == 'ending_soon' ? 'selected' : '' }}>Segera Berakhir</option>
                        </select>
                    </div>
                </form>
            </div>
            
            {{-- Campaign Results --}}
            @if(request('search'))
                <div style="margin-bottom: 1.5rem; padding: 1rem; background: var(--emerald-50); border-radius: 0.5rem; border-left: 4px solid var(--emerald-500);">
                    <p style="margin: 0; color: var(--emerald-700); font-weight: 500;">
                        <svg style="display: inline-block; margin-right: 0.5rem;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="11" cy="11" r="8"></circle>
                            <path d="M21 21l-4.35-4.35"></path>
                        </svg>
                        Hasil pencarian untuk: "<strong>{{ request('search') }}</strong>" 
                        ({{ $campaigns->total() }} kampanye ditemukan)
                    </p>
                </div>
            @endif
            
            <div class="campaign-grid">
                @forelse($campaigns as $campaign)
                    <div class="campaign-item">
                        <a href="{{ route('campaign.show', $campaign->id) }}">
                            @if($campaign->image)
                                <img src="{{ asset('storage/' . $campaign->image) }}" alt="{{ $campaign->title }}">
                            @else
                                <img src="https://via.placeholder.com/400x300/10b981/ffffff?text=Bantu+Kami" alt="{{ $campaign->title }}">
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
                                        <span style="color: var(--emerald-600); font-weight: 600;">Rp {{ number_format($campaign->collected_amount, 0, ',', '.') }}</span>
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
                        <div style="font-size: 3rem; color: var(--emerald-300); margin-bottom: 1rem;">
                            @if(request('search'))
                                <svg width="60" height="60" fill="currentColor" viewBox="0 0 20 20" style="display: block; margin: 0 auto;">
                                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"/>
                                </svg>
                            @else
                                <svg width="60" height="60" fill="currentColor" viewBox="0 0 20 20" style="display: block; margin: 0 auto;">
                                    <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                                    <path fill-rule="evenodd" d="M4 5a2 2 0 012-2v1a1 1 0 102 0V3a2 2 0 012 2v6a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 2a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"/>
                                </svg>
                            @endif
                        </div>
                        @if(request('search'))
                            <h3 style="font-size: 1.3rem; color: var(--slate-700); margin-bottom: 0.5rem; font-weight: 600;">Tidak ada kampanye yang ditemukan</h3>
                            <p style="color: var(--slate-500); margin-bottom: 1rem;">Coba gunakan kata kunci yang berbeda atau hapus filter pencarian.</p>
                            <a href="{{ route('home') }}" style="display: inline-flex; align-items: center; gap: 0.5rem; background: var(--emerald-500); color: var(--white); padding: 0.75rem 1.5rem; border-radius: 1rem; text-decoration: none; font-weight: 500; transition: all 0.3s ease;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M3 6h18l-2 13H5L3 6z"></path>
                                    <path d="M3 6L2.25 3H1"></path>
                                </svg>
                                Lihat Semua Kampanye
                            </a>
                        @else
                            <h3 style="font-size: 1.3rem; color: var(--slate-700); margin-bottom: 0.5rem; font-weight: 600;">Saat ini belum ada kampanye yang aktif</h3>
                            <p style="color: var(--slate-500);">Pantau terus halaman ini untuk kampanye terbaru!</p>
                        @endif
                    </div>
                @endforelse
            </div>

            {{-- Pagination --}}
            <div style="margin-top: 2.5rem; display: flex; justify-content: center;">
                {{ $campaigns->appends(request()->query())->links() }}
            </div>
        </section>

        {{-- About Section --}}
        <section id="tentang" class="section section-tentang" style="margin: 3rem 0; padding: 3rem 2rem;">
            <h2 class="section-title">Mengapa Memilih Kami?</h2>
            
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
        <section id="kontak" class="section contact-section" style="margin: 3rem 0; padding: 3rem 2rem; color: var(--white); text-align: center;">
            <h2 style="font-size: 2.5rem; font-weight: 700; margin-bottom: 1rem;">Mari Berkolaborasi</h2>
            <p style="font-size: 1.2rem; margin-bottom: 2.5rem; opacity: 0.95; max-width: 600px; margin-left: auto; margin-right: auto; line-height: 1.5;">Hubungi kami untuk informasi lebih lanjut tentang program dan cara berkontribusi</p>
            
            <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
                <a href="mailto:info@platformpesantren.id" class="btn btn-secondary">
                    <svg style="display: inline-block;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                        <polyline points="22,6 12,13 2,6"></polyline>
                    </svg>
                    Email Kami
                </a>
                <a href="https://wa.me/6281234567890" class="btn btn-secondary" target="_blank">
                    <svg style="display: inline-block;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path>
                    </svg>
                    WhatsApp
                </a>
            </div>
        </section>
    </div>
</div>

<script>
let currentSlideIndex = 0;
const slides = document.querySelectorAll('.slide');
const dots = document.querySelectorAll('.nav-dot');
const totalSlides = slides.length;
let autoSlideInterval;

function showSlide(index) {
    // Remove active class from all slides and dots
    slides.forEach(slide => {
        slide.classList.remove('active', 'prev', 'next');
    });
    dots.forEach(dot => {
        dot.classList.remove('active');
    });

    // Set current slide as active
    slides[index].classList.add('active');
    dots[index].classList.add('active');

    // Set previous and next slides for transition effects
    const prevIndex = (index - 1 + totalSlides) % totalSlides;
    const nextIndex = (index + 1) % totalSlides;
    
    slides[prevIndex].classList.add('prev');
    slides[nextIndex].classList.add('next');

    currentSlideIndex = index;
}

function nextSlide() {
    const nextIndex = (currentSlideIndex + 1) % totalSlides;
    showSlide(nextIndex);
}

function prevSlide() {
    const prevIndex = (currentSlideIndex - 1 + totalSlides) % totalSlides;
    showSlide(prevIndex);
}

function currentSlide(index) {
    showSlide(index - 1);
    resetAutoSlide();
}

function changeSlide(direction) {
    if (direction === 1) {
        nextSlide();
    } else {
        prevSlide();
    }
    resetAutoSlide();
}

function startAutoSlide() {
    autoSlideInterval = setInterval(nextSlide, 6000); // Change slide every 6 seconds
}

function resetAutoSlide() {
    clearInterval(autoSlideInterval);
    startAutoSlide();
}

// Initialize slider
document.addEventListener('DOMContentLoaded', function() {
    showSlide(0);
    startAutoSlide();
    
    // Pause auto-slide on hover
    const sliderContainer = document.querySelector('.slider-container');
    if (sliderContainer) {
        sliderContainer.addEventListener('mouseenter', () => {
            clearInterval(autoSlideInterval);
        });
        
        sliderContainer.addEventListener('mouseleave', () => {
            startAutoSlide();
        });
    }
});

// Keyboard navigation
document.addEventListener('keydown', function(e) {
    if (e.key === 'ArrowLeft') {
        changeSlide(-1);
    } else if (e.key === 'ArrowRight') {
        changeSlide(1);
    }
});

// Search functionality
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.querySelector('.search-input');
    const searchForm = document.querySelector('.search-filter-container');
    
    if (searchInput && searchForm) {
        // Auto-submit on Enter key
        searchInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                searchForm.submit();
            }
        });
        
        // Optional: Auto-submit after typing delay
        let searchTimeout;
        searchInput.addEventListener('input', function() {
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(() => {
                if (this.value.length >= 3 || this.value.length === 0) {
                    searchForm.submit();
                }
            }, 1000); // Submit after 1 second of no typing
        });
    }
});

// Smooth scroll for anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});
</script>
@endsection

