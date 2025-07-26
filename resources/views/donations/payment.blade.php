@extends('layouts.app')

@section('title', 'Detail Pembayaran')

@section('content')
<style>
    /* ... (CSS tidak perlu diubah, biarkan seperti yang sudah ada) ... */
    .payment-detail-container { max-width: 600px; margin: 2rem auto; padding: 2rem; background-color: #fff; border-radius: 8px; text-align: center; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
    .payment-info-box { background-color: #f9fafb; border: 1px solid #e5e7eb; padding: 1.5rem; border-radius: 8px; margin-bottom: 2rem; }
    .info-item { display: flex; justify-content: space-between; padding: 0.5rem 0; border-bottom: 1px solid #eee; }
    .info-item .label { color: #6b7280; }
    .info-item .value { font-weight: 600; color: #111827; }
    .total-amount .value { font-size: 1.5rem; color: #ef4444; }
    .payment-instructions { text-align: left; padding: 1.5rem; border: 1px dashed #ccc; border-radius: 8px; }
    .bank-details { background-color: #eef2ff; padding: 1rem; border-radius: 4px; margin: 1rem 0; text-align: center; }
    .bank-details p { margin: 0.5rem 0; }
    .account-number { font-size: 1.5rem; font-weight: bold; letter-spacing: 1px; }
    .action-buttons { margin-top: 2rem; display: flex; justify-content: center; gap: 1rem; }
    .btn { padding: 0.75rem 1.5rem; border-radius: 4px; text-decoration: none; font-weight: 600; transition: all 0.2s; border: none; cursor: pointer; }
    .btn-paid { background-color: #22c55e; color: white; }
    .btn-paid:hover { background-color: #16a34a; }
    .btn-cancel { background-color: #ef4444; color: white; }
    .btn-cancel:hover { background-color: #dc2626; }
</style>

<div class="payment-detail-container">
    {{-- ... (Bagian detail pembayaran tidak berubah) ... --}}
    <h1>Selesaikan Pembayaran Anda</h1>
    <p style="color: #6b7280; margin-top:-0.5rem; margin-bottom: 2rem;">untuk Kampanye: <strong>{{ $donation->campaign->title }}</strong></p>
    <div class="payment-info-box">
        <div class="info-item">
            <span class="label">Nama Donatur:</span>
            <span class="value">{{ $donation->donor_name }}</span>
        </div>
        <div class="info-item total-amount">
            <span class="label">Jumlah Transfer:</span>
            <span class="value">Rp {{ number_format($donation->amount, 0, ',', '.') }}</span>
        </div>
        <p style="font-size: 0.8rem; color: #6b7280; text-align: right; margin-top: 0.5rem;">
            (Termasuk kode unik Rp {{ number_format($donation->unique_code, 0, ',', '.') }})
        </p>
    </div>
    <div class="payment-instructions">
        <h2>Instruksi Pembayaran</h2>
        <p>Silakan transfer sejumlah <strong>Rp {{ number_format($donation->amount, 0, ',', '.') }}</strong> ke rekening berikut:</p>
        <div class="bank-details">
            <p style="font-size: 1.2rem; font-weight: 600;">{{ config('payment_options.'. $paymentMethod->type .'s')[$paymentMethod->name] ?? $paymentMethod->name }}</p>
            <p class="account-number">{{ $paymentMethod->account_details }}</p>
            <p>a/n <strong>{{ $paymentMethod->account_holder_name }}</strong></p>
        </div>
        <p style="color: #dc2626; font-weight: 500;">PENTING: Pastikan jumlah transfer sesuai hingga 3 digit terakhir agar donasi Anda dapat diverifikasi secara otomatis.</p>
    </div>

    <div class="action-buttons">
        {{-- =================================== --}}
        {{--         PERBAIKAN UTAMA DI SINI       --}}
        {{-- =================================== --}}
        <button type="button" class="btn btn-paid" onclick="handleConfirmation()">
            Saya Sudah Bayar
        </button>
        {{-- =================================== --}}
        
        <a href="{{ route('home') }}" class="btn btn-cancel" onclick="return confirm('Apakah Anda yakin ingin membatalkan donasi ini?')">Batalkan</a>
    </div>
</div>

<script>
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