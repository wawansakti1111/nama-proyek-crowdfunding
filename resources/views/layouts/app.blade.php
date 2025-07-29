<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', config('app.name', 'Laravel'))</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800&display=swap" rel="stylesheet" />

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
                --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
                --gradient-primary: linear-gradient(135deg, var(--primary-green) 0%, var(--primary-green-light) 100%);
                --gradient-secondary: linear-gradient(135deg, var(--bg-light) 0%, var(--secondary-green) 100%);
                --blur-backdrop: blur(12px);
            }

            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            html {
                scroll-behavior: smooth;
            }

            body {
                font-family: 'Inter', sans-serif;
                background: var(--gradient-secondary);
                color: var(--text-dark);
                line-height: 1.6;
                min-height: 100vh;
                overflow-x: hidden;
            }

            /* Enhanced Header Styles with Glassmorphism */
            .header {
                background: rgba(22, 163, 74, 0.95);
                backdrop-filter: var(--blur-backdrop);
                -webkit-backdrop-filter: var(--blur-backdrop);
                color: var(--white);
                padding: 1rem 0;
                box-shadow: var(--shadow-xl);
                position: sticky;
                top: 0;
                z-index: 1000;
                border-bottom: 1px solid rgba(255, 255, 255, 0.1);
                transition: all 0.3s ease;
            }

            .header::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: var(--gradient-primary);
                opacity: 0.9;
                z-index: -1;
            }

            .header-container {
                max-width: 1200px;
                margin: 0 auto;
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 0 2rem;
                position: relative;
                z-index: 2;
            }

            .logo {
                font-size: 1.5rem;
                font-weight: 800;
                color: var(--white);
                text-decoration: none;
                display: flex;
                align-items: center;
                gap: 0.75rem;
                transition: all 0.3s ease;
                position: relative;
            }

            .logo:hover {
                transform: translateY(-2px);
                filter: drop-shadow(0 4px 8px rgba(0, 0, 0, 0.2));
            }

            .logo svg {
                transition: transform 0.3s ease;
            }

            .logo:hover svg {
                transform: rotate(5deg) scale(1.1);
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
                padding: 0.75rem 1.25rem;
                border-radius: 2rem;
                transition: all 0.3s ease;
                position: relative;
                overflow: hidden;
                backdrop-filter: blur(4px);
            }

            .nav-links a::before {
                content: '';
                position: absolute;
                top: 0;
                left: -100%;
                width: 100%;
                height: 100%;
                background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
                transition: left 0.5s ease;
            }

            .nav-links a:hover::before {
                left: 100%;
            }

            .nav-links a:hover {
                background-color: rgba(255, 255, 255, 0.15);
                transform: translateY(-2px);
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            }

            .nav-links a.login-btn {
                background: rgba(255, 255, 255, 0.95);
                color: var(--primary-green);
                font-weight: 600;
                padding: 0.875rem 2rem;
                border-radius: 2rem;
                backdrop-filter: blur(8px);
                border: 1px solid rgba(255, 255, 255, 0.3);
            }

            .nav-links a.login-btn:hover {
                background: var(--white);
                transform: translateY(-3px);
                box-shadow: 0 8px 25px rgba(0, 0, 0, 0.25);
                color: var(--primary-green-dark);
            }

            /* Enhanced Container Styles */
            .container {
                max-width: 1200px;
                margin: 2rem auto;
                padding: 0 2rem;
            }

            .content-wrapper {
                background: rgba(255, 255, 255, 0.95);
                backdrop-filter: var(--blur-backdrop);
                -webkit-backdrop-filter: var(--blur-backdrop);
                border-radius: 1.5rem;
                box-shadow: var(--shadow-xl);
                overflow: hidden;
                margin-bottom: 2rem;
                border: 1px solid rgba(255, 255, 255, 0.2);
            }

            /* Enhanced Page Title Styles */
            .page-title {
                text-align: center;
                font-size: 3.5rem;
                font-weight: 800;
                color: var(--text-dark);
                margin: 3rem 0 1rem 0;
                background: var(--gradient-primary);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
                position: relative;
                animation: fadeInUp 0.8s ease-out;
            }

            .page-title::after {
                content: '';
                position: absolute;
                bottom: -10px;
                left: 50%;
                transform: translateX(-50%);
                width: 100px;
                height: 4px;
                background: var(--gradient-primary);
                border-radius: 2px;
                animation: expandWidth 1s ease-out 0.5s both;
            }

            .page-subtitle {
                text-align: center;
                font-size: 1.25rem;
                color: var(--text-light);
                margin-bottom: 3rem;
                max-width: 600px;
                margin-left: auto;
                margin-right: auto;
                animation: fadeInUp 0.8s ease-out 0.2s both;
            }

            /* Enhanced Slider Styles */
            .slider-container {
                position: relative;
                margin: 3rem 0;
                overflow: hidden;
                border-radius: 1.5rem;
                box-shadow: var(--shadow-xl);
                background: var(--gradient-primary);
            }

            .slider-wrapper {
                display: flex;
                transition: transform 0.8s cubic-bezier(0.4, 0, 0.2, 1);
            }

            .slide {
                min-width: 100%;
                position: relative;
                background: var(--gradient-primary);
                color: var(--white);
                padding: 4rem 2rem;
                text-align: center;
                opacity: 0;
                transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
                transform: scale(0.95);
            }

            .slide.active {
                opacity: 1;
                transform: scale(1);
            }

            .slide::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: radial-gradient(circle at center, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
                pointer-events: none;
            }

            .slide-content {
                max-width: 800px;
                margin: 0 auto;
                position: relative;
                z-index: 2;
            }

            .slide h3 {
                font-size: 2.75rem;
                font-weight: 800;
                margin-bottom: 1.5rem;
                text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
                animation: slideInUp 0.8s ease-out;
            }

            .slide p {
                font-size: 1.25rem;
                margin-bottom: 2.5rem;
                opacity: 0.95;
                text-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
                animation: slideInUp 0.8s ease-out 0.2s both;
            }

            .slide-btn {
                display: inline-flex;
                align-items: center;
                gap: 0.5rem;
                background: rgba(255, 255, 255, 0.95);
                color: var(--primary-green);
                padding: 1.25rem 2.5rem;
                border-radius: 2rem;
                text-decoration: none;
                font-weight: 600;
                transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
                box-shadow: var(--shadow-lg);
                backdrop-filter: blur(8px);
                border: 1px solid rgba(255, 255, 255, 0.3);
                animation: slideInUp 0.8s ease-out 0.4s both;
                position: relative;
                overflow: hidden;
            }

            .slide-btn::before {
                content: '';
                position: absolute;
                top: 50%;
                left: 50%;
                width: 0;
                height: 0;
                background: radial-gradient(circle, rgba(22, 163, 74, 0.2) 0%, transparent 70%);
                transition: all 0.3s ease;
                border-radius: 50%;
                transform: translate(-50%, -50%);
            }

            .slide-btn:hover::before {
                width: 300px;
                height: 300px;
            }

            .slide-btn:hover {
                transform: translateY(-3px) scale(1.05);
                box-shadow: var(--shadow-xl);
                background: var(--white);
                color: var(--primary-green-dark);
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
                transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
                border: 2px solid rgba(255, 255, 255, 0.7);
                position: relative;
            }

            .nav-dot::before {
                content: '';
                position: absolute;
                top: 50%;
                left: 50%;
                width: 0;
                height: 0;
                background: var(--white);
                border-radius: 50%;
                transition: all 0.3s ease;
                transform: translate(-50%, -50%);
            }

            .nav-dot.active::before {
                width: 100%;
                height: 100%;
            }

            .nav-dot.active {
                background-color: var(--white);
                transform: scale(1.3);
                box-shadow: 0 0 20px rgba(255, 255, 255, 0.5);
            }

            /* Enhanced Campaign Grid Styles */
            .campaign-grid {
                display: grid;
                grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
                gap: 2rem;
                padding: 2rem;
            }

            .campaign-item {
                background: rgba(255, 255, 255, 0.95);
                backdrop-filter: var(--blur-backdrop);
                -webkit-backdrop-filter: var(--blur-backdrop);
                border-radius: 1.25rem;
                overflow: hidden;
                box-shadow: var(--shadow);
                transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
                border: 1px solid rgba(255, 255, 255, 0.2);
                position: relative;
            }

            .campaign-item::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: var(--gradient-primary);
                opacity: 0;
                transition: opacity 0.3s ease;
                z-index: 1;
            }

            .campaign-item:hover::before {
                opacity: 0.05;
            }

            .campaign-item:hover {
                transform: translateY(-8px) scale(1.02);
                box-shadow: var(--shadow-xl);
                border-color: var(--primary-green-light);
            }

            .campaign-item a {
                text-decoration: none;
                color: inherit;
                display: block;
                position: relative;
                z-index: 2;
            }

            .campaign-item img {
                width: 100%;
                height: 250px;
                object-fit: cover;
                transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            }

            .campaign-item:hover img {
                transform: scale(1.08);
                filter: brightness(1.1) saturate(1.2);
            }

            .campaign-content {
                padding: 1.5rem;
                position: relative;
                z-index: 2;
            }

            .campaign-title {
                font-size: 1.25rem;
                font-weight: 600;
                margin-bottom: 1rem;
                color: var(--text-dark);
                line-height: 1.4;
                transition: color 0.3s ease;
            }

            .campaign-item:hover .campaign-title {
                color: var(--primary-green-dark);
            }

            /* Enhanced Progress Bar */
            .progress-bar-container {
                background-color: #e5e7eb;
                border-radius: 1rem;
                height: 10px;
                margin: 1rem 0;
                overflow: hidden;
                position: relative;
                box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.1);
            }

            .progress-bar {
                height: 100%;
                background: var(--gradient-primary);
                border-radius: 1rem;
                transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);
                position: relative;
                box-shadow: 0 2px 8px rgba(22, 163, 74, 0.3);
            }

            .progress-bar::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
                animation: shimmer 2s infinite;
            }

            .progress-bar::after {
                content: '';
                position: absolute;
                top: 50%;
                left: 50%;
                width: 100%;
                height: 2px;
                background: rgba(255, 255, 255, 0.6);
                transform: translate(-50%, -50%);
                border-radius: 1px;
            }

            @keyframes shimmer {
                0% { transform: translateX(-100%); }
                100% { transform: translateX(100%); }
            }

            @keyframes fadeInUp {
                from {
                    opacity: 0;
                    transform: translateY(30px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            @keyframes slideInUp {
                from {
                    opacity: 0;
                    transform: translateY(50px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            @keyframes expandWidth {
                from {
                    width: 0;
                }
                to {
                    width: 100px;
                }
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
                transition: all 0.3s ease;
            }

            .campaign-item:hover .donator-count {
                color: var(--primary-green-dark);
                transform: scale(1.05);
            }

            .donator-count svg {
                color: var(--primary-green);
                transition: transform 0.3s ease;
            }

            .campaign-item:hover .donator-count svg {
                transform: rotate(5deg);
            }

            /* Enhanced Button Styles */
            .btn {
                display: inline-flex;
                align-items: center;
                gap: 0.5rem;
                padding: 0.875rem 1.75rem;
                border-radius: 2rem;
                text-decoration: none;
                font-weight: 600;
                text-align: center;
                transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
                border: none;
                cursor: pointer;
                font-size: 1rem;
                position: relative;
                overflow: hidden;
            }

            .btn::before {
                content: '';
                position: absolute;
                top: 50%;
                left: 50%;
                width: 0;
                height: 0;
                background: radial-gradient(circle, rgba(255, 255, 255, 0.3) 0%, transparent 70%);
                transition: all 0.3s ease;
                border-radius: 50%;
                transform: translate(-50%, -50%);
            }

            .btn:hover::before {
                width: 300px;
                height: 300px;
            }

            .btn-primary {
                background: var(--gradient-primary);
                color: var(--white);
                box-shadow: var(--shadow);
            }

            .btn-primary:hover {
                transform: translateY(-3px) scale(1.05);
                box-shadow: var(--shadow-xl);
            }

            .btn-secondary {
                background-color: var(--white);
                color: var(--primary-green);
                border: 2px solid var(--primary-green);
                backdrop-filter: blur(8px);
            }

            .btn-secondary:hover {
                background: var(--gradient-primary);
                color: var(--white);
                transform: translateY(-3px) scale(1.05);
                border-color: transparent;
            }

            /* Enhanced Footer Styles */
            .footer {
                background: linear-gradient(135deg, var(--text-dark) 0%, #374151 100%);
                color: var(--white);
                padding: 3rem 0 1rem 0;
                margin-top: 4rem;
                position: relative;
                overflow: hidden;
            }

            .footer::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                height: 1px;
                background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            }

            .footer-content {
                max-width: 1200px;
                margin: 0 auto;
                padding: 0 2rem;
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
                gap: 2rem;
                position: relative;
                z-index: 2;
            }

            .footer-section h3 {
                font-size: 1.25rem;
                font-weight: 600;
                margin-bottom: 1rem;
                color: var(--primary-green-light);
                position: relative;
            }

            .footer-section h3::after {
                content: '';
                position: absolute;
                bottom: -5px;
                left: 0;
                width: 30px;
                height: 2px;
                background: var(--primary-green-light);
                border-radius: 1px;
            }

            .footer-section p, .footer-section a {
                color: #d1d5db;
                text-decoration: none;
                line-height: 1.8;
                transition: all 0.3s ease;
            }

            .footer-section a:hover {
                color: var(--primary-green-light);
                transform: translateX(5px);
            }

            .footer-bottom {
                border-top: 1px solid #374151;
                margin-top: 2rem;
                padding-top: 2rem;
                text-align: center;
                color: #9ca3af;
                position: relative;
            }

            /* Enhanced Alert Styles */
            .alert {
                padding: 1.25rem 1.75rem;
                border-radius: 1rem;
                margin-bottom: 1.5rem;
                border-left: 4px solid;
                backdrop-filter: blur(8px);
                -webkit-backdrop-filter: blur(8px);
                position: relative;
                overflow: hidden;
            }

            .alert::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.1), transparent);
                pointer-events: none;
            }

            .alert-danger {
                background: rgba(254, 242, 242, 0.95);
                color: #991b1b;
                border-left-color: #dc2626;
                box-shadow: 0 4px 12px rgba(220, 38, 38, 0.15);
            }

            .alert-success {
                background: rgba(220, 252, 231, 0.95);
                color: var(--primary-green-dark);
                border-left-color: var(--primary-green);
                box-shadow: 0 4px 12px rgba(22, 163, 74, 0.15);
            }

            /* Enhanced Form Styles */
            .form-group {
                margin-bottom: 1.5rem;
                position: relative;
            }

            .form-group label {
                display: block;
                margin-bottom: 0.5rem;
                font-weight: 600;
                color: var(--text-dark);
                transition: color 0.3s ease;
            }

            .form-group input,
            .form-group select,
            .form-group textarea {
                width: 100%;
                padding: 1rem;
                border: 2px solid #e5e7eb;
                border-radius: 1rem;
                font-size: 1rem;
                transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
                background: rgba(255, 255, 255, 0.8);
                backdrop-filter: blur(4px);
            }

            .form-group input:focus,
            .form-group select:focus,
            .form-group textarea:focus {
                outline: none;
                border-color: var(--primary-green);
                box-shadow: 0 0 0 4px rgba(34, 197, 94, 0.15);
                background: var(--white);
                transform: translateY(-2px);
            }

            .form-group input:focus + label,
            .form-group select:focus + label,
            .form-group textarea:focus + label {
                color: var(--primary-green);
            }

            /* Enhanced Responsive Design */
            @media (max-width: 768px) {
                .header-container {
                    flex-direction: column;
                    gap: 1rem;
                    padding: 0 1rem;
                }

                .nav-links {
                    gap: 1rem;
                    flex-wrap: wrap;
                    justify-content: center;
                }

                .container {
                    padding: 0 1rem;
                }

                .page-title {
                    font-size: 2.5rem;
                }

                .campaign-grid {
                    grid-template-columns: 1fr;
                    padding: 1rem;
                    gap: 1.5rem;
                }

                .slide h3 {
                    font-size: 2rem;
                }

                .slide p {
                    font-size: 1rem;
                }

                .btn {
                    padding: 0.75rem 1.5rem;
                    font-size: 0.9rem;
                }
            }

            /* Loading Animation Enhancement */
            .loading {
                display: inline-block;
                width: 24px;
                height: 24px;
                border: 3px solid rgba(255,255,255,.3);
                border-radius: 50%;
                border-top-color: var(--white);
                animation: spin 1s cubic-bezier(0.4, 0, 0.2, 1) infinite;
            }

            @keyframes spin {
                to { transform: rotate(360deg); }
            }

            /* Scroll Animations */
            .fade-in-up {
                opacity: 0;
                transform: translateY(30px);
                transition: all 0.6s ease-out;
            }

            .fade-in-up.visible {
                opacity: 1;
                transform: translateY(0);
            }

            /* Custom Scrollbar */
            ::-webkit-scrollbar {
                width: 8px;
            }

            ::-webkit-scrollbar-track {
                background: var(--bg-light);
            }

            ::-webkit-scrollbar-thumb {
                background: var(--gradient-primary);
                border-radius: 4px;
            }

            ::-webkit-scrollbar-thumb:hover {
                background: var(--primary-green-dark);
            }
        </style>
    </head>
    <body>
        <div class="min-h-screen">
            {{-- Enhanced Header --}}
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
                        <a href="#kontak">Kontak</a>
                    </nav>
                </div>
            </div>

            {{-- Page Content --}}
            <main>
                @yield('content')
            </main>

            {{-- Enhanced Footer --}}
            <footer class="footer">
                <div class="footer-content">
                    <div class="footer-section">
                        <h3>Tentang Kami</h3>
                        <p>Platform Pesantren adalah inisiatif untuk mendukung pendidikan Islam melalui crowdfunding. Kami menghubungkan pesantren dengan para donatur yang peduli.</p>
                    </div>
                    <div class="footer-section">
                        <h3>Tautan Cepat</h3>
                        <ul style="list-style: none; padding: 0;">
                            <li style="margin-bottom: 0.5rem;"><a href="{{ route('home') }}">Beranda</a></li>
                            <li style="margin-bottom: 0.5rem;"><a href="#kampanye">Kampanye Aktif</a></li>
                            <li style="margin-bottom: 0.5rem;"><a href="#tentang">Tentang Kami</a></li>
                            <li style="margin-bottom: 0.5rem;"><a href="#kontak">Kontak</a></li>
                        </ul>
                    </div>
                    <div class="footer-section">
                        <h3>Hubungi Kami</h3>
                        <p>Email: info@platformpesantren.id</p>
                        <p>Telepon: +62 812-3456-7890</p>
                        <p>Alamat: Jl. Contoh No. 123, Kota Santri, Indonesia</p>
                    </div>
                </div>
                <div class="footer-bottom">
                    &copy; {{ date('Y') }} Platform Pesantren. All rights reserved.
                </div>
            </footer>
        </div>

        {{-- Enhanced JavaScript for Scroll Animations --}}
        <script>
            // Scroll animations
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                    }
                });
            }, observerOptions);

            // Observe elements for scroll animations
            document.addEventListener('DOMContentLoaded', () => {
                const animatedElements = document.querySelectorAll('.campaign-item, .feature-card, .stat-card');
                animatedElements.forEach(el => {
                    el.classList.add('fade-in-up');
                    observer.observe(el);
                });

                // Staggered animation for campaign items
                const campaignItems = document.querySelectorAll('.campaign-item');
                campaignItems.forEach((item, index) => {
                    item.style.animationDelay = `${index * 0.1}s`;
                });
            });

            // Enhanced header scroll effect
            let lastScrollY = window.scrollY;
            window.addEventListener('scroll', () => {
                const header = document.querySelector('.header');
                const currentScrollY = window.scrollY;
                
                if (currentScrollY > 100) {
                    header.style.background = 'rgba(22, 163, 74, 0.98)';
                    header.style.backdropFilter = 'blur(20px)';
                } else {
                    header.style.background = 'rgba(22, 163, 74, 0.95)';
                    header.style.backdropFilter = 'blur(12px)';
                }
                
                lastScrollY = currentScrollY;
            });
        </script>
    </body>
</html>

