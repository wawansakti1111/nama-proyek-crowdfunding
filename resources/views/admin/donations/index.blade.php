<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Verifikasi Pembayaran') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-medium text-gray-900">Donasi Menunggu Verifikasi</h3>
                        <a href="{{ route('admin.donations.history') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-500 focus:bg-gray-500 active:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            Riwayat Donasi
                        </a>
                    </div>

                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if(session('error'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID Donasi</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kampanye</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Donatur</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jumlah</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kode Unik</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Metode</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($donations as $donation)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $donation->id }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ Str::limit($donation->campaign->title ?? 'N/A', 30) }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $donation->donor_name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Rp{{ number_format($donation->amount, 0, ',', '.') }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $donation->unique_code }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ ucfirst(str_replace('_', ' ', $donation->payment_method)) }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                                @if($donation->status == 'paid') bg-blue-100 text-blue-800
                                                @elseif($donation->status == 'verified') bg-green-100 text-green-800
                                                @elseif($donation->status == 'cancelled') bg-red-100 text-red-800
                                                @else bg-gray-100 text-gray-800
                                                @endif">
                                                {{ ucfirst($donation->status) }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <div class="flex items-center space-x-2">
                                                @if($donation->status == 'paid')
                                                    <form action="{{ route('admin.donations.verify', $donation->id) }}" method="POST" onsubmit="return confirm('Anda yakin ingin VERIFIKASI pembayaran ini? Donasi akan ditambahkan ke kampanye.');">
                                                        @csrf
                                                        <button type="submit" class="text-green-600 hover:text-green-900">Verifikasi</button>
                                                    </form>
                                                    <form action="{{ route('admin.donations.cancel', $donation->id) }}" method="POST" onsubmit="return confirm('Anda yakin ingin MEMBATALKAN pembayaran ini?');">
                                                        @csrf
                                                        <button type="submit" class="text-red-600 hover:text-red-900">Batalkan</button>
                                                    </form>
                                                @else
                                                    <span class="text-gray-500">Sudah Diproses</span>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="px-6 py-4 text-center text-sm text-gray-500">Tidak ada donasi yang menunggu verifikasi.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="mt-4">
                            {{ $donations->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>