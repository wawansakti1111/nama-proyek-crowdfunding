@extends('layouts.app')

@section('title', 'Detail Pembayaran')

@section('content')
    <div class="payment-detail-container">
        <h1>Detail Pembayaran Donasi</h1>
        <p class="campaign-title-info">untuk Kampanye: **{{ $donation->campaign->title }}**</p>

        @if(session('info'))
            <div class="alert alert-info">
                {{ session('info') }}
            </div>
        @endif

        <div class="payment-info-box">
            <div class="info-item">
                <span class="label">Nama Donatur:</span>
                <span class="value">{{ $donation->donor_name }}</span>
            </div>
            <div class="info-item">
                <span class="label">Nominal Donasi:</span>
                <span class="value">Rp{{ number_format($donation->amount - $donation->unique_code, 0, ',', '.') }}</span>
            </div>
            <div class="info-item highlight">
                <span class="label">Jumlah yang Harus Dibayar:</span>
                <span class="value total-amount">Rp{{ number_format($donation->amount, 0, ',', '.') }}</span>
            </div>
            <div class="info-item highlight">
                <span class="label">Kode Unik Pembayaran:</span>
                <span class="value unique-code">{{ $donation->unique_code }}</span>
            </div>
            <div class="info-item">
                <span class="label">Metode Pembayaran:</span>
                <span class="value">{{ ucfirst(str_replace('_', ' ', $donation->payment_method)) }}</span>
            </div>
        </div>

        <div class="payment-instructions">
            <h2>Instruksi Pembayaran</h2>
            @if ($donation->payment_method == 'transfer_bank')
                <p>Mohon transfer sejumlah **Rp{{ number_format($donation->amount, 0, ',', '.') }}** ke rekening berikut:</p>
                <div class="bank-details">
                    <p>Bank: **{{ $paymentInfo['bank_name'] ?? 'Bank Tidak Ditemukan' }}**</p>
                    <p>Nomor Rekening: **{{ $paymentInfo['account_number'] ?? 'N/A' }}**</p>
                    <p>Atas Nama: **{{ $paymentInfo['account_name'] ?? 'N/A' }}**</p>
                </div>
                <p>Pastikan jumlah yang ditransfer **TEPAT** termasuk kode unik agar pembayaran Anda dapat diverifikasi dengan cepat.</p>
            @elseif ($donation->payment_method == 'qris')
                <p>Scan QRIS berikut menggunakan aplikasi pembayaran Anda:</p>
                <div class="qris-image-container">
                    @if (isset($paymentInfo['image']))
                        <img src="{{ asset('images/' . $paymentInfo['image']) }}" alt="QRIS Code" class="qris-image">
                    @else
                        <img src="https://via.placeholder.com/250x250?text=QRIS+Placeholder" alt="QRIS Code Placeholder" class="qris-image">
                    @endif
                </div>
                <p>{{ $paymentInfo['instruction'] ?? 'Ikuti instruksi di aplikasi Anda.' }}</p>
            @elseif ($donation->payment_method == 'ewallet')
                <p>Lakukan transfer sejumlah **Rp{{ number_format($donation->amount, 0, ',', '.') }}** ke E-Wallet berikut:</p>
                <p>**{{ $paymentInfo['instruction'] ?? 'Hubungi admin untuk detail E-Wallet.' }}**</p>
                <p>Atas Nama: **{{ $paymentInfo['account_name'] ?? 'N/A' }}**</p>
                <p>Pastikan jumlah yang ditransfer **TEPAT** termasuk kode unik.</p>
            @else
                <p>Instruksi pembayaran untuk metode ini belum tersedia. Mohon hubungi admin.</p>
            @endif

            <p class="payment-note">Waktu pembayaran Anda akan kedaluwarsa dalam **10 menit**.</p>
        </div>

        <div class="action-buttons">
            {{-- Tombol "Sudah Membayar" akan mengarah ke halaman konfirmasi --}}
            <a href="{{ route('donations.confirmation', $donation->id) }}" class="btn-paid">Sudah Membayar</a>
            {{-- Tombol Batal --}}
            <a href="{{ route('home') }}" class="btn-cancel">Batalkan Donasi</a>
        </div>
    </div>

    <style>
        /* CSS tambahan untuk halaman pembayaran */
        .payment-detail-container {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            max-width: 700px;
            margin: 20px auto;
            text-align: center;
        }
        .payment-detail-container h1 {
            color: #333;
            margin-bottom: 15px;
        }
        .campaign-title-info {
            font-size: 1.1em;
            color: #555;
            margin-bottom: 30px;
        }
        .payment-info-box {
            border: 1px dashed #ccc;
            padding: 20px;
            margin-bottom: 30px;
            background-color: #f9f9f9;
            border-radius: 8px;
        }
        .info-item {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            border-bottom: 1px solid #eee;
        }
        .info-item:last-child {
            border-bottom: none;
        }
        .info-item .label {
            font-weight: bold;
            color: #444;
        }
        .info-item .value {
            color: #000;
        }
        .info-item.highlight .value {
            color: #d9534f; /* Merah untuk jumlah total dan kode unik */
            font-size: 1.2em;
            font-weight: bold;
        }
        .payment-instructions h2 {
            color: #333;
            margin-top: 30px;
            margin-bottom: 20px;
        }
        .payment-instructions p {
            line-height: 1.6;
            color: #666;
        }
        .bank-details, .qris-image-container {
            background-color: #e6f7ff;
            border: 1px solid #cceeff;
            padding: 15px;
            border-radius: 5px;
            margin: 20px auto;
            max-width: 400px;
        }
        .qris-image {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 0 auto;
        }
        .payment-note {
            font-style: italic;
            color: #888;
            margin-top: 20px;
        }
        .action-buttons {
            margin-top: 40px;
        }
        .btn-paid, .btn-cancel {
            display: inline-block;
            padding: 12px 25px;
            margin: 0 10px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }
        .btn-paid {
            background-color: #5cb85c; /* Hijau */
            color: white;
        }
        .btn-paid:hover {
            background-color: #4cae4c;
        }
        .btn-cancel {
            background-color: #f0ad4e; /* Oranye */
            color: white;
        }
        .btn-cancel:hover {
            background-color: #ec971f;
        }
        .alert.alert-info {
            background-color: #d1ecf1;
            color: #0c5460;
            border: 1px solid #bee5eb;
            padding: 10px 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
    </style>
@endsection