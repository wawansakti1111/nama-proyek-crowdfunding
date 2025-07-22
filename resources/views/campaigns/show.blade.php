@extends('layouts.app')

@section('title', $campaign->title)

@section('content')
    <div class="campaign-detail">
        <h1 class="campaign-detail-title">{{ $campaign->title }}</h1>

        <div class="campaign-detail-image">
            @if($campaign->image)
                <img src="{{ asset('storage/' . $campaign->image) }}" alt="{{ $campaign->title }}">
            @else
                <img src="https://via.placeholder.com/800x400?text=No+Image" alt="No Image">
            @endif
        </div>

        <div class="campaign-detail-info">
            <p class="description">{{ $campaign->description }}</p>

            <div class="progress-section">
                <div class="progress-bar-container">
                    <div class="progress-bar" style="width: {{ $campaign->progress_percentage }}%;">
                        {{ $campaign->progress_percentage }}%
                    </div>
                </div>
                <div class="amounts">
                    <span>Terkumpul: **Rp{{ number_format($campaign->collected_amount, 0, ',', '.') }}**</span>
                    <span>Target: **Rp{{ number_format($campaign->target_amount, 0, ',', '.') }}**</span>
                </div>
            </div>

            <div class="donate-button-container">
                {{-- Tombol Donasi Sekarang akan mengarah ke halaman donasi --}}
                {{-- Kita akan membuat route 'donations.create' di langkah berikutnya --}}
                <a href="{{ route('donations.create', $campaign->id) }}" class="btn-donate">Donasi Sekarang</a>
            </div>
        </div>

        {{-- Anda bisa menambahkan bagian lain di sini, seperti: --}}
        {{-- <h2>Update Kampanye</h2>
        <div class="campaign-updates">
            <p>Belum ada update.</p>
        </div> --}}
        {{-- Atau informasi penggalang dana, dll. --}}

    </div>

    <style>
        /* CSS tambahan untuk halaman detail kampanye */
        .campaign-detail {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .campaign-detail-title {
            font-size: 2em;
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }
        .campaign-detail-image img {
            width: 100%;
            max-height: 400px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 25px;
        }
        .campaign-detail-info .description {
            line-height: 1.6;
            color: #666;
            margin-bottom: 30px;
        }
        .progress-section {
            margin-bottom: 25px;
        }
        .progress-section .amounts {
            display: flex;
            justify-content: space-between;
            font-size: 1.1em;
            font-weight: bold;
            margin-top: 10px;
            color: #333;
        }
        .btn-donate {
            display: block;
            width: fit-content;
            margin: 0 auto; /* Tengah */
            padding: 15px 30px;
            background-color: #28a745; /* Warna hijau */
            color: white;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            font-size: 1.2em;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }
        .btn-donate:hover {
            background-color: #218838;
        }
    </style>
@endsection