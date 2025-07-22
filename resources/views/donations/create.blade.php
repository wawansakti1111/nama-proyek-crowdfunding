@extends('layouts.app')

@section('title', 'Donasi untuk ' . $campaign->title)

@section('content')
    <div class="donation-form-container">
        <h1>Donasi untuk Kampanye: {{ $campaign->title }}</h1>
        <p>Target: Rp{{ number_format($campaign->target_amount, 0, ',', '.') }} | Terkumpul: Rp{{ number_format($campaign->collected_amount, 0, ',', '.') }}</p>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('donations.store') }}" method="POST" class="donation-form">
            @csrf {{-- Token CSRF untuk keamanan --}}

            <input type="hidden" name="campaign_id" value="{{ $campaign->id }}">

            <div class="form-group">
                <label for="donor_name">Nama Anda:</label>
                <input type="text" id="donor_name" name="donor_name" value="{{ old('donor_name') }}" required>
            </div>

            <div class="form-group">
                <label for="whatsapp_number">Nomor WhatsApp (Opsional):</label>
                <input type="text" id="whatsapp_number" name="whatsapp_number" value="{{ old('whatsapp_number') }}" placeholder="Contoh: 081234567890">
            </div>

            <div class="form-group">
                <label for="amount">Nominal Donasi (Min. Rp 10.000):</label>
                <input type="number" id="amount" name="amount" value="{{ old('amount') }}" min="10000" required>
            </div>

            <div class="form-group">
                <label for="payment_method">Metode Pembayaran:</label>
                <select id="payment_method" name="payment_method" required>
                    <option value="">Pilih Metode Pembayaran</option>
                    <option value="transfer_bank" {{ old('payment_method') == 'transfer_bank' ? 'selected' : '' }}>Transfer Bank</option>
                    <option value="qris" {{ old('payment_method') == 'qris' ? 'selected' : '' }}>QRIS</option>
                    <option value="ewallet" {{ old('payment_method') == 'ewallet' ? 'selected' : '' }}>E-Wallet (OVO, Dana, dll.)</option>
                    {{-- Anda bisa menambahkan lebih banyak opsi di sini --}}
                </select>
            </div>

            <button type="submit" class="btn-submit-donation">Lanjut ke Pembayaran</button>
        </form>
    </div>

    <style>
        /* CSS tambahan untuk halaman donasi */
        .donation-form-container {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            max-width: 600px;
            margin: 20px auto;
        }
        .donation-form-container h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        .donation-form-container p {
            text-align: center;
            color: #666;
            margin-bottom: 30px;
        }
        .donation-form .form-group {
            margin-bottom: 15px;
        }
        .donation-form label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }
        .donation-form input[type="text"],
        .donation-form input[type="number"],
        .donation-form select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box; /* Pastikan padding tidak menambah lebar elemen */
        }
        .donation-form input[type="number"]::-webkit-inner-spin-button,
        .donation-form input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        .donation-form input[type="number"] {
            -moz-appearance: textfield;
        }
        .btn-submit-donation {
            display: block;
            width: 100%;
            padding: 15px;
            background-color: #007bff; /* Warna biru */
            color: white;
            text-align: center;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            font-size: 1.1em;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .btn-submit-donation:hover {
            background-color: #0056b3;
        }
        .alert.alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
            padding: 10px 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .alert.alert-danger ul {
            margin: 0;
            padding-left: 20px;
        }
    </style>
@endsection