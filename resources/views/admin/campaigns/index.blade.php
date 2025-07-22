<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manajemen Kampanye') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-medium text-gray-900">Daftar Kampanye</h3>
                        <a href="{{ route('admin.campaigns.create') }}" class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-500 focus:bg-green-500 active:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            Tambah Kampanye Baru
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
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Judul</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Target</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Terkumpul</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Progres</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($campaigns as $campaign)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $campaign->id }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ Str::limit($campaign->title, 50) }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Rp{{ number_format($campaign->target_amount, 0, ',', '.') }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Rp{{ number_format($campaign->collected_amount, 0, ',', '.') }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            <div class="w-24 bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                                                <div class="bg-blue-600 h-2.5 rounded-full" style="width: {{ $campaign->progress_percentage }}%"></div>
                                            </div>
                                            <span class="text-xs text-gray-500">{{ round($campaign->progress_percentage) }}%</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                                @if($campaign->status == 'approved') bg-green-100 text-green-800
                                                @elseif($campaign->status == 'pending') bg-yellow-100 text-yellow-800
                                                @elseif($campaign->status == 'rejected') bg-red-100 text-red-800
                                                @else bg-gray-100 text-gray-800
                                                @endif">
                                                {{ ucfirst($campaign->status) }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <div class="flex items-center space-x-2">
                                                <a href="{{ route('admin.campaigns.show', $campaign->id) }}" class="text-blue-600 hover:text-blue-900">Lihat</a>
                                                <a href="{{ route('admin.campaigns.edit', $campaign->id) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>

                                                @if($campaign->status == 'pending')
                                                    <form action="{{ route('admin.campaigns.approve', $campaign->id) }}" method="POST" onsubmit="return confirm('Anda yakin ingin MENYETUJUI kampanye ini?');">
                                                        @csrf
                                                        <button type="submit" class="text-green-600 hover:text-green-900">Setujui</button>
                                                    </form>
                                                    <form action="{{ route('admin.campaigns.reject', $campaign->id) }}" method="POST" onsubmit="return confirm('Anda yakin ingin MENOLAK kampanye ini?');">
                                                        @csrf
                                                        <button type="submit" class="text-orange-600 hover:text-orange-900">Tolak</button>
                                                    </form>
                                                @endif

                                                <form action="{{ route('admin.campaigns.destroy', $campaign->id) }}" method="POST" onsubmit="return confirm('Anda yakin ingin MENGHAPUS kampanye ini?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:text-red-900">Hapus</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="px-6 py-4 text-center text-sm text-gray-500">Belum ada kampanye yang tersedia.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="mt-4">
                            {{ $campaigns->links() }} {{-- Untuk paginasi --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>