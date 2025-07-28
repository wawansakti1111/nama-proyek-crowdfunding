@extends('layouts.app')

@section('title', 'Donasi untuk ' . $campaign->title)

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
        min-height: 100vh;
        margin: 0;
        padding: 0;
    }

    .donation-page-container {
        max-width: 600px;
        margin: 0 auto;
        padding: 2rem 1rem;
        position: relative;
    }

    .donation-form-container {
        background: var(--white);
        border-radius: 2rem;
        box-shadow: var(--shadow-xl);
        overflow: hidden;
        position: relative;
        border: 1px solid var(--emerald-100);
    }

    .donation-header {
        background: linear-gradient(135deg, var(--emerald-600), var(--teal-600));
        color: var(--white);
        padding: 3rem 2rem 2rem 2rem;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .donation-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="%23ffffff" opacity="0.1"/><circle cx="75" cy="75" r="1" fill="%23ffffff" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
        opacity: 0.3;
    }

    .donation-header h1 {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        position: relative;
        z-index: 1;
    }

    .donation-header h2 {
        font-size: 1.2rem;
        font-weight: 400;
        margin: 0;
        opacity: 0.9;
        text-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
        position: relative;
        z-index: 1;
    }

    .donation-icon {
        width: 60px;
        height: 60px;
        background: var(--white);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem auto;
        box-shadow: var(--shadow-lg);
        position: relative;
        z-index: 1;
    }

    .donation-icon svg {
        color: var(--emerald-600);
    }

    .donation-form {
        padding: 2.5rem;
    }

    .form-group {
        margin-bottom: 2rem;
        position: relative;
    }

    .form-group label {
        display: block;
        margin-bottom: 0.75rem;
        font-weight: 600;
        color: var(--slate-700);
        font-size: 1rem;
        position: relative;
    }

    .form-group label::after {
        content: '';
        position: absolute;
        bottom: -4px;
        left: 0;
        width: 30px;
        height: 2px;
        background: linear-gradient(90deg, var(--emerald-500), var(--teal-500));
        border-radius: 1px;
    }

    .form-group input,
    .form-group select {
        width: 100%;
        padding: 1rem 1.25rem;
        border: 2px solid var(--emerald-200);
        border-radius: 1rem;
        font-size: 1rem;
        transition: all 0.3s ease;
        background: var(--slate-50);
        font-family: inherit;
        box-sizing: border-box;
    }

    .form-group input:focus,
    .form-group select:focus {
        outline: none;
        border-color: var(--emerald-500);
        background: var(--white);
        box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
        transform: translateY(-1px);
    }

    .form-group input:hover,
    .form-group select:hover {
        border-color: var(--emerald-400);
        background: var(--white);
    }

    .amount-suggestions {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 0.75rem;
        margin-top: 1rem;
    }

    .amount-btn {
        padding: 0.75rem;
        border: 2px solid var(--emerald-200);
        background: var(--emerald-50);
        color: var(--emerald-700);
        border-radius: 0.75rem;
        cursor: pointer;
        transition: all 0.3s ease;
        font-weight: 600;
        text-align: center;
        font-size: 0.9rem;
    }

    .amount-btn:hover {
        border-color: var(--emerald-500);
        background: var(--emerald-100);
        transform: translateY(-2px);
        box-shadow: var(--shadow);
    }

    .amount-btn.active {
        background: var(--emerald-500);
        color: var(--white);
        border-color: var(--emerald-500);
    }

    .btn-submit-donation {
        width: 100%;
        padding: 1.25rem 2rem;
        background: linear-gradient(135deg, var(--emerald-500), var(--teal-500));
        color: var(--white);
        border: none;
        border-radius: 1rem;
        font-size: 1.1rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: var(--shadow-lg);
        position: relative;
        overflow: hidden;
        margin-top: 1rem;
    }

    .btn-submit-donation::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s;
    }

    .btn-submit-donation:hover::before {
        left: 100%;
    }

    .btn-submit-donation:hover {
        transform: translateY(-3px);
        box-shadow: 0 20px 40px -12px rgba(16, 185, 129, 0.4);
    }

    .btn-submit-donation:active {
        transform: translateY(-1px);
    }

    .error-message {
        color: #dc2626;
        font-size: 0.875rem;
        margin-top: 0.5rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .error-alert {
        background: linear-gradient(135deg, #fef2f2, #fee2e2);
        color: #dc2626;
        padding: 1.5rem;
        border-radius: 1rem;
        margin-bottom: 2rem;
        border-left: 4px solid #dc2626;
        box-shadow: var(--shadow);
    }

    .error-alert ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .error-alert li {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        margin-bottom: 0.5rem;
    }

    .error-alert li:last-child {
        margin-bottom: 0;
    }

    .payment-method-card {
        display: flex;
        align-items: center;
        padding: 1rem;
        border: 2px solid var(--emerald-200);
        border-radius: 0.75rem;
        margin-bottom: 0.75rem;
        cursor: pointer;
        transition: all 0.3s ease;
        background: var(--emerald-50);
    }

    .payment-method-card:hover {
        border-color: var(--emerald-500);
        background: var(--emerald-100);
        transform: translateY(-1px);
        box-shadow: var(--shadow);
    }

    .payment-method-card.selected {
        border-color: var(--emerald-500);
        background: var(--emerald-100);
        box-shadow: var(--shadow);
    }

    .payment-icon {
        width: 40px;
        height: 40px;
        background: var(--emerald-500);
        border-radius: 0.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 1rem;
        color: var(--white);
    }

    .payment-info {
        flex: 1;
    }

    .payment-name {
        font-weight: 600;
        color: var(--slate-800);
        margin-bottom: 0.25rem;
    }

    .payment-type {
        font-size: 0.875rem;
        color: var(--slate-600);
        text-transform: capitalize;
    }

    .form-footer {
        background: var(--emerald-50);
        padding: 1.5rem 2.5rem;
        text-align: center;
        color: var(--slate-600);
        font-size: 0.9rem;
        border-top: 1px solid var(--emerald-100);
    }

    .security-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        background: var(--white);
        padding: 0.5rem 1rem;
        border-radius: 2rem;
        box-shadow: var(--shadow);
        margin-top: 1rem;
        color: var(--emerald-700);
        font-weight: 600;
        font-size: 0.875rem;
    }

    @media (max-width: 768px) {
        .donation-page-container {
            padding: 1rem;
        }

        .donation-header {
            padding: 2rem 1.5rem 1.5rem 1.5rem;
        }

        .donation-header h1 {
            font-size: 2rem;
        }

        .donation-form {
            padding: 2rem 1.5rem;
        }

        .form-footer {
            padding: 1.5rem;
        }

        .amount-suggestions {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 480px) {
        .donation-header h1 {
            font-size: 1.75rem;
        }

        .amount-suggestions {
            grid-template-columns: 1fr;
        }
    }

    /* Loading Animation */
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

    .donation-form-container {
        animation: fadeInUp 0.6s ease forwards;
    }

    /* Ripple Effect */
    .ripple {
        position: relative;
        overflow: hidden;
    }

    .ripple::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.3);
        transform: translate(-50%, -50%);
        transition: width 0.6s, height 0.6s;
    }

    .ripple:active::after {
        width: 300px;
        height: 300px;
    }
</style>

<div class="donation-page-container">
    <div class="donation-form-container">
        <div class="donation-header">
            <div class="donation-icon">
                <svg width="30" height="30" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"/>
                </svg>
            </div>
            <h1>Donasi Sekarang</h1>
            <h2>{{ $campaign->title }}</h2>
        </div>

        @if ($errors->any())
            <div class="error-alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>
                            <svg width="16" height="16" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                            </svg>
                            {{ $error }}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('donations.store') }}" method="POST" class="donation-form">
            @csrf
            <input type="hidden" name="campaign_id" value="{{ $campaign->id }}">

            <div class="form-group">
                <label for="donor_name">Nama Lengkap</label>
                <input type="text" id="donor_name" name="donor_name" value="{{ old('donor_name') }}" placeholder="Masukkan nama Anda" required>
            </div>

            <div class="form-group">
                <label for="whatsapp_number">Nomor WhatsApp (Opsional)</label>
                <input type="tel" id="whatsapp_number" name="whatsapp_number" value="{{ old('whatsapp_number') }}" placeholder="Contoh: 08123456789">
            </div>

            <div class="form-group">
                <label for="amount">Jumlah Donasi (Minimal Rp 10.000)</label>
                <input type="number" id="amount" name="amount" value="{{ old('amount', 10000) }}" min="10000" required>
                
                <div class="amount-suggestions">
                    <button type="button" class="amount-btn" data-amount="10000">Rp 10.000</button>
                    <button type="button" class="amount-btn" data-amount="25000">Rp 25.000</button>
                    <button type="button" class="amount-btn" data-amount="50000">Rp 50.000</button>
                    <button type="button" class="amount-btn" data-amount="100000">Rp 100.000</button>
                    <button type="button" class="amount-btn" data-amount="250000">Rp 250.000</button>
                    <button type="button" class="amount-btn" data-amount="500000">Rp 500.000</button>
                </div>
            </div>

            <div class="form-group">
                <label for="payment_method_id">Metode Pembayaran</label>
                <div class="payment-methods">
                    @foreach($paymentMethods as $method)
                        <div class="payment-method-card" data-method="{{ $method->id }}">
                            <div class="payment-icon">
                                @if($method->type == 'bank')
                                    <svg width="20" height="20" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2H4zm0 2h12v2H4V6zm0 4h12v4H4v-4z" clip-rule="evenodd"/>
                                    </svg>
                                @elseif($method->type == 'ewallet')
                                    <svg width="20" height="20" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z"/>
                                        <path fill-rule="evenodd" d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z" clip-rule="evenodd"/>
                                    </svg>
                                @else
                                    <svg width="20" height="20" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z"/>
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd"/>
                                    </svg>
                                @endif
                            </div>
                            <div class="payment-info">
                                <div class="payment-name">{{ $method->name }}</div>
                                <div class="payment-type">{{ ucfirst($method->type) }}</div>
                            </div>
                            <input type="radio" name="payment_method_id" value="{{ $method->id }}" style="display: none;" @checked(old('payment_method_id') == $method->id)>
                        </div>
                    @endforeach
                </div>
            </div>

            <button type="submit" class="btn-submit-donation ripple">
                <svg width="20" height="20" fill="currentColor" viewBox="0 0 20 20" style="margin-right: 0.5rem;">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                Lanjut ke Pembayaran
            </button>
        </form>

        <div class="form-footer">
            <p>Donasi Anda akan membantu mewujudkan impian bersama</p>
            <div class="security-badge">
                <svg width="16" height="16" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                Transaksi Aman & Terpercaya
            </div>
        </div>
    </div>
</div>

<script>
    // Amount suggestion buttons
    document.querySelectorAll('.amount-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const amount = this.dataset.amount;
            document.getElementById('amount').value = amount;
            
            // Update active state
            document.querySelectorAll('.amount-btn').forEach(b => b.classList.remove('active'));
            this.classList.add('active');
        });
    });

    // Payment method selection
    document.querySelectorAll('.payment-method-card').forEach(card => {
        card.addEventListener('click', function() {
            const methodId = this.dataset.method;
            const radio = this.querySelector('input[type="radio"]');
            
            // Update selection
            document.querySelectorAll('.payment-method-card').forEach(c => c.classList.remove('selected'));
            this.classList.add('selected');
            radio.checked = true;
        });
    });

    // Format number input
    document.getElementById('amount').addEventListener('input', function() {
        // Remove active state from amount buttons when manually typing
        document.querySelectorAll('.amount-btn').forEach(b => b.classList.remove('active'));
    });

    // Form validation
    document.querySelector('.donation-form').addEventListener('submit', function(e) {
        const amount = parseInt(document.getElementById('amount').value);
        const paymentMethod = document.querySelector('input[name="payment_method_id"]:checked');
        
        if (amount < 10000) {
            e.preventDefault();
            alert('Jumlah donasi minimal Rp 10.000');
            return;
        }
        
        if (!paymentMethod) {
            e.preventDefault();
            alert('Silakan pilih metode pembayaran');
            return;
        }
    });
</script>
@endsection

