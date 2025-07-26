<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', config('app.name', 'Laravel'))</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            :root {
                --primary-green: #16a34a;
                --primary-green-dark: #15803d;
                --primary-green-light: #22c55e;
                --secondary-green: #dcfce7;
                --accent-green: #bbf7d0;
                --text-dark: #1f2937;
                --text-light: #6b7280;
                --bg-light: #f9fafb;
                --white: #ffffff;
                --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
                --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            }

            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            body {
                font-family: 'Inter', sans-serif;
                background: linear-gradient(135deg, var(--bg-light) 0%, var(--secondary-green) 100%);
                color: var(--text-dark);
                line-height: 1.6;
                min-height: 100vh;
            }

            /* Header Styles */
            .header {
                background: linear-gradient(135deg, var(--primary-green) 0%, var(--primary-green-dark) 100%);
                color: var(--white);
                padding: 1rem 0;
                box-shadow: var(--shadow-lg);
                position: sticky;
                top: 0;
                z-index: 1000;
            }

            .header-container {
                max-width: 1200px;
                margin: 0 auto;
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 0 2rem;
            }

            .logo {
                font-size: 1.5rem;
                font-weight: 700;
                color: var(--white);
                text-decoration: none;
                display: flex;
                align-items: center;
                gap: 0.5rem;
            }

            .nav-links {
                display: flex;
                gap: 2rem;
                align-items: center;
            }

            .nav-links a {
                color: var(--white);
                text-decoration: none;
                font-weight: 500;
                padding: 0.5rem 1rem;
                border-radius: 0.5rem;
                transition: all 0.3s ease;
                position: relative;
            }

            .nav-links a:hover {
                background-color: rgba(255, 255, 255, 0.1);
                transform: translateY(-2px);
            }

            .nav-links a.login-btn {
                background-color: var(--white);
                color: var(--primary-green);
                font-weight: 600;
                padding: 0.75rem 1.5rem;
                border-radius: 2rem;
            }

            .nav-links a.login-btn:hover {
                background-color: var(--secondary-green);
                transform: translateY(-2px);
                box-shadow: var(--shadow);
            }

            /* Container Styles */
            .container {
                max-width: 1200px;
                margin: 2rem auto;
                padding: 0 2rem;
            }

            .content-wrapper {
                background-color: var(--white);
                border-radius: 1rem;
                box-shadow: var(--shadow-lg);
                overflow: hidden;
                margin-bottom: 2rem;
            }

            /* Page Title Styles */
            .page-title {
                text-align: center;
                font-size: 3rem;
                font-weight: 700;
                color: var(--text-dark);
                margin: 3rem 0 1rem 0;
                background: linear-gradient(135deg, var(--primary-green), var(--primary-green-light));
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
            }

            .page-subtitle {
                text-align: center;
                font-size: 1.25rem;
                color: var(--text-light);
                margin-bottom: 3rem;
                max-width: 600px;
                margin-left: auto;
                margin-right: auto;
            }

            /* Slider Styles */
            .slider-container {
                position: relative;
                margin: 3rem 0;
                overflow: hidden;
                border-radius: 1rem;
                box-shadow: var(--shadow-lg);
            }

            .slider-wrapper {
                display: flex;
                transition: transform 0.5s ease-in-out;
            }

            .slide {
                min-width: 100%;
                position: relative;
                background: linear-gradient(135deg, var(--primary-green), var(--primary-green-dark));
                color: var(--white);
                padding: 4rem 2rem;
                text-align: center;
            }

            .slide-content {
                max-width: 800px;
                margin: 0 auto;
            }

            .slide h3 {
                font-size: 2.5rem;
                font-weight: 700;
                margin-bottom: 1rem;
            }

            .slide p {
                font-size: 1.25rem;
                margin-bottom: 2rem;
                opacity: 0.9;
            }

            .slide-btn {
                display: inline-block;
                background-color: var(--white);
                color: var(--primary-green);
                padding: 1rem 2rem;
                border-radius: 2rem;
                text-decoration: none;
                font-weight: 600;
                transition: all 0.3s ease;
                box-shadow: var(--shadow);
            }

            .slide-btn:hover {
                transform: translateY(-3px);
                box-shadow: var(--shadow-lg);
                background-color: var(--secondary-green);
            }

            .slider-nav {
                position: absolute;
                bottom: 2rem;
                left: 50%;
                transform: translateX(-50%);
                display: flex;
                gap: 0.5rem;
            }

            .nav-dot {
                width: 12px;
                height: 12px;
                border-radius: 50%;
                background-color: rgba(255, 255, 255, 0.5);
                cursor: pointer;
                transition: all 0.3s ease;
            }

            .nav-dot.active {
                background-color: var(--white);
                transform: scale(1.2);
            }

            /* Campaign Grid Styles */
            .campaign-grid {
                display: grid;
                grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
                gap: 2rem;
                padding: 2rem;
            }

            .campaign-item {
                background-color: var(--white);
                border-radius: 1rem;
                overflow: hidden;
                box-shadow: var(--shadow);
                transition: all 0.3s ease;
                border: 2px solid transparent;
            }

            .campaign-item:hover {
                transform: translateY(-5px);
                box-shadow: var(--shadow-lg);
                border-color: var(--primary-green-light);
            }

            .campaign-item a {
                text-decoration: none;
                color: inherit;
                display: block;
            }

            .campaign-item img {
                width: 100%;
                height: 250px;
                object-fit: cover;
                transition: transform 0.3s ease;
            }

            .campaign-item:hover img {
                transform: scale(1.05);
            }

            .campaign-content {
                padding: 1.5rem;
            }

            .campaign-title {
                font-size: 1.25rem;
                font-weight: 600;
                margin-bottom: 1rem;
                color: var(--text-dark);
                line-height: 1.4;
            }

            .progress-bar-container {
                background-color: #e5e7eb;
                border-radius: 1rem;
                height: 8px;
                margin: 1rem 0;
                overflow: hidden;
            }

            .progress-bar {
                height: 100%;
                background: linear-gradient(90deg, var(--primary-green), var(--primary-green-light));
                border-radius: 1rem;
                transition: width 0.3s ease;
                position: relative;
            }

            .progress-bar::after {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
                animation: shimmer 2s infinite;
            }

            @keyframes shimmer {
                0% { transform: translateX(-100%); }
                100% { transform: translateX(100%); }
            }

            .campaign-footer {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-top: 1rem;
                font-size: 0.9rem;
                color: var(--text-light);
            }

            .donator-count {
                display: flex;
                align-items: center;
                gap: 0.5rem;
                color: var(--primary-green);
                font-weight: 600;
            }

            .donator-count svg {
                color: var(--primary-green);
            }

            /* Button Styles */
            .btn {
                display: inline-block;
                padding: 0.75rem 1.5rem;
                border-radius: 0.5rem;
                text-decoration: none;
                font-weight: 600;
                text-align: center;
                transition: all 0.3s ease;
                border: none;
                cursor: pointer;
                font-size: 1rem;
            }

            .btn-primary {
                background: linear-gradient(135deg, var(--primary-green), var(--primary-green-light));
                color: var(--white);
                box-shadow: var(--shadow);
            }

            .btn-primary:hover {
                transform: translateY(-2px);
                box-shadow: var(--shadow-lg);
                background: linear-gradient(135deg, var(--primary-green-dark), var(--primary-green));
            }

            .btn-secondary {
                background-color: var(--white);
                color: var(--primary-green);
                border: 2px solid var(--primary-green);
            }

            .btn-secondary:hover {
                background-color: var(--primary-green);
                color: var(--white);
                transform: translateY(-2px);
            }

            /* Footer Styles */
            .footer {
                background: linear-gradient(135deg, var(--text-dark) 0%, #374151 100%);
                color: var(--white);
                padding: 3rem 0 1rem 0;
                margin-top: 4rem;
            }

            .footer-content {
                max-width: 1200px;
                margin: 0 auto;
                padding: 0 2rem;
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
                gap: 2rem;
            }

            .footer-section h3 {
                font-size: 1.25rem;
                font-weight: 600;
                margin-bottom: 1rem;
                color: var(--primary-green-light);
            }

            .footer-section p, .footer-section a {
                color: #d1d5db;
                text-decoration: none;
                line-height: 1.8;
            }

            .footer-section a:hover {
                color: var(--primary-green-light);
                transition: color 0.3s ease;
            }

            .footer-bottom {
                border-top: 1px solid #374151;
                margin-top: 2rem;
                padding-top: 2rem;
                text-align: center;
                color: #9ca3af;
            }

            /* Alert Styles */
            .alert {
                padding: 1rem 1.5rem;
                border-radius: 0.5rem;
                margin-bottom: 1.5rem;
                border-left: 4px solid;
            }

            .alert-danger {
                background-color: #fef2f2;
                color: #991b1b;
                border-left-color: #dc2626;
            }

            .alert-success {
                background-color: var(--secondary-green);
                color: var(--primary-green-dark);
                border-left-color: var(--primary-green);
            }

            /* Form Styles */
            .form-group {
                margin-bottom: 1.5rem;
            }

            .form-group label {
                display: block;
                margin-bottom: 0.5rem;
                font-weight: 600;
                color: var(--text-dark);
            }

            .form-group input,
            .form-group select,
            .form-group textarea {
                width: 100%;
                padding: 0.75rem;
                border: 2px solid #e5e7eb;
                border-radius: 0.5rem;
                font-size: 1rem;
                transition: border-color 0.3s ease;
            }

            .form-group input:focus,
            .form-group select:focus,
            .form-group textarea:focus {
                outline: none;
                border-color: var(--primary-green);
                box-shadow: 0 0 0 3px rgba(34, 197, 94, 0.1);
            }

            /* Responsive Design */
            @media (max-width: 768px) {
                .header-container {
                    flex-direction: column;
                    gap: 1rem;
                    padding: 0 1rem;
                }

                .nav-links {
                    gap: 1rem;
                }

                .container {
                    padding: 0 1rem;
                }

                .page-title {
                    font-size: 2rem;
                }

                .campaign-grid {
                    grid-template-columns: 1fr;
                    padding: 1rem;
                }

                .slide h3 {
                    font-size: 2rem;
                }

                .slide p {
                    font-size: 1rem;
                }
            }

            /* Loading Animation */
            .loading {
                display: inline-block;
                width: 20px;
                height: 20px;
                border: 3px solid rgba(255,255,255,.3);
                border-radius: 50%;
                border-top-color: var(--white);
                animation: spin 1s ease-in-out infinite;
            }

            @keyframes spin {
                to { transform: rotate(360deg); }
            }
        </style>
    </head>
    <body>
        <div class="min-h-screen">
            {{-- Header --}}
            <div class="header">
                <div class="header-container">
                    <a href="{{ route('home') }}" class="logo">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2L2 7L12 12L22 7L12 2Z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/>
                            <path d="M2 17L12 22L22 17" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/>
                            <path d="M2 12L12 17L22 12" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/>
                        </svg>
                        Platform Pesantren
                    </a>
                    <nav class="nav-links">
                        <a href="{{ route('home') }}">Beranda</a>
                        <a href="#kampanye">Kampanye</a>
                        <a href="#tentang">Tentang Kami</a>
                        <a href="#kontak">Hubungi Kami</a>
                        @guest
                            <a href="{{ route('login') }}" class="login-btn">Login Admin</a>
                        @endguest
                    </nav>
                </div>
            </div>

            {{-- Page Heading --}}
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            {{-- Main Content --}}
            <main>
                <div class="container">
                    @if (isset($slot))
                        {{ $slot }}
                    @else
                        @yield('content')
                    @endif
                </div>
            </main>
        </div>

        {{-- Footer --}}
        <div class="footer">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>Platform Pesantren</h3>
                    <p>Membangun masa depan yang lebih baik melalui pendidikan Islam yang berkualitas. Mari bersama-sama mendukung pengembangan pondok pesantren di seluruh nusantara.</p>
                </div>
                <div class="footer-section">
                    <h3>Pondok Pesantren</h3>
                    <p><a href="#">Pesantren Al-Hidayah</a></p>
                    <p><a href="#">Pesantren Darul Ulum</a></p>
                    <p><a href="#">Pesantren An-Nur</a></p>
                    <p><a href="#">Pesantren Al-Falah</a></p>
                    <p><a href="#">Pesantren Baitul Hikmah</a></p>
                </div>
                <div class="footer-section">
                    <h3>Layanan</h3>
                    <p><a href="#kampanye">Kampanye Donasi</a></p>
                    <p><a href="#">Program Beasiswa</a></p>
                    <p><a href="#">Pembangunan Fasilitas</a></p>
                    <p><a href="#">Pelatihan Ustadz</a></p>
                </div>
                <div class="footer-section">
                    <h3>Kontak</h3>
                    <p>Email: info@platformpesantren.id</p>
                    <p>Telepon: +62 21 1234 5678</p>
                    <p>WhatsApp: +62 812 3456 7890</p>
                    <p>Alamat: Jakarta, Indonesia</p>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; {{ date('Y') }} Platform Pesantren. Semua Hak Dilindungi. Dibuat dengan ❤️ untuk kemajuan pendidikan Islam.</p>
            </div>
        </div>

        {{-- JavaScript for Slider --}}
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const slider = document.querySelector('.slider-wrapper');
                const slides = document.querySelectorAll('.slide');
                const dots = document.querySelectorAll('.nav-dot');
                let currentSlide = 0;

                function showSlide(index) {
                    if (slider && slides.length > 0) {
                        slider.style.transform = `translateX(-${index * 100}%)`;
                        
                        dots.forEach((dot, i) => {
                            dot.classList.toggle('active', i === index);
                        });
                        
                        currentSlide = index;
                    }
                }

                // Auto-slide functionality
                function nextSlide() {
                    currentSlide = (currentSlide + 1) % slides.length;
                    showSlide(currentSlide);
                }

                // Initialize slider
                if (slides.length > 0) {
                    showSlide(0);
                    
                    // Auto-advance slides every 5 seconds
                    setInterval(nextSlide, 5000);
                    
                    // Dot navigation
                    dots.forEach((dot, index) => {
                        dot.addEventListener('click', () => showSlide(index));
                    });
                }
            });
        </script>
    </body>
</html>

