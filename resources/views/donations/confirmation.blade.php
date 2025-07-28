@extends('layouts.app')

@section('title', 'Konfirmasi Pembayaran')

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
        --blue-500: #3b82f6;
        --blue-600: #2563eb;
        --orange-500: #f97316;
        --orange-600: #ea580c;
        --red-500: #ef4444;
        --red-600: #dc2626;
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

    .confirmation-page-container {
        max-width: 600px;
        margin: 0 auto;
        padding: 1.5rem 1rem;
        position: relative;
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .confirmation-container {
        background: var(--white);
        border-radius: 1.5rem;
        box-shadow: var(--shadow-xl);
        overflow: hidden;
        position: relative;
        border: 1px solid var(--emerald-100);
        text-align: center;
        width: 100%;
    }

    .confirmation-header {
        background: linear-gradient(135deg, var(--emerald-600), var(--teal-600));
        color: var(--white);
        padding: 2rem 1.5rem 1.5rem 1.5rem;
        position: relative;
        overflow: hidden;
    }

    .confirmation-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="%23ffffff" opacity="0.1"/><circle cx="75" cy="75" r="1" fill="%23ffffff" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
        opacity: 0.3;
    }

    .confirmation-icon {
        width: 60px;
        height: 60px;
        background: var(--white);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1rem auto;
        box-shadow: var(--shadow-lg);
        position: relative;
        z-index: 1;
        animation: checkmarkAnimation 0.8s ease-in-out;
    }

    .confirmation-icon svg {
        color: var(--emerald-600);
        animation: checkmarkScale 0.6s ease-in-out 0.2s both;
    }

    @keyframes checkmarkAnimation {
        0% {
            transform: scale(0);
            opacity: 0;
        }
        50% {
            transform: scale(1.2);
        }
        100% {
            transform: scale(1);
            opacity: 1;
        }
    }

    @keyframes checkmarkScale {
        0% {
            transform: scale(0);
        }
        100% {
            transform: scale(1);
        }
    }

    .confirmation-header h1 {
        font-size: 1.8rem;
        font-weight: 700;
        margin: 0;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        position: relative;
        z-index: 1;
        animation: fadeInUp 0.8s ease-out 0.4s both;
    }

    .confirmation-content {
        padding: 1.5rem;
    }

    .info-grid {
        display: grid;
        gap: 1rem;
        margin-bottom: 1.5rem;
    }

    .info-card {
        background: var(--emerald-50);
        padding: 1.25rem;
        border-radius: 1rem;
        border-left: 4px solid var(--emerald-500);
        text-align: left;
        animation: fadeInUp 0.8s ease-out 0.6s both;
    }

    .info-card h3 {
        margin: 0 0 0.5rem 0;
        font-size: 0.9rem;
        color: var(--slate-600);
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .info-card .value {
        font-size: 1.1rem;
        font-weight: 700;
        color: var(--slate-800);
        margin: 0;
    }

    .info-card.highlight .value {
        color: var(--emerald-700);
        font-size: 1.2rem;
    }

    .unique-code-card {
        background: linear-gradient(135deg, var(--emerald-100), var(--teal-100));
        padding: 1.25rem;
        border-radius: 1rem;
        border: 2px solid var(--emerald-300);
        margin-bottom: 1.5rem;
        animation: fadeInUp 0.8s ease-out 0.8s both;
    }

    .unique-code-card h3 {
        margin: 0 0 0.75rem 0;
        font-size: 0.9rem;
        color: var(--slate-700);
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .unique-code {
        font-size: 1.5rem;
        font-weight: 800;
        color: var(--emerald-700);
        font-family: 'Courier New', monospace;
        letter-spacing: 2px;
        background: var(--white);
        padding: 0.75rem;
        border-radius: 0.5rem;
        border: 2px solid var(--emerald-400);
        display: inline-block;
        box-shadow: var(--shadow);
    }

    .status-card {
        background: var(--slate-50);
        border: 2px solid var(--emerald-200);
        padding: 1.25rem;
        border-radius: 1rem;
        margin-bottom: 1.5rem;
        animation: fadeInUp 0.8s ease-out 1s both;
    }

    .status-card h3 {
        margin: 0 0 1rem 0;
        font-size: 0.9rem;
        color: var(--slate-700);
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .status-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.75rem 1.5rem;
        border-radius: 2rem;
        font-weight: 700;
        color: var(--white);
        margin-bottom: 1rem;
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        box-shadow: var(--shadow);
    }

    .status-pending {
        background: linear-gradient(135deg, var(--orange-500), var(--orange-600));
    }

    .status-paid {
        background: linear-gradient(135deg, var(--blue-500), var(--blue-600));
        animation: pulse 2s infinite;
    }

    .status-verified {
        background: linear-gradient(135deg, var(--green-500), var(--green-600));
    }

    .status-cancelled {
        background: linear-gradient(135deg, var(--red-500), var(--red-600));
    }

    @keyframes pulse {
        0%, 100% {
            transform: scale(1);
            box-shadow: var(--shadow);
        }
        50% {
            transform: scale(1.05);
            box-shadow: var(--shadow-lg);
        }
    }

    .status-description {
        margin: 0;
        color: var(--slate-600);
        font-size: 0.95rem;
        line-height: 1.6;
    }

    .action-buttons {
        display: flex;
        justify-content: center;
        gap: 1rem;
        flex-wrap: wrap;
        animation: fadeInUp 0.8s ease-out 1.2s both;
    }

    .btn-primary,
    .btn-secondary {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 1rem 1.5rem;
        text-decoration: none;
        border-radius: 0.75rem;
        font-weight: 600;
        font-size: 0.95rem;
        transition: all 0.3s ease;
        box-shadow: var(--shadow-lg);
        position: relative;
        overflow: hidden;
    }

    .btn-primary::before,
    .btn-secondary::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s;
    }

    .btn-primary:hover::before,
    .btn-secondary:hover::before {
        left: 100%;
    }

    .btn-primary {
        background: linear-gradient(135deg, var(--emerald-500), var(--teal-500));
        color: var(--white);
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 15px 30px -8px rgba(16, 185, 129, 0.4);
    }

    .btn-secondary {
        background: linear-gradient(135deg, var(--slate-500), var(--slate-600));
        color: var(--white);
    }

    .btn-secondary:hover {
        transform: translateY(-2px);
        box-shadow: 0 15px 30px -8px rgba(100, 116, 139, 0.4);
    }

    .btn-primary:active,
    .btn-secondary:active {
        transform: translateY(0);
    }

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

    /* Responsive Design */
    @media (max-width: 768px) {
        .confirmation-page-container {
            padding: 1rem;
        }

        .confirmation-header {
            padding: 1.5rem 1rem 1rem 1rem;
        }

        .confirmation-header h1 {
            font-size: 1.6rem;
        }

        .confirmation-content {
            padding: 1.25rem;
        }

        .action-buttons {
            flex-direction: column;
        }

        .btn-primary,
        .btn-secondary {
            width: 100%;
            justify-content: center;
        }

        .unique-code {
            font-size: 1.25rem;
            letter-spacing: 1px;
        }

        .confirmation-icon {
            width: 50px;
            height: 50px;
        }
    }

    @media (max-width: 480px) {
        .confirmation-header h1 {
            font-size: 1.4rem;
        }

        .confirmation-icon {
            width: 45px;
            height: 45px;
        }

        .unique-code {
            font-size: 1.1rem;
        }
    }
</style>

<div class="confirmation-page-container">
    <div class="confirmation-container">
        <div class="confirmation-header">
            <div class="confirmation-icon">
                <svg width="30" height="30" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
            </div>
            <h1>Pembayaran Berhasil Diterima</h1>
        </div>

        <div class="confirmation-content">
            <div class="info-grid">
                <div class="info-card">
                    <h3>Nama Donatur</h3>
                    <p class="value">{{ $donation->donor_name }}</p>
                </div>
                
                <div class="info-card highlight">
                    <h3>Jumlah Donasi</h3>
                    <p class="value">Rp {{ number_format($donation->amount, 0, ',', '.') }}</p>
                </div>
                
                <div class="info-card">
                    <h3>Kampanye</h3>
                    <p class="value">{{ $donation->campaign->title }}</p>
                </div>
            </div>

            <div class="unique-code-card">
                <h3>Kode Unik Pembayaran</h3>
                <div class="unique-code">{{ $donation->unique_code }}</div>
            </div>

            <div class="status-card">
                <h3>Status Pembayaran</h3>
                <div class="status-badge status-{{ $donation->status }}">
                    @if($donation->status == 'pending')
                        <svg width="16" height="16" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l3 3a1 1 0 001.414-1.414L11 9.586V6z" clip-rule="evenodd"/>
                        </svg>
                    @elseif($donation->status == 'paid')
                        <svg width="16" height="16" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M4 4a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2H4z"/>
                        </svg>
                    @elseif($donation->status == 'verified')
                        <svg width="16" height="16" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                    @else
                        <svg width="16" height="16" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                        </svg>
                    @endif
                    {{ ucfirst($donation->status) }}
                </div>
                <p class="status-description">
                    Pembayaran Anda sedang dalam proses verifikasi oleh admin. Kami akan memberitahu Anda setelah verifikasi selesai dan donasi ditambahkan ke progres kampanye.
                </p>
            </div>

            <div class="action-buttons">
                <a href="{{ route('campaigns.show', $donation->campaign->id) }}" class="btn-primary">
                    <svg width="18" height="18" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/>
                        <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/>
                    </svg>
                    Lihat Progres Kampanye
                </a>
                <a href="{{ route('home') }}" class="btn-secondary">
                    <svg width="18" height="18" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/>
                    </svg>
                    Kembali ke Beranda
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

