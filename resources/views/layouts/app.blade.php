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
                --teal-800: #115e59;
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
                --shadow-2xl: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
                --gradient-emerald: linear-gradient(135deg, var(--emerald-600), var(--teal-600));
                --gradient-emerald-light: linear-gradient(135deg, var(--emerald-500), var(--teal-500));
                --gradient-emerald-dark: linear-gradient(135deg, var(--emerald-800), var(--teal-800));
                --blur-backdrop: blur(16px);
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
                background: linear-gradient(135deg, var(--slate-50) 0%, var(--emerald-50) 100%);
                color: var(--slate-800);
                line-height: 1.6;
                min-height: 100vh;
                overflow-x: hidden;
            }

            /* Enhanced Header Styles with Modern Glassmorphism */
            .header {
                background: rgba(5, 150, 105, 0.95);
                backdrop-filter: var(--blur-backdrop);
                -webkit-backdrop-filter: var(--blur-backdrop);
                color: var(--white);
                padding: 1.25rem 0;
                box-shadow: var(--shadow-2xl);
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
                background: var(--gradient-emerald);
                opacity: 0.95;
                z-index: -1;
            }

            .header::after {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: radial-gradient(circle at 30% 50%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
                            radial-gradient(circle at 70% 50%, rgba(20, 184, 166, 0.1) 0%, transparent 50%);
                pointer-events: none;
                z-index: 1;
            }

            .header-container {
                max-width: 1400px;
                margin: 0 auto;
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 0 2rem;
                position: relative;
                z-index: 2;
            }

            .logo {
                font-size: 1.75rem;
                font-weight: 800;
                color: var(--white);
                text-decoration: none;
                display: flex;
                align-items: center;
                gap: 0.75rem;
                transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
                position: relative;
            }

            .logo::before {
                content: '';
                position: absolute;
                top: 50%;
                left: 50%;
                width: 0;
                height: 0;
                background: radial-gradient(circle, rgba(255, 255, 255, 0.2) 0%, transparent 70%);
                border-radius: 50%;
                transition: all 0.4s ease;
                transform: translate(-50%, -50%);
                z-index: -1;
            }

            .logo:hover::before {
                width: 120px;
                height: 120px;
            }

            .logo:hover {
                transform: translateY(-2px);
                filter: drop-shadow(0 8px 16px rgba(0, 0, 0, 0.3));
            }

            .logo svg {
                transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            }

            .logo:hover svg {
                transform: rotate(10deg) scale(1.1);
            }

            .nav-links {
                display: flex;
                gap: 1rem;
                align-items: center;
            }

            .nav-links a {
                color: var(--white);
                text-decoration: none;
                font-weight: 500;
                padding: 0.875rem 1.5rem;
                border-radius: 2rem;
                transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
                position: relative;
                overflow: hidden;
                backdrop-filter: blur(8px);
                border: 1px solid rgba(255, 255, 255, 0.1);
            }

            .nav-links a::before {
                content: '';
                position: absolute;
                top: 0;
                left: -100%;
                width: 100%;
                height: 100%;
                background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
                transition: left 0.6s ease;
            }

            .nav-links a:hover::before {
                left: 100%;
            }

            .nav-links a:hover {
                background-color: rgba(255, 255, 255, 0.2);
                transform: translateY(-2px);
                box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
                border-color: rgba(255, 255, 255, 0.3);
            }

            .nav-links a.login-btn {
                background: rgba(255, 255, 255, 0.95);
                color: var(--emerald-700);
                font-weight: 600;
                padding: 1rem 2.5rem;
                border-radius: 2rem;
                backdrop-filter: blur(12px);
                border: 2px solid rgba(255, 255, 255, 0.3);
                box-shadow: var(--shadow-lg);
            }

            .nav-links a.login-btn:hover {
                background: var(--white);
                transform: translateY(-3px) scale(1.05);
                box-shadow: var(--shadow-2xl);
                color: var(--emerald-800);
                border-color: rgba(255, 255, 255, 0.5);
            }

            /* User Dropdown Styles */
            .user-dropdown {
                position: relative;
                display: inline-block;
            }

            .dropdown-toggle {
                display: flex;
                align-items: center;
                gap: 0.75rem;
                background: rgba(255, 255, 255, 0.15);
                color: var(--white);
                padding: 0.75rem 1.25rem;
                border-radius: 2rem;
                text-decoration: none;
                font-weight: 500;
                transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
                border: 1px solid rgba(255, 255, 255, 0.2);
                cursor: pointer;
            }

            .dropdown-toggle:hover {
                background: rgba(255, 255, 255, 0.25);
                transform: translateY(-2px);
                box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
            }

            .user-avatar {
                width: 32px;
                height: 32px;
                border-radius: 50%;
                background: var(--gradient-emerald-light);
                display: flex;
                align-items: center;
                justify-content: center;
                font-weight: 600;
                font-size: 0.875rem;
                color: var(--white);
                border: 2px solid rgba(255, 255, 255, 0.3);
            }

            .dropdown-menu {
                position: absolute;
                top: 100%;
                right: 0;
                background: rgba(255, 255, 255, 0.95);
                backdrop-filter: var(--blur-backdrop);
                border-radius: 1rem;
                box-shadow: var(--shadow-2xl);
                min-width: 200px;
                padding: 0.75rem;
                margin-top: 0.5rem;
                opacity: 0;
                visibility: hidden;
                transform: translateY(-10px);
                transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
                border: 1px solid rgba(255, 255, 255, 0.2);
                z-index: 1000;
            }

            .user-dropdown:hover .dropdown-menu {
                opacity: 1;
                visibility: visible;
                transform: translateY(0);
            }

            .dropdown-menu a {
                display: flex;
                align-items: center;
                gap: 0.75rem;
                padding: 0.75rem 1rem;
                color: var(--slate-700);
                text-decoration: none;
                border-radius: 0.75rem;
                transition: all 0.3s ease;
                font-weight: 500;
            }

            .dropdown-menu a:hover {
                background: var(--emerald-50);
                color: var(--emerald-700);
                transform: translateX(4px);
            }

            .dropdown-menu a svg {
                width: 18px;
                height: 18px;
                opacity: 0.7;
            }

            .dropdown-divider {
                height: 1px;
                background: var(--slate-200);
                margin: 0.5rem 0;
            }

            /* Enhanced Main Content Styles */
            .main-content {
                min-height: calc(100vh - 200px);
                position: relative;
            }

            .container {
                max-width: 1400px;
                margin: 0 auto;
                padding: 0 2rem;
            }

            .content-wrapper {
                background: rgba(255, 255, 255, 0.8);
                backdrop-filter: var(--blur-backdrop);
                -webkit-backdrop-filter: var(--blur-backdrop);
                border-radius: 2rem;
                box-shadow: var(--shadow-xl);
                overflow: hidden;
                margin: 2rem 0;
                border: 1px solid rgba(255, 255, 255, 0.2);
                position: relative;
            }

            .content-wrapper::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: radial-gradient(circle at 20% 80%, rgba(16, 185, 129, 0.03) 0%, transparent 50%),
                            radial-gradient(circle at 80% 20%, rgba(20, 184, 166, 0.03) 0%, transparent 50%);
                pointer-events: none;
            }

            /* Enhanced Page Title Styles */
            .page-title {
                text-align: center;
                font-size: 4rem;
                font-weight: 800;
                color: var(--slate-800);
                margin: 4rem 0 1.5rem 0;
                background: var(--gradient-emerald);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
                position: relative;
                animation: fadeInUp 0.8s ease-out;
            }

            .page-title::after {
                content: '';
                position: absolute;
                bottom: -15px;
                left: 50%;
                transform: translateX(-50%);
                width: 120px;
                height: 5px;
                background: var(--gradient-emerald);
                border-radius: 3px;
                animation: expandWidth 1s ease-out 0.5s both;
            }

            .page-subtitle {
                text-align: center;
                font-size: 1.375rem;
                color: var(--slate-600);
                margin-bottom: 4rem;
                max-width: 700px;
                margin-left: auto;
                margin-right: auto;
                animation: fadeInUp 0.8s ease-out 0.2s both;
                line-height: 1.6;
            }

            /* Enhanced Footer Styles */
            .footer {
                background: var(--gradient-emerald-dark);
                color: var(--white);
                padding: 4rem 0 2rem 0;
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
                bottom: 0;
                background: radial-gradient(circle at 30% 20%, rgba(255, 255, 255, 0.05) 0%, transparent 50%),
                            radial-gradient(circle at 70% 80%, rgba(20, 184, 166, 0.1) 0%, transparent 50%);
                pointer-events: none;
            }

            .footer-content {
                max-width: 1400px;
                margin: 0 auto;
                padding: 0 2rem;
                position: relative;
                z-index: 2;
            }

            .footer-top {
                display: grid;
                grid-template-columns: 1fr 2fr;
                gap: 4rem;
                margin-bottom: 3rem;
                padding-bottom: 3rem;
                border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            }

            .footer-brand {
                display: flex;
                flex-direction: column;
                gap: 1.5rem;
            }

            .footer-logo {
                font-size: 2rem;
                font-weight: 800;
                background: linear-gradient(135deg, #ffffff, #f0fdfa);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
                margin-bottom: 0.5rem;
            }

            .footer-tagline {
                font-size: 1.125rem;
                opacity: 0.9;
                line-height: 1.6;
                max-width: 400px;
            }

            .footer-social {
                display: flex;
                gap: 1rem;
                margin-top: 1rem;
            }

            .social-link {
                display: flex;
                align-items: center;
                justify-content: center;
                width: 48px;
                height: 48px;
                background: rgba(255, 255, 255, 0.1);
                border-radius: 50%;
                color: var(--white);
                text-decoration: none;
                transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
                backdrop-filter: blur(8px);
                border: 1px solid rgba(255, 255, 255, 0.2);
            }

            .social-link:hover {
                background: rgba(255, 255, 255, 0.2);
                transform: translateY(-3px);
                box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
            }

            .footer-links {
                display: grid;
                grid-template-columns: repeat(4, 1fr);
                gap: 2rem;
            }

            .footer-column h4 {
                font-size: 1.25rem;
                font-weight: 700;
                margin-bottom: 1.5rem;
                color: var(--white);
            }

            .footer-menu {
                list-style: none;
                display: flex;
                flex-direction: column;
                gap: 0.75rem;
            }

            .footer-menu a {
                color: rgba(255, 255, 255, 0.8);
                text-decoration: none;
                transition: all 0.3s ease;
                font-weight: 500;
                position: relative;
                padding-left: 0;
            }

            .footer-menu a:hover {
                color: var(--white);
                transform: translateX(8px);
            }

            .footer-menu a::before {
                content: '';
                position: absolute;
                left: -8px;
                top: 50%;
                transform: translateY(-50%);
                width: 0;
                height: 2px;
                background: var(--teal-400);
                transition: width 0.3s ease;
            }

            .footer-menu a:hover::before {
                width: 4px;
            }

            .contact-info {
                display: flex;
                flex-direction: column;
                gap: 1rem;
            }

            .contact-item {
                display: flex;
                align-items: center;
                gap: 0.75rem;
                color: rgba(255, 255, 255, 0.9);
                font-weight: 500;
            }

            .contact-item svg {
                width: 18px;
                height: 18px;
                color: var(--teal-400);
                flex-shrink: 0;
            }

            .footer-bottom {
                background: rgba(0, 0, 0, 0.2);
                backdrop-filter: blur(8px);
                border-radius: 1.5rem;
                padding: 1.5rem 2rem;
                margin-top: 2rem;
            }

            .footer-bottom-content {
                display: flex;
                justify-content: space-between;
                align-items: center;
                flex-wrap: wrap;
                gap: 1rem;
            }

            .copyright {
                color: rgba(255, 255, 255, 0.8);
                font-weight: 500;
            }

            .footer-bottom-links {
                display: flex;
                gap: 2rem;
            }

            .footer-bottom-links a {
                color: rgba(255, 255, 255, 0.7);
                text-decoration: none;
                font-weight: 500;
                transition: all 0.3s ease;
            }

            .footer-bottom-links a:hover {
                color: var(--white);
            }

            /* Enhanced Animations */
            @keyframes fadeInUp {
                0% {
                    opacity: 0;
                    transform: translateY(30px);
                }
                100% {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            @keyframes expandWidth {
                0% {
                    width: 0;
                }
                100% {
                    width: 120px;
                }
            }

            @keyframes shimmer {
                0% {
                    transform: translateX(-100%);
                }
                100% {
                    transform: translateX(100%);
                }
            }

            /* Enhanced Responsive Design */
            @media (max-width: 1024px) {
                .header-container {
                    padding: 0 1.5rem;
                }

                .nav-links {
                    gap: 0.75rem;
                }

                .nav-links a {
                    padding: 0.75rem 1.25rem;
                }

                .footer-top {
                    grid-template-columns: 1fr;
                    gap: 3rem;
                }

                .footer-links {
                    grid-template-columns: repeat(2, 1fr);
                    gap: 2rem;
                }
            }

            @media (max-width: 768px) {
                .header-container {
                    flex-direction: column;
                    gap: 1rem;
                    padding: 0 1rem;
                }

                .nav-links {
                    flex-wrap: wrap;
                    justify-content: center;
                    gap: 0.5rem;
                }

                .nav-links a {
                    padding: 0.625rem 1rem;
                    font-size: 0.875rem;
                }

                .logo {
                    font-size: 1.5rem;
                }

                .page-title {
                    font-size: 2.5rem;
                    margin: 2rem 0 1rem 0;
                }

                .page-subtitle {
                    font-size: 1.125rem;
                    margin-bottom: 2rem;
                }

                .container {
                    padding: 0 1rem;
                }

                .footer-links {
                    grid-template-columns: 1fr;
                    gap: 2rem;
                }

                .footer-bottom-content {
                    flex-direction: column;
                    text-align: center;
                }

                .footer-bottom-links {
                    justify-content: center;
                }
            }

            @media (max-width: 480px) {
                .header {
                    padding: 1rem 0;
                }

                .nav-links a.login-btn {
                    padding: 0.75rem 1.5rem;
                }

                .page-title {
                    font-size: 2rem;
                }

                .footer {
                    padding: 3rem 0 1.5rem 0;
                }

                .footer-content {
                    padding: 0 1rem;
                }

                .footer-social {
                    justify-content: center;
                }
            }
        </style>
    </head>
    <body>
        <!-- Enhanced Header with Modern Navigation -->
        <header class="header">
            <div class="header-container">
                <a href="{{ route('home') }}" class="logo">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                        <polyline points="9,22 9,12 15,12 15,22"></polyline>
                    </svg>
                    Platform Pesantren
                </a>
                
                <nav class="nav-links">
                    <a href="{{ route('home') }}">Beranda</a>
                    <a href="#kampanye">Kampanye</a>
                    <a href="#tentang">Tentang</a>
                    <a href="#kontak">Kontak</a>
                    
                    @auth
                        <div class="user-dropdown">
                            <div class="dropdown-toggle">
                                <div class="user-avatar">
                                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                </div>
                                <span>{{ Auth::user()->name }}</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="6,9 12,15 18,9"></polyline>
                                </svg>
                            </div>
                            <div class="dropdown-menu">
                                @if(Auth::user()->role === 'admin')
                                    <a href="{{ route('admin.dashboard') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                            <line x1="9" y1="9" x2="15" y2="9"></line>
                                            <line x1="9" y1="15" x2="15" y2="15"></line>
                                        </svg>
                                        Dashboard Admin
                                    </a>
                                    <a href="{{ route('admin.campaigns') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                                        </svg>
                                        Kelola Kampanye
                                    </a>
                                    <a href="{{ route('admin.payments') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                                            <line x1="1" y1="10" x2="23" y2="10"></line>
                                        </svg>
                                        Verifikasi Pembayaran
                                    </a>
                                    <div class="dropdown-divider"></div>
                                @endif
                                <a href="{{ route('profile.edit') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    Profil
                                </a>
                                <a href="{{ route('donations.history') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                                    </svg>
                                    Riwayat Donasi
                                </a>
                                <div class="dropdown-divider"></div>
                                <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                                    @csrf
                                    <a href="#" onclick="event.preventDefault(); this.closest('form').submit();">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                            <polyline points="16,17 21,12 16,7"></polyline>
                                            <line x1="21" y1="12" x2="9" y2="12"></line>
                                        </svg>
                                        Keluar
                                    </a>
                                </form>
                            </div>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="login-btn">Masuk</a>
                    @endauth
                </nav>
            </div>
        </header>

        <!-- Main Content -->
        <main class="main-content">
            @yield('content')
        </main>

        <!-- Enhanced Footer -->
        <footer class="footer" id="kontak">
            <div class="footer-content">
                {{-- Footer Top --}}
                <div class="footer-top">
                    <div class="footer-brand">
                        <h3 class="footer-logo">Platform Pesantren</h3>
                        <p class="footer-tagline">Menghubungkan hati dermawan dengan pendidikan pesantren di seluruh Indonesia. Bersama membangun masa depan yang lebih baik melalui pendidikan berkualitas.</p>
                        <div class="footer-social">
                            <a href="#" class="social-link" aria-label="Facebook">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                                </svg>
                            </a>
                            <a href="#" class="social-link" aria-label="Twitter">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path>
                                </svg>
                            </a>
                            <a href="#" class="social-link" aria-label="Instagram">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                    <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                    <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                                </svg>
                            </a>
                            <a href="#" class="social-link" aria-label="WhatsApp">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path>
                                </svg>
                            </a>
                        </div>
                    </div>

                    <div class="footer-links">
                        <div class="footer-column">
                            <h4>Platform</h4>
                            <ul class="footer-menu">
                                <li><a href="#tentang">Tentang Kami</a></li>
                                <li><a href="#kampanye">Kampanye Aktif</a></li>
                                <li><a href="#">Cara Berdonasi</a></li>
                                <li><a href="#">Laporan Keuangan</a></li>
                            </ul>
                        </div>

                        <div class="footer-column">
                            <h4>Pesantren</h4>
                            <ul class="footer-menu">
                                <li><a href="#">Daftar Pesantren</a></li>
                                <li><a href="#">Program Unggulan</a></li>
                                <li><a href="#">Beasiswa</a></li>
                                <li><a href="#">Fasilitas</a></li>
                            </ul>
                        </div>

                        <div class="footer-column">
                            <h4>Bantuan</h4>
                            <ul class="footer-menu">
                                <li><a href="#">FAQ</a></li>
                                <li><a href="#">Hubungi Kami</a></li>
                                <li><a href="#">Panduan</a></li>
                                <li><a href="#">Syarat & Ketentuan</a></li>
                            </ul>
                        </div>

                        <div class="footer-column">
                            <h4>Kontak</h4>
                            <div class="contact-info">
                                <div class="contact-item">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                        <polyline points="22,6 12,13 2,6"></polyline>
                                    </svg>
                                    <span>info@platformpesantren.id</span>
                                </div>
                                <div class="contact-item">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                                    </svg>
                                    <span>+62 21 1234 5678</span>
                                </div>
                                <div class="contact-item">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                        <circle cx="12" cy="10" r="3"></circle>
                                    </svg>
                                    <span>Jakarta, Indonesia</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Footer Bottom --}}
                <div class="footer-bottom">
                    <div class="footer-bottom-content">
                        <p class="copyright">© 2024 Platform Pesantren. Semua hak cipta dilindungi.</p>
                        <div class="footer-bottom-links">
                            <a href="#">Kebijakan Privasi</a>
                            <a href="#">Syarat Layanan</a>
                            <a href="#">Cookie Policy</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <script>
            // Enhanced User Dropdown Functionality
            document.addEventListener('DOMContentLoaded', function() {
                const userDropdown = document.querySelector('.user-dropdown');
                const dropdownMenu = document.querySelector('.dropdown-menu');
                
                if (userDropdown && dropdownMenu) {
                    let timeoutId;
                    
                    userDropdown.addEventListener('mouseenter', function() {
                        clearTimeout(timeoutId);
                        dropdownMenu.style.opacity = '1';
                        dropdownMenu.style.visibility = 'visible';
                        dropdownMenu.style.transform = 'translateY(0)';
                    });
                    
                    userDropdown.addEventListener('mouseleave', function() {
                        timeoutId = setTimeout(function() {
                            dropdownMenu.style.opacity = '0';
                            dropdownMenu.style.visibility = 'hidden';
                            dropdownMenu.style.transform = 'translateY(-10px)';
                        }, 150);
                    });
                }

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

                // Header scroll effect
                let lastScrollTop = 0;
                const header = document.querySelector('.header');
                
                window.addEventListener('scroll', function() {
                    let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
                    
                    if (scrollTop > 100) {
                        header.style.background = 'rgba(5, 150, 105, 0.98)';
                        header.style.backdropFilter = 'blur(20px)';
                    } else {
                        header.style.background = 'rgba(5, 150, 105, 0.95)';
                        header.style.backdropFilter = 'blur(16px)';
                    }
                    
                    lastScrollTop = scrollTop;
                });
            });
        </script>
    </body>
</html>

