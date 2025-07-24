<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Admin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Selamat Datang, Admin!</h3>
                    <p class="text-gray-700 mb-6">Di sini Anda bisa mengelola kampanye dan verifikasi pembayaran.</p>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        {{-- Grid untuk Verifikasi Pembayaran --}}
                        <div class="bg-gray-100 p-4 rounded-lg shadow-sm">
                            <h4 class="font-semibold text-gray-800 mb-2">Verifikasi Pembayaran</h4>
                            <p class="text-gray-600 mb-4">Lihat dan verifikasi donasi yang masuk.</p>
                            <a href="{{ route('admin.donations.index') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-500 focus:bg-indigo-500 active:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Kelola Pembayaran
                            </a>
                        </div>
                        {{-- Grid untuk Manajemen Kampanye --}}
                        <div class="bg-gray-100 p-4 rounded-lg shadow-sm">
                            <h4 class="font-semibold text-gray-800 mb-2">Manajemen Kampanye</h4>
                            <p class="text-gray-600 mb-4">Buat, edit, setujui, dan tolak kampanye.</p>
                            <a href="{{ route('admin.campaigns.index') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-500 focus:bg-indigo-500 active:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Kelola Kampanye
                            </a>
                        </div>
                        {{-- Grid untuk Ajukan Kampanye Baru --}}
                        <div class="bg-gray-100 p-4 rounded-lg shadow-sm">
                            <h4 class="font-semibold text-gray-800 mb-2">Ajukan Kampanye Baru</h4>
                            <p class="text-gray-600 mb-4">Buat kampanye donasi baru untuk persetujuan.</p>
                            <a href="{{ route('admin.campaigns.create') }}" class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-500 focus:bg-green-500 active:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Ajukan Kampanye
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>