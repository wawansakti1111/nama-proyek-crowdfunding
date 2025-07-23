<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Kampanye') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-2xl font-bold mb-4">{{ $campaign->title }}</h3>
                    <p class="text-gray-700 mb-4">{{ $campaign->description }}</p>

                    <div class="mb-4">
                        <img src="{{ asset('storage/' . $campaign->image) }}" alt="{{ $campaign->title }}" class="w-full h-64 object-cover rounded-lg shadow-md">
                    </div>

                    <div class="mb-4">
                        <h4 class="font-semibold text-gray-800">Target Donasi:</h4>
                        <p class="text-lg text-green-600">Rp {{ number_format($campaign->goal_amount, 0, ',', '.') }}</p>
                    </div>

                    <div class="mb-4">
                        <h4 class="font-semibold text-gray-800">Donasi Terkumpul:</h4>
                        <p class="text-lg text-blue-600">Rp {{ number_format($campaign->raised_amount, 0, ',', '.') }}</p>
                        <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                            <div class="bg-blue-600 h-2.5 rounded-full" style="width: {{ ($campaign->raised_amount / $campaign->goal_amount) * 100 }}%"></div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <strong>Status:</strong>
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                            @if ($campaign->status === 'approved') bg-green-100 text-green-800
                            @elseif ($campaign->status === 'pending') bg-yellow-100 text-yellow-800
                            @elseif ($campaign->status === 'rejected') bg-red-100 text-red-800
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
                        {{-- PERBAIKAN DI SINI: Tag <a> yang sebelumnya terpotong --}}
                        <a href="{{ route('admin.campaigns.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-500 focus:bg-gray-500 active:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            Kembali ke Daftar Kampanye
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>