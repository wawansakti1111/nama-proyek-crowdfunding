@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
    <h1>Kampanye Sedang Berlangsung</h1>

    @if($campaigns->isEmpty())
        <p>Belum ada kampanye yang disetujui. Silakan cek kembali nanti!</p>
    @else
        <div class="campaign-grid">
            @foreach($campaigns as $campaign)
                <div class="campaign-item">
                    <a href="{{ route('campaign.show', $campaign->id) }}">
                        @if($campaign->image)
                            <img src="{{ asset('storage/' . $campaign->image) }}" alt="{{ $campaign->title }}">
                        @else
                            {{-- Gambar placeholder jika tidak ada gambar --}}
                            <img src="https://via.placeholder.com/300x200?text=No+Image" alt="No Image">
                        @endif
                        <div class="campaign-content">
                            <h3 class="campaign-title">{{ $campaign->title }}</h3>
                            <p>{{ Str::limit($campaign->description, 100) }}</p>
                            <div class="progress-bar-container">
                                <div class="progress-bar" style="width: {{ $campaign->progress_percentage }}%;">
                                    {{ $campaign->progress_percentage }}%
                                </div>
                            </div>
                            <div class="campaign-footer">
                                <span>Terkumpul: Rp{{ number_format($campaign->collected_amount, 0, ',', '.') }}</span>
                                <span>Target: Rp{{ number_format($campaign->target_amount, 0, ',', '.') }}</span>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    @endif
@endsection