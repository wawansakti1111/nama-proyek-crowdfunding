<x-guest-layout>
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
            --red-500: #ef4444;
            --red-600: #dc2626;
            --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            --gradient-emerald: linear-gradient(135deg, var(--emerald-600), var(--teal-600));
            --gradient-emerald-light: linear-gradient(135deg, var(--emerald-500), var(--teal-500));
            --gradient-emerald-bright: linear-gradient(135deg, var(--emerald-400), var(--green-400));
            --gradient-animated: linear-gradient(45deg, var(--emerald-400), var(--teal-400), var(--emerald-500), var(--teal-500));
            --gradient-green-bg: linear-gradient(135deg, var(--emerald-50) 0%, var(--green-50) 50%, var(--teal-50) 100%);
            --blur-backdrop: blur(16px);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            background: var(--gradient-green-bg);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow-x: hidden;
        }

        /* Enhanced Green Background */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: 
                radial-gradient(circle at 20% 30%, rgba(16, 185, 129, 0.15) 0%, transparent 50%),
                radial-gradient(circle at 80% 70%, rgba(20, 184, 166, 0.15) 0%, transparent 50%);
            animation: backgroundShift 15s ease-in-out infinite;
            z-index: 1;
        }

        /* Floating Particles */
        .floating-particles {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 2;
            overflow: hidden;
        }

        .particle {
            position: absolute;
            background: var(--gradient-emerald-bright);
            border-radius: 50%;
            opacity: 0.15;
            animation: float 25s infinite linear;
        }

        .particle:nth-child(1) { width: 5px; height: 5px; left: 15%; animation-delay: 0s; }
        .particle:nth-child(2) { width: 7px; height: 7px; left: 35%; animation-delay: 5s; }
        .particle:nth-child(3) { width: 4px; height: 4px; left: 55%; animation-delay: 10s; }
        .particle:nth-child(4) { width: 6px; height: 6px; left: 75%; animation-delay: 15s; }
        .particle:nth-child(5) { width: 5px; height: 5px; left: 85%; animation-delay: 20s; }

        /* Decorative Elements */
        .bg-decoration {
            position: absolute;
            border-radius: 50%;
            background: var(--gradient-emerald-light);
            opacity: 0.06;
            animation: rotate 30s linear infinite;
            z-index: 2;
        }

        .bg-decoration:nth-child(1) {
            width: 250px;
            height: 250px;
            top: -15%;
            left: -15%;
        }

        .bg-decoration:nth-child(2) {
            width: 200px;
            height: 200px;
            bottom: -15%;
            right: -15%;
            animation-direction: reverse;
        }

        /* Main Container */
        .login-container {
            position: relative;
            z-index: 10;
            width: 100%;
            max-width: 440px;
            margin: 0 auto;
            padding: 1.5rem;
        }

        /* Login Card - Balanced */
        .login-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: var(--blur-backdrop);
            border-radius: 1.75rem;
            padding: 2.25rem;
            box-shadow: 
                var(--shadow-xl),
                0 0 40px rgba(16, 185, 129, 0.15);
            border: 2px solid rgba(16, 185, 129, 0.2);
            position: relative;
            overflow: hidden;
            animation: slideUp 0.7s ease-out;
        }

        .login-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: var(--gradient-emerald-bright);
            border-radius: 1.75rem 1.75rem 0 0;
        }

        .login-card::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: conic-gradient(from 0deg, transparent, rgba(16, 185, 129, 0.03), transparent);
            animation: rotate 30s linear infinite;
            pointer-events: none;
        }

        /* Header - Balanced */
        .login-header {
            text-align: center;
            margin-bottom: 1.75rem;
            position: relative;
            z-index: 2;
        }

        .login-title {
            font-size: 1.9rem;
            font-weight: 800;
            background: var(--gradient-animated);
            background-size: 300% 300%;
            animation: gradientShift 6s ease infinite;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 0.6rem;
        }

        .login-subtitle {
            color: var(--emerald-700);
            font-size: 0.95rem;
            font-weight: 500;
        }

        /* LOGO DIPERBESAR & PROMINENT */
        .login-icon {
            width: 90px;
            height: 90px;
            background: var(--gradient-emerald-bright);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.25rem auto;
            box-shadow: 
                var(--shadow-xl),
                0 0 35px rgba(16, 185, 129, 0.4),
                inset 0 2px 15px rgba(255, 255, 255, 0.3);
            animation: logoFloat 3s ease-in-out infinite;
            position: relative;
            border: 3px solid rgba(255, 255, 255, 0.4);
        }

        .login-icon::before {
            content: '';
            position: absolute;
            top: -4px;
            left: -4px;
            right: -4px;
            bottom: -4px;
            background: var(--gradient-emerald);
            border-radius: 50%;
            z-index: -1;
            opacity: 0.4;
            animation: pulse 2.5s ease-in-out infinite;
        }

        .login-icon::after {
            content: '';
            position: absolute;
            top: -8px;
            left: -8px;
            right: -8px;
            bottom: -8px;
            background: var(--gradient-emerald-light);
            border-radius: 50%;
            z-index: -2;
            opacity: 0.2;
            animation: pulse 3s ease-in-out infinite reverse;
        }

        .login-icon svg {
            width: 36px;
            height: 36px;
            color: white;
            filter: drop-shadow(0 2px 6px rgba(0, 0, 0, 0.3));
            z-index: 3;
            position: relative;
        }

        /* Form Styles */
        .form-container {
            position: relative;
            z-index: 2;
        }

        .form-group {
            margin-bottom: 1.4rem;
            position: relative;
        }

        .form-label {
            display: block;
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--emerald-800);
            margin-bottom: 0.5rem;
        }

        .form-input {
            width: 100%;
            padding: 1rem 1rem 1rem 3rem;
            border: 2px solid var(--emerald-200);
            border-radius: 1.1rem;
            font-size: 0.98rem;
            font-weight: 500;
            background: rgba(236, 253, 245, 0.5);
            backdrop-filter: blur(8px);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            color: var(--emerald-900);
        }

        .form-input:focus {
            outline: none;
            border-color: var(--emerald-500);
            background: rgba(255, 255, 255, 0.9);
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.15);
            transform: translateY(-1px);
        }

        .form-input:focus + .input-icon {
            color: var(--emerald-600);
            transform: translateY(-50%) scale(1.1);
        }

        .form-input::placeholder {
            color: var(--emerald-400);
            font-weight: 400;
        }

        /* Input Icons */
        .input-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--emerald-500);
            transition: all 0.3s ease;
            z-index: 2;
        }

        .input-wrapper {
            position: relative;
        }

        /* Password Toggle */
        .password-toggle {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--emerald-500);
            cursor: pointer;
            transition: all 0.3s ease;
            z-index: 2;
            padding: 0.4rem;
            border-radius: 0.5rem;
        }

        .password-toggle:hover {
            color: var(--emerald-700);
            background: rgba(16, 185, 129, 0.1);
        }

        /* Checkbox */
        .checkbox-container {
            display: flex;
            align-items: center;
            margin-bottom: 1.4rem;
            position: relative;
            z-index: 2;
        }

        .custom-checkbox {
            position: relative;
            display: inline-block;
            width: 20px;
            height: 20px;
            margin-right: 0.7rem;
        }

        .custom-checkbox input {
            opacity: 0;
            position: absolute;
            cursor: pointer;
        }

        .checkmark {
            position: absolute;
            top: 0;
            left: 0;
            height: 20px;
            width: 20px;
            background: rgba(236, 253, 245, 0.8);
            border: 2px solid var(--emerald-300);
            border-radius: 0.45rem;
            transition: all 0.3s ease;
        }

        .custom-checkbox:hover input ~ .checkmark {
            border-color: var(--emerald-500);
            background: rgba(16, 185, 129, 0.1);
        }

        .custom-checkbox input:checked ~ .checkmark {
            background: var(--gradient-emerald-bright);
            border-color: var(--emerald-600);
            box-shadow: 0 0 10px rgba(16, 185, 129, 0.3);
        }

        .checkmark:after {
            content: "";
            position: absolute;
            display: none;
        }

        .custom-checkbox input:checked ~ .checkmark:after {
            display: block;
        }

        .custom-checkbox .checkmark:after {
            left: 6px;
            top: 2px;
            width: 6px;
            height: 10px;
            border: solid white;
            border-width: 0 2px 2px 0;
            transform: rotate(45deg);
        }

        .checkbox-label {
            font-size: 0.9rem;
            color: var(--emerald-700);
            cursor: pointer;
            user-select: none;
            font-weight: 500;
        }

        /* Primary Button */
        .btn-primary {
            width: 100%;
            background: var(--gradient-emerald-bright);
            background-size: 300% 300%;
            animation: gradientShift 8s ease infinite;
            color: var(--white);
            border: none;
            padding: 1.1rem 1.5rem;
            border-radius: 1.1rem;
            font-weight: 700;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 
                var(--shadow-lg),
                0 0 20px rgba(16, 185, 129, 0.3);
            position: relative;
            overflow: hidden;
            border: 2px solid rgba(255, 255, 255, 0.3);
            text-transform: uppercase;
            letter-spacing: 0.4px;
        }

        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.5s ease;
        }

        .btn-primary:hover::before {
            left: 100%;
        }

        .btn-primary:hover {
            transform: translateY(-2px) scale(1.02);
            box-shadow: 
                var(--shadow-xl),
                0 0 30px rgba(16, 185, 129, 0.5);
        }

        /* Links */
        .forgot-password {
            color: var(--emerald-600);
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 600;
            transition: all 0.3s ease;
            position: relative;
            padding: 0.5rem 0.9rem;
            border-radius: 0.7rem;
        }

        .forgot-password::after {
            content: '';
            position: absolute;
            bottom: 0.3rem;
            left: 0.9rem;
            width: 0;
            height: 2px;
            background: var(--gradient-emerald);
            transition: width 0.3s ease;
        }

        .forgot-password:hover {
            color: var(--emerald-800);
            background: rgba(16, 185, 129, 0.1);
        }

        .forgot-password:hover::after {
            width: calc(100% - 1.8rem);
        }

        /* Form Actions */
        .form-actions {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 1.6rem;
            position: relative;
            z-index: 2;
        }

        /* Error Messages */
        .error-message {
            color: var(--red-600);
            font-size: 0.85rem;
            margin-top: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            animation: shake 0.5s ease-in-out;
            background: rgba(239, 68, 68, 0.1);
            padding: 0.6rem 0.9rem;
            border-radius: 0.7rem;
            border: 1px solid rgba(239, 68, 68, 0.2);
        }

        /* Status Messages */
        .status-message {
            background: rgba(16, 185, 129, 0.15);
            border: 2px solid var(--emerald-300);
            color: var(--emerald-800);
            padding: 1rem;
            border-radius: 1.1rem;
            margin-bottom: 1.75rem;
            font-size: 0.9rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 0.7rem;
            animation: slideDown 0.5s ease-out;
            box-shadow: 0 0 15px rgba(16, 185, 129, 0.1);
        }

        /* Responsive Design */
        @media (max-width: 640px) {
            .login-container {
                padding: 1rem;
                max-width: 400px;
            }

            .login-card {
                padding: 2rem;
            }

            .login-title {
                font-size: 1.7rem;
            }

            .login-icon {
                width: 80px;
                height: 80px;
            }

            .login-icon svg {
                width: 32px;
                height: 32px;
            }

            .form-actions {
                flex-direction: column;
                gap: 1.2rem;
                align-items: stretch;
            }

            .bg-decoration {
                display: none;
            }
        }

        @media (max-height: 750px) {
            .login-card {
                padding: 1.8rem;
            }

            .login-header {
                margin-bottom: 1.4rem;
            }

            .login-icon {
                width: 80px;
                height: 80px;
                margin-bottom: 1rem;
            }

            .login-icon svg {
                width: 32px;
                height: 32px;
            }

            .form-group {
                margin-bottom: 1.2rem;
            }

            .checkbox-container {
                margin-bottom: 1.2rem;
            }

            .form-actions {
                margin-top: 1.3rem;
            }
        }

        /* Animations */
        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(25px) scale(0.97);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-15px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-4px); }
            75% { transform: translateX(4px); }
        }

        @keyframes float {
            0% {
                transform: translateY(100vh) rotate(0deg);
                opacity: 0;
            }
            10% {
                opacity: 0.15;
            }
            90% {
                opacity: 0.15;
            }
            100% {
                transform: translateY(-100px) rotate(360deg);
                opacity: 0;
            }
        }

        @keyframes rotate {
            from {
                transform: rotate(0deg);
            }
            to {
                transform: rotate(360deg);
            }
        }

        @keyframes gradientShift {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }

        @keyframes logoFloat {
            0%, 100% {
                transform: translateY(0) scale(1);
            }
            50% {
                transform: translateY(-4px) scale(1.02);
            }
        }

        @keyframes pulse {
            0%, 100% {
                transform: scale(1);
                opacity: 0.4;
            }
            50% {
                transform: scale(1.08);
                opacity: 0.6;
            }
        }

        @keyframes backgroundShift {
            0%, 100% {
                opacity: 1;
            }
            50% {
                opacity: 0.8;
            }
        }

        /* Accessibility */
        @media (prefers-reduced-motion: reduce) {
            * {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
            }
        }

        /* Focus States */
        .btn-primary:focus,
        .forgot-password:focus {
            outline: 3px solid rgba(16, 185, 129, 0.5);
            outline-offset: 2px;
        }

        .form-input:focus {
            outline: 3px solid rgba(16, 185, 129, 0.3);
            outline-offset: 1px;
        }
    </style>

    <!-- Floating Particles -->
    <div class="floating-particles">
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
    </div>

    <!-- Background Decorations -->
    <div class="bg-decoration"></div>
    <div class="bg-decoration"></div>

    <div class="login-container">
        <div class="login-card">
            <!-- Header -->
            <div class="login-header">
                <!-- LOGO DIPERBESAR & PROMINENT -->
                <div class="login-icon">
                    <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"/>
                        <polyline points="10,17 15,12 10,7"/>
                        <line x1="15" y1="12" x2="3" y2="12"/>
                    </svg>
                </div>
                <h1 class="login-title">Selamat Datang</h1>
                <p class="login-subtitle">Masuk ke platform crowdfunding Anda</p>
            </div>

            <!-- Session Status -->
            @if (session('status'))
                <div class="status-message">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="20,6 9,17 4,12"/>
                    </svg>
                    {{ session('status') }}
                </div>
            @endif

            <!-- Login Form -->
            <form method="POST" action="{{ route('login') }}" class="form-container">
                @csrf

                <!-- Email Address -->
                <div class="form-group">
                    <label for="email" class="form-label">{{ __('Email') }}</label>
                    <div class="input-wrapper">
                        <svg class="input-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                            <polyline points="22,6 12,13 2,6"/>
                        </svg>
                        <input id="email" 
                               class="form-input" 
                               type="email" 
                               name="email" 
                               value="{{ old('email') }}" 
                               required 
                               autofocus 
                               autocomplete="username"
                               placeholder="Masukkan email Anda" />
                    </div>
                    @if ($errors->get('email'))
                        <div class="error-message">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"/>
                                <line x1="15" y1="9" x2="9" y2="15"/>
                                <line x1="9" y1="9" x2="15" y2="15"/>
                            </svg>
                            {{ $errors->get('email')[0] }}
                        </div>
                    @endif
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label for="password" class="form-label">{{ __('Password') }}</label>
                    <div class="input-wrapper">
                        <svg class="input-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                            <circle cx="12" cy="16" r="1"/>
                            <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                        </svg>
                        <input id="password" 
                               class="form-input" 
                               type="password" 
                               name="password" 
                               required 
                               autocomplete="current-password"
                               placeholder="Masukkan password Anda" />
                        <svg class="password-toggle" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" onclick="togglePassword()">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                            <circle cx="12" cy="12" r="3"/>
                        </svg>
                    </div>
                    @if ($errors->get('password'))
                        <div class="error-message">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"/>
                                <line x1="15" y1="9" x2="9" y2="15"/>
                                <line x1="9" y1="9" x2="15" y2="15"/>
                            </svg>
                            {{ $errors->get('password')[0] }}
                        </div>
                    @endif
                </div>

                <!-- Remember Me -->
                <div class="checkbox-container">
                    <label class="custom-checkbox">
                        <input id="remember_me" type="checkbox" name="remember">
                        <span class="checkmark"></span>
                    </label>
                    <label for="remember_me" class="checkbox-label">{{ __('Ingat saya') }}</label>
                </div>

                <!-- Form Actions -->
                <div class="form-actions">
                    @if (Route::has('password.request'))
                        <a class="forgot-password" href="{{ route('password.request') }}">
                            {{ __('Lupa password?') }}
                        </a>
                    @endif

                    <button type="submit" class="btn-primary">
                        {{ __('Masuk Sekarang') }}
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Password toggle functionality
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.querySelector('.password-toggle');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.innerHTML = `
                    <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/>
                    <line x1="1" y1="1" x2="23" y2="23"/>
                `;
            } else {
                passwordInput.type = 'password';
                toggleIcon.innerHTML = `
                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                    <circle cx="12" cy="12" r="3"/>
                `;
            }
        }

        // Enhanced form interactions
        document.addEventListener('DOMContentLoaded', function() {
            const inputs = document.querySelectorAll('.form-input');
            const labels = document.querySelectorAll('.form-label');

            inputs.forEach((input, index) => {
                const label = labels[index];
                
                input.addEventListener('focus', function() {
                    if (label) {
                        label.style.color = 'var(--emerald-700)';
                    }
                });

                input.addEventListener('blur', function() {
                    if (label) {
                        label.style.color = 'var(--emerald-800)';
                    }
                });
            });

            // Form submission animation
            const form = document.querySelector('form');
            const submitBtn = document.querySelector('.btn-primary');
            
            form.addEventListener('submit', function() {
                submitBtn.innerHTML = `
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="animation: rotate 1s linear infinite;">
                        <line x1="12" y1="2" x2="12" y2="6"/>
                        <line x1="12" y1="18" x2="12" y2="22"/>
                        <line x1="4.93" y1="4.93" x2="7.76" y2="7.76"/>
                        <line x1="16.24" y1="16.24" x2="19.07" y2="19.07"/>
                        <line x1="2" y1="12" x2="6" y2="12"/>
                        <line x1="18" y1="12" x2="22" y2="12"/>
                        <line x1="4.93" y1="19.07" x2="7.76" y2="16.24"/>
                        <line x1="16.24" y1="7.76" x2="19.07" y2="4.93"/>
                    </svg>
                    Sedang Masuk...
                `;
                submitBtn.disabled = true;
            });

            // Enhanced logo interaction
            const loginIcon = document.querySelector('.login-icon');
            loginIcon.addEventListener('mouseenter', function() {
                this.style.transform = 'scale(1.08) rotate(3deg)';
                this.style.boxShadow = 'var(--shadow-xl), 0 0 45px rgba(16, 185, 129, 0.6)';
            });

            loginIcon.addEventListener('mouseleave', function() {
                this.style.transform = 'scale(1) rotate(0deg)';
                this.style.boxShadow = 'var(--shadow-xl), 0 0 35px rgba(16, 185, 129, 0.4)';
            });
        });
    </script>
</x-guest-layout>

