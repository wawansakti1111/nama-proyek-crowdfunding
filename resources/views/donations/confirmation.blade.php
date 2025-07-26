@extends('layouts.app')

@section('title', 'Konfirmasi Pembayaran')

@section('content')
    <div class="confirmation-container">
        <div class="confirmation-icon">
            &#10003;
        </div>
        <h1>Pembayaran Berhasil Diterima!</h1>
        <p class="message">
            Terima kasih, <strong>{{ $donation->donor_name }}</strong>! Pembayaran Anda sebesar <strong>Rp{{ number_format($donation->amount, 0, ',', '.') }}</strong> untuk kampanye <strong>"{{ $donation->campaign->title }}"</strong> telah kami terima dan sedang dalam proses verifikasi oleh admin.
        </p>
        <p class="unique-code-info">
            Kode unik pembayaran Anda: <strong>{{ $donation->unique_code }}</strong>
        </p>

        <div class="status-info">
            <p>Status Pembayaran Anda saat ini:</p>
            {{-- Status 'paid' artinya sudah bayar, menunggu verifikasi admin --}}
            <span class="status-badge status-{{ $donation->status }}">
                {{ ucfirst($donation->status) }}
            </span>
            <p>Kami akan memberitahu Anda setelah verifikasi selesai dan donasi Anda ditambahkan ke progres kampanye.</p>
        </div>

        <div class="next-steps">
            <a href="{{ route('campaign.show', $donation->campaign->id) }}" class="btn-primary">Lihat Progres Kampanye</a>
            <a href="{{ route('home') }}" class="btn-secondary">Kembali ke Beranda</a>
        </div>
    </div>

    <style>
        /* CSS tambahan untuk halaman konfirmasi */
        .confirmation-container {
            background-color: white;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            max-width: 600px;
            margin: 40px auto;
            text-align: center;
        }
        .confirmation-icon {
            font-size: 5em;
            color: #5cb85c; /* Hijau */
            margin-bottom: 20px;
            line-height: 1;
        }
        .confirmation-container h1 {
            color: #333;
            margin-bottom: 15px;
        }
        .confirmation-container .message {
            font-size: 1.1em;
            color: #555;
            line-height: 1.6;
            margin-bottom: 20px;
        }
        .confirmation-container .unique-code-info {
            font-size: 1.2em;
            font-weight: bold;
            color: #d9534f; /* Merah */
            margin-bottom: 30px;
        }
        .status-info {
            background-color: #f0f8ff;
            border: 1px solid #cceeff;
            padding: 15px 20px;
            border-radius: 5px;
            margin-bottom: 30px;
        }
        .status-info p {
            margin: 5px 0;
            color: #444;
        }
        .status-badge {
            display: inline-block;
            padding: 5px 15px;
            border-radius: 20px;
            font-weight: bold;
            color: white;
            margin: 10px 0;
        }
        .status-pending { background-color: #f0ad4e; } /* Oranye */
        .status-paid { background-color: #007bff; }     /* Biru */
        .status-verified { background-color: #5cb85c; } /* Hijau */
        .status-cancelled { background-color: #d9534f; } /* Merah */
        .next-steps {
            margin-top: 30px;
        }
        .btn-primary, .btn-secondary {
            display: inline-block;
            padding: 12px 25px;
            margin: 0 10px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }
        .btn-primary {
            background-color: #007bff;
            color: white;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .btn-secondary {
            background-color: #6c757d;
            color: white;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
        }
    </style>
@endsection