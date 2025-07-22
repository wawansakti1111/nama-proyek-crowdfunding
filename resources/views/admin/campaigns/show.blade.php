<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Kampanye') }}: {{ $campaign->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-4">
                        <strong>Judul:</strong> {{ $campaign->title }}
                    </div>
                    <div class="mb-4">
                        <strong>Deskripsi:</strong> <br>{{ $campaign->description }}
                    </div>
                    <div class="mb-4">
                        <strong>Gambar:</strong>
                        @if($campaign->image)
                            <img src="{{ asset('storage/' . $campaign->image) }}" alt="{{ $campaign->title }}" class="mt-2 w-64 h-auto rounded-lg">
                        @else
                            <p class="text-gray-500">Tidak ada gambar.</p>
                        @endif
                    </div>
                    <div class="mb-4">
                        <strong>Target Donasi:</strong> Rp{{ number_format($campaign->target_amount, 0, ',', '.') }}
                    </div>
                    <div class="mb-4">
                        <strong>Terkumpul:</strong> Rp{{ number_format($campaign->collected_amount, 0, ',', '.') }}
                    </div>
                    <div class="mb-4">
                        <strong>Progres:</strong> {{ round($campaign->progress_percentage) }}%
                        <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                            <div class="bg-blue-600 h-2.5 rounded-full" style="width: {{ $campaign->progress_percentage }}%"></div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <strong>Status:</strong>
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                            @if($campaign->status == 'approved') bg-green-100 text-green-800
                            @elseif($campaign->status == 'pending') bg-yellow-100 text-yellow-800
                            @elseif($campaign->status == 'rejected') bg-red-100 text-red-800
                            @else bg-gray-100 text-gray-800
                            @endif">
                            {{ ucfirst($campaign->status) }}
                        </span>
                    </div>
                    <div class="mb-4">
                        <strong>Dibuat Oleh:</strong> {{ $campaign->user->name ?? 'N/A' }}
                    </div>
                    <div class="mb-4">
                        <strong>Tanggal Dibuat:</strong> {{ $campaign->created_at->format('d M Y H:i') }}
                    </div>
                    <div class="mb-4">
                        <strong>Terakhir Diupdate:</strong> {{ $campaign->updated_at->format('d M Y H:i') }}
                    </div>

                    <div class="mt-6 flex space-x-2">
                        <a href="{{ route('admin.campaigns.edit', $campaign->id) }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-500 focus:bg-indigo-500 active:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            Edit Kampanye
                        </a>
                        <a href="{{ route('admin.campaigns.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-500 focus:bg-gray-500 active:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-