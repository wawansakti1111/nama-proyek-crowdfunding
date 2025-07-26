@extends('layouts.app')

@section('title', $campaign->title)

@section('content')
<style>
    /* Anda dapat memindahkan CSS ini ke file terpisah */
    .campaign-container { max-width: 800px; margin: 2rem auto; padding: 2rem; background-color: #fff; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); }
    .campaign-image { width: 100%; height: 400px; object-fit: cover; border-radius: 8px; margin-bottom: 1.5rem; }
    .campaign-title { font-size: 2rem; font-weight: bold; margin-bottom: 1rem; color: #111827; }
    .progress-bar-container { background-color: #e5e7eb; border-radius: 9999px; height: 1.5rem; overflow: hidden; margin-bottom: 1rem; }
    .progress-bar { background-color: #22c55e; height: 100%; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold; }
    .fund-details { display: flex; justify-content: space-between; margin-bottom: 1.5rem; font-size: 1.1rem; }
    .campaign-description { color: #374151; line-height: 1.6; }
    .donate-button-container { margin-top: 2rem; text-align: center; }
    .btn-donate { display: inline-block; padding: 1rem 3rem; background-color: #4f46e5; color: white; font-size: 1.2rem; font-weight: bold; border-radius: 8px; text-decoration: none; transition: background-color 0.2s; }
    .btn-donate:hover { background-color: #4338ca; }
    .campaign-ended { text-align: center; padding: 1rem; background-color: #f3f4f6; border-radius: 8px; margin-top: 2rem; font-weight: bold; color: #6b7280; }
</style>

<div class="campaign-container">
    <img src="{{ asset('storage/' . $campaign->image) }}" alt="{{ $campaign->title }}" class="campaign-image">

    <h1 class="campaign-title">{{ $campaign->title }}</h1>

    @php
        $progress = ($campaign->collected_amount / $campaign->target_amount) * 100;
    @endphp

    <div class="progress-bar-container">
        <div class="progress-bar" style="width: {{ $progress > 100 ? 100 : $progress }}%;">
            {{ number_format($progress, 1) }}%
        </div>
    </div>

    <div class="fund-details">
        <div>
            <strong>Terkumpul:</strong>
            <span style="color: #16a34a;">Rp {{ number_format($campaign->collected_amount, 0, ',', '.') }}</span>
        </div>
        <div>
            <strong>Target:</strong>
            <span>Rp {{ number_format($campaign->target_amount, 0, ',', '.') }}</span>
        </div>
    </div>

    <div class="campaign-description">
        {!! nl2br(e($campaign->description)) !!}
    </div>

    <div class="donate-button-container">
        {{-- PERBAIKAN UTAMA: Tombol ini hanya muncul jika status kampanye 'approved' --}}
        @if($campaign->status == 'approved')
            <a href="{{ route('donations.create', $campaign->id) }}" class="btn-donate">Donasi Sekarang</a>
        @else
            <div class="campaign-ended">
                Kampanye ini sedang tidak aktif.
            </div>
        @endif
    </div>
</div>
@endsection