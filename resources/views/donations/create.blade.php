@extends('layouts.app')

@section('title', 'Donasi untuk ' . $campaign->title)

@section('content')
<style>
    /* Anda bisa memindahkan CSS ini ke file terpisah */
    .donation-form-container { max-width: 500px; margin: 2rem auto; padding: 2rem; background-color: #fff; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
    .form-group { margin-bottom: 1.5rem; }
    .form-group label { display: block; margin-bottom: 0.5rem; font-weight: 600; color: #333; }
    .form-group input, .form-group select { width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; }
    .btn-submit-donation { width: 100%; padding: 0.8rem; background-color: #4f46e5; color: white; border: none; border-radius: 4px; font-size: 1rem; cursor: pointer; transition: background-color 0.2s; }
    .btn-submit-donation:hover { background-color: #4338ca; }
    .error-message { color: #e53e3e; font-size: 0.875rem; margin-top: 0.25rem; }
</style>

<div class="donation-form-container">
    <h1 style="text-align: center; margin-bottom: 1rem; font-size: 1.5rem;">Donasi Sekarang</h1>
    <h2 style="text-align: center; margin-bottom: 2rem; font-weight: normal; color: #555;">{{ $campaign->title }}</h2>

    @if ($errors->any())
        <div style="background-color:#fed7d7; color: #c53030; padding: 1rem; border-radius: 4px; margin-bottom: 1rem;">
            <ul style="list-style: none; padding: 0;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
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
        </div>

        <div class="form-group">
            <label for="payment_method_id">Metode Pembayaran</label>
            <select id="payment_method_id" name="payment_method_id" required>
                <option value="" disabled selected>Pilih Metode Pembayaran</option>
                @foreach($paymentMethods as $method)
                    <option value="{{ $method->id }}" @selected(old('payment_method_id') == $method->id)>
                        {{ $method->name }} ({{ ucfirst($method->type) }})
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn-submit-donation">Lanjut ke Pembayaran</button>
    </form>
</div>
@endsection