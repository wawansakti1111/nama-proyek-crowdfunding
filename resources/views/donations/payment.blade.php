@extends('layouts.app')

@section('title', 'Detail Pembayaran')

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
        --red-500: #ef4444;
        --red-600: #dc2626;
        --orange-500: #f97316;
        --orange-600: #ea580c;
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

    .payment-page-container {
        max-width: 700px;
        margin: 0 auto;
        padding: 2rem 1rem;
        position: relative;
    }

    .payment-detail-container {
        background: var(--white);
        border-radius: 2rem;
        box-shadow: var(--shadow-xl);
        overflow: hidden;
        position: relative;
        border: 1px solid var(--emerald-100);
    }

    .payment-header {
        background: linear-gradient(135deg, var(--emerald-600), var(--teal-600));
        color: var(--white);
        padding: 3rem 2rem 2rem 2rem;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .payment-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="%23ffffff" opacity="0.1"/><circle cx="75" cy="75" r="1" fill="%23ffffff" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
        opacity: 0.3;
    }

    .payment-icon {
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

    .payment-icon svg {
        color: var(--emerald-600);
    }

    .payment-header h1 {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        position: relative;
        z-index: 1;
    }

    .payment-header p {
        font-size: 1.1rem;
        margin: 0;
        opacity: 0.9;
        text-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
        position: relative;
        z-index: 1;
    }

    .payment-content {
        padding: 2.5rem;
    }

    .payment-info-box {
        background: linear-gradient(135deg, var(--emerald-50), var(--slate-50));
        border: 2px solid var(--emerald-100);
        padding: 2rem;
        border-radius: 1.5rem;
        margin-bottom: 2rem;
        position: relative;
        overflow: hidden;
    }

    .payment-info-box::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="dots" width="20" height="20" patternUnits="userSpaceOnUse"><circle cx="10" cy="10" r="1" fill="%2310b981" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23dots)"/></svg>');
        opacity: 0.5;
    }

    .info-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1rem 0;
        border-bottom: 1px solid var(--emerald-200);
        position: relative;
        z-index: 1;
    }

    .info-item:last-child {
        border-bottom: none;
    }

    .info-item .label {
        color: var(--slate-600);
        font-weight: 500;
        font-size: 1rem;
    }

    .info-item .value {
        font-weight: 700;
        color: var(--slate-800);
        font-size: 1.1rem;
    }

    .total-amount {
        background: linear-gradient(135deg, var(--emerald-100), var(--teal-100));
        border-radius: 1rem;
        padding: 1.5rem;
        margin: 1rem 0;
        border: 2px solid var(--emerald-300);
    }

    .total-amount .value {
        font-size: 2rem;
        color: var(--emerald-700);
        font-weight: 800;
    }

    .unique-code-note {
        font-size: 0.875rem;
        color: var(--slate-500);
        text-align: right;
        margin-top: 0.5rem;
        font-style: italic;
        position: relative;
        z-index: 1;
    }

    .payment-instructions {
        background: var(--white);
        border: 2px dashed var(--emerald-300);
        border-radius: 1.5rem;
        padding: 2rem;
        margin-bottom: 2rem;
        position: relative;
    }

    .payment-instructions h2 {
        color: var(--slate-800);
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .payment-instructions h2::before {
        content: '';
        width: 30px;
        height: 3px;
        background: linear-gradient(90deg, var(--emerald-500), var(--teal-500));
        border-radius: 2px;
    }

    .bank-details {
        background: linear-gradient(135deg, var(--emerald-100), var(--teal-100));
        padding: 2rem;
        border-radius: 1.5rem;
        margin: 1.5rem 0;
        text-align: center;
        border: 2px solid var(--emerald-200);
        position: relative;
        overflow: hidden;
    }

    .bank-details::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="bank-pattern" width="50" height="50" patternUnits="userSpaceOnUse"><rect x="20" y="20" width="10" height="10" fill="%2310b981" opacity="0.05"/></pattern></defs><rect width="100" height="100" fill="url(%23bank-pattern)"/></svg>');
    }

    .bank-details p {
        margin: 0.75rem 0;
        position: relative;
        z-index: 1;
    }

    .bank-name {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--emerald-700);
        margin-bottom: 1rem;
    }

    .account-number {
        font-size: 2rem;
        font-weight: 800;
        letter-spacing: 2px;
        color: var(--slate-800);
        background: var(--white);
        padding: 1rem;
        border-radius: 0.75rem;
        margin: 1rem 0;
        box-shadow: var(--shadow);
        border: 2px solid var(--emerald-300);
        font-family: 'Courier New', monospace;
    }

    .account-holder {
        font-size: 1.2rem;
        font-weight: 600;
        color: var(--slate-700);
    }

    .important-note {
        background: linear-gradient(135deg, #fef3c7, #fde68a);
        color: #92400e;
        padding: 1.5rem;
        border-radius: 1rem;
        font-weight: 600;
        border: 2px solid #f59e0b;
        margin-top: 1.5rem;
        display: flex;
        align-items: flex-start;
        gap: 0.75rem;
    }

    .important-note svg {
        flex-shrink: 0;
        margin-top: 0.125rem;
    }

    .action-buttons {
        margin-top: 2.5rem;
        display: flex;
        justify-content: center;
        gap: 1rem;
        flex-wrap: wrap;
    }

    .btn {
        padding: 1.25rem 2.5rem;
        border-radius: 1rem;
        text-decoration: none;
        font-weight: 700;
        font-size: 1.1rem;
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 0.75rem;
        box-shadow: var(--shadow-lg);
        position: relative;
        overflow: hidden;
    }

    .btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s;
    }

    .btn:hover::before {
        left: 100%;
    }

    .btn-paid {
        background: linear-gradient(135deg, var(--green-500), var(--emerald-500));
        color: var(--white);
    }

    .btn-paid:hover {
        transform: translateY(-3px);
        box-shadow: 0 20px 40px -12px rgba(34, 197, 94, 0.4);
    }

    .btn-cancel {
        background: linear-gradient(135deg, var(--red-500), var(--orange-500));
        color: var(--white);
    }

    .btn-cancel:hover {
        transform: translateY(-3px);
        box-shadow: 0 20px 40px -12px rgba(239, 68, 68, 0.4);
    }

    .btn:active {
        transform: translateY(-1px);
    }

    .copy-button {
        background: var(--emerald-500);
        color: var(--white);
        border: none;
        padding: 0.5rem 1rem;
        border-radius: 0.5rem;
        font-size: 0.875rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        margin-left: 1rem;
    }

    .copy-button:hover {
        background: var(--emerald-600);
        transform: translateY(-1px);
    }

    .copy-button:active {
        transform: translateY(0);
    }

    .step-indicator {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 1rem;
        margin-bottom: 2rem;
        padding: 1.5rem;
        background: var(--emerald-50);
        border-radius: 1rem;
        border: 1px solid var(--emerald-200);
    }

    .step {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.75rem 1.25rem;
        background: var(--white);
        border-radius: 2rem;
        font-weight: 600;
        color: var(--emerald-700);
        box-shadow: var(--shadow);
        border: 2px solid var(--emerald-300);
    }

    .step.active {
        background: var(--emerald-500);
        color: var(--white);
        animation: pulse 2s infinite;
    }

    @keyframes pulse {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.05); }
    }

    @media (max-width: 768px) {
        .payment-page-container {
            padding: 1rem;
        }

        .payment-header {
            padding: 2rem 1.5rem 1.5rem 1.5rem;
        }

        .payment-header h1 {
            font-size: 2rem;
        }

        .payment-content {
            padding: 2rem 1.5rem;
        }

        .action-buttons {
            flex-direction: column;
        }

        .btn {
            width: 100%;
            justify-content: center;
        }

        .account-number {
            font-size: 1.5rem;
            letter-spacing: 1px;
        }

        .step-indicator {
            flex-direction: column;
            gap: 0.75rem;
        }
    }

    @media (max-width: 480px) {
        .payment-header h1 {
            font-size: 1.75rem;
        }

        .total-amount .value {
            font-size: 1.5rem;
        }

        .account-number {
            font-size: 1.25rem;
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

    .payment-detail-container {
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

<div class="payment-page-container">
    <div class="payment-detail-container">
        <div class="payment-header">
            <div class="payment-icon">
                <svg width="30" height="30" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M4 4a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2H4z"/>
                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                </svg>
            </div>
            <h1>Selesaikan Pembayaran</h1>
            <p>untuk Kampanye: <strong>{{ $donation->campaign->title }}</strong></p>
        </div>

        <div class="payment-content">
            <div class="step-indicator">
                <div class="step">
                    <svg width="16" height="16" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    Donasi Dibuat
                </div>
                <div class="step active">
                    <svg width="16" height="16" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M4 4a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2H4z"/>
                    </svg>
                    Pembayaran
                </div>
                <div class="step">
                    <svg width="16" height="16" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    Selesai
                </div>
            </div>

            <div class="payment-info-box">
                <div class="info-item">
                    <span class="label">Nama Donatur:</span>
                    <span class="value">{{ $donation->donor_name }}</span>
                </div>
                <div class="info-item total-amount">
                    <span class="label">Jumlah Transfer:</span>
                    <span class="value">Rp {{ number_format($donation->amount, 0, ',', '.') }}</span>
                </div>
                <p class="unique-code-note">
                    (Termasuk kode unik Rp {{ number_format($donation->unique_code, 0, ',', '.') }})
                </p>
            </div>

            <div class="payment-instructions">
                <h2>
                    <svg width="20" height="20" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                    </svg>
                    Instruksi Pembayaran
                </h2>
                <p>Silakan transfer sejumlah <strong>Rp {{ number_format($donation->amount, 0, ',', '.') }}</strong> ke rekening berikut:</p>
                
                <div class="bank-details">
                    <p class="bank-name">{{ config('payment_options.'. $paymentMethod->type .'s')[$paymentMethod->name] ?? $paymentMethod->name }}</p>
                    <div style="display: flex; align-items: center; justify-content: center;">
                        <p class="account-number" id="accountNumber">{{ $paymentMethod->account_details }}</p>
                        <button class="copy-button" onclick="copyAccountNumber()">
                            <svg width="16" height="16" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M8 2a1 1 0 000 2h2a1 1 0 100-2H8z"/>
                                <path d="M3 5a2 2 0 012-2 3 3 0 003 3h6a3 3 0 003-3 2 2 0 012 2v6h-4.586l1.293-1.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L14.586 13H19v3a2 2 0 01-2 2H5a2 2 0 01-2-2V5zM15 11.586V9a1 1 0 00-1-1H9.414l1.293-1.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L8.414 11H15z"/>
                            </svg>
                        </button>
                    </div>
                    <p class="account-holder">a/n <strong>{{ $paymentMethod->account_holder_name }}</strong></p>
                </div>

                <div class="important-note">
                    <svg width="20" height="20" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                    </svg>
                    <div>
                        <strong>PENTING:</strong> Pastikan jumlah transfer sesuai hingga 3 digit terakhir agar donasi Anda dapat diverifikasi secara otomatis.
                    </div>
                </div>
            </div>

            <div class="action-buttons">
                <button type="button" class="btn btn-paid ripple" onclick="handleConfirmation()">
                    <svg width="20" height="20" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    Saya Sudah Bayar
                </button>
                
                <a href="{{ route('home') }}" class="btn btn-cancel ripple" onclick="return confirm('Apakah Anda yakin ingin membatalkan donasi ini?')">
                    <svg width="20" height="20" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                    </svg>
                    Batalkan
                </a>
            </div>
        </div>
    </div>
</div>

<script>
function copyAccountNumber() {
    const accountNumber = document.getElementById('accountNumber').textContent;
    navigator.clipboard.writeText(accountNumber).then(function() {
        // Show success feedback
        const button = document.querySelector('.copy-button');
        const originalText = button.innerHTML;
        button.innerHTML = '<svg width="16" height="16" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>';
        button.style.background = '#22c55e';
        
        setTimeout(() => {
            button.innerHTML = originalText;
            button.style.background = '#10b981';
        }, 2000);
    });
}

function handleConfirmation() {
    // 1. Siapkan data untuk pesan WhatsApp
    const phoneNumber = '628979860469';
    const donorName = "{{ $donation->donor_name }}";
    const amount = "Rp {{ number_format($donation->amount, 0, ',', '.') }}";
    const campaignTitle = "{{ $donation->campaign->title }}";

    // 2. Buat format pesan yang rapi
    const messageLines = [
        "Assalamualaikum Wr. Wb.",
        "",
        "Saya ingin melakukan konfirmasi pembayaran donasi atas nama:",
        "*Nama Donatur:* " + donorName,
        "",
        "Dengan rincian sebagai berikut:",
        "*Jumlah Transfer:* " + amount,
        "*Untuk Kampanye:* " + campaignTitle,
        "",
        "Mohon untuk segera diperiksa dan diverifikasi.",
        "Terima kasih atas perhatiannya.",
        "Wassalamualaikum Wr. Wb.",
    ];
    const message = encodeURIComponent(messageLines.join('\n'));

    // 3. Buat URL WhatsApp
    const whatsappUrl = `https://wa.me/${phoneNumber}?text=${message}`;

    // 4. Buat URL halaman konfirmasi
    const confirmationUrl = "{{ route('donations.confirmation', $donation->id) }}";

    // 5. Buka WhatsApp di tab baru
    window.open(whatsappUrl, '_blank');

    // 6. Arahkan halaman saat ini ke halaman konfirmasi
    window.location.href = confirmationUrl;
}
</script>
@endsection

