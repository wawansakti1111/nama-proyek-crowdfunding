<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - Admin</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Scripts & Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --emerald-50: #ecfdf5;
            --emerald-100: #d1fae5;
            --emerald-400: #34d399;
            --emerald-500: #10b981;
            --emerald-600: #059669;
            --emerald-700: #047857;
            --teal-500: #14b8a6;
            --teal-600: #0d9488;
            --green-500: #22c55e;
            --green-600: #16a34a;
            --slate-50: #f8fafc;
            --slate-100: #f1f5f9;
            --slate-200: #e2e8f0;
            --slate-500: #64748b;
            --slate-800: #1e293b;
            --slate-900: #0f172a;
        }

        * {
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
        }

        body {
            background: linear-gradient(135deg, var(--slate-50) 0%, var(--emerald-50) 100%);
            min-height: 100vh;
        }

        .modern-nav {
            background: linear-gradient(135deg, var(--emerald-500) 0%, var(--teal-500) 100%);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }

        .nav-container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 1rem;
        }

        .nav-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 4rem;
        }

        .nav-left {
            display: flex;
            align-items: center;
        }

        .logo-container {
            display: flex;
            align-items: center;
            margin-right: 2.5rem;
        }

        .logo-container a {
            color: white;
            text-decoration: none;
            font-weight: 700;
            font-size: 1.25rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .logo-icon {
            width: 2rem;
            height: 2rem;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 0.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .nav-links {
            display: flex;
            gap: 0.5rem;
        }

        .nav-link {
            color: rgba(255, 255, 255, 0.9);
            text-decoration: none;
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            font-weight: 500;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .nav-link:hover {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            transform: translateY(-1px);
        }

        .nav-link.active {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .nav-right {
            display: flex;
            align-items: center;
        }

        .user-dropdown {
            position: relative;
        }

        .user-trigger {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: white;
            background: rgba(255, 255, 255, 0.1);
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 0.75rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .user-trigger:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-1px);
        }

        .user-avatar {
            width: 2rem;
            height: 2rem;
            background: linear-gradient(135deg, var(--emerald-400) 0%, var(--teal-500) 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
        }

        .dropdown-arrow {
            width: 1rem;
            height: 1rem;
            transition: transform 0.3s ease;
        }

        .page-header {
            background: white;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
            border-bottom: 1px solid var(--slate-200);
        }

        .header-container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 1.5rem 1rem;
        }

        .main-content {
            max-width: 1280px;
            margin: 0 auto;
            padding: 2rem 1rem;
        }

        /* Mobile Responsive */
        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }
            
            .nav-container {
                padding: 0 0.5rem;
            }
            
            .logo-container {
                margin-right: 1rem;
            }
            
            .main-content {
                padding: 1rem 0.5rem;
            }
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in-up {
            animation: fadeInUp 0.6s ease-out;
        }

        /* Glassmorphism effect */
        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
    </style>
</head>
<body class="antialiased">
    <div class="min-h-screen">
        {{-- Modern Navigation --}}
        <nav class="modern-nav">
            <div class="nav-container">
                <div class="nav-content">
                    <div class="nav-left">
                        <!-- Logo -->
                        <div class="logo-container">
                            <a href="{{ route('admin.dashboard') }}">
                                <div class="logo-icon">
                                    <svg width="20" height="20" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"/>
                                    </svg>
                                </div>
                                Admin Panel
                            </a>
                        </div>

                        <!-- Navigation Links -->
                        <div class="nav-links">
                            <a href="{{ route('admin.dashboard') }}" 
                               class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                                Dashboard
                            </a>
                            <a href="{{ route('admin.donations.index') }}" 
                               class="nav-link {{ request()->routeIs('admin.donations.index') ? 'active' : '' }}">
                                Verifikasi Pembayaran
                            </a>
                            <a href="{{ route('admin.campaigns.index') }}" 
                               class="nav-link {{ request()->routeIs('admin.campaigns.index') ? 'active' : '' }}">
                                Manajemen Kampanye
                            </a>
                            <a href="{{ route('admin.campaigns.create') }}" 
                               class="nav-link {{ request()->routeIs('admin.campaigns.create') ? 'active' : '' }}">
                                Ajukan Kampanye Baru
                            </a>
                        </div>
                    </div>

                    <!-- User Dropdown -->
                    <div class="nav-right">
                        <div class="user-dropdown" x-data="{ open: false }">
                            <button @click="open = !open" class="user-trigger">
                                <div class="user-avatar">
                                    {{ substr(Auth::user()->name, 0, 1) }}
                                </div>
                                <span>{{ Auth::user()->name }}</span>
                                <svg class="dropdown-arrow" :class="{ 'rotate-180': open }" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>

                            <div x-show="open" 
                                 @click.away="open = false"
                                 x-transition:enter="transition ease-out duration-200"
                                 x-transition:enter-start="opacity-0 scale-95"
                                 x-transition:enter-end="opacity-1 scale-100"
                                 x-transition:leave="transition ease-in duration-75"
                                 x-transition:leave-start="opacity-1 scale-100"
                                 x-transition:leave-end="opacity-0 scale-95"
                                 class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border border-slate-200 py-1 z-50">
                                <a href="{{ route('profile.edit') }}" 
                                   class="block px-4 py-2 text-sm text-slate-700 hover:bg-emerald-50 hover:text-emerald-700 transition-colors">
                                    Profile
                                </a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" 
                                            class="w-full text-left px-4 py-2 text-sm text-slate-700 hover:bg-emerald-50 hover:text-emerald-700 transition-colors">
                                        Log Out
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Page Heading -->
        @if (isset($header))
            <header class="page-header">
                <div class="header-container">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main class="main-content fade-in-up">
            {{ $slot }}
        </main>
    </div>

    <!-- Alpine.js for interactivity -->
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</body>
</html>

