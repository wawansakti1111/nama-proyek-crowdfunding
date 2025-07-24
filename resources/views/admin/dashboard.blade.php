<x-app-layout>
    <x-slot name="header">
        <div class="dashboard-header">
            <div class="dashboard-container">
                <div class="dashboard-header__inner">
                    <div class="dashboard-header__content">
                        <h2 class="dashboard-header__title">
                            <svg class="dashboard-header__icon" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"/>
                            </svg>
                            {{ __('Dashboard Admin') }}
                        </h2>
                        <p class="dashboard-header__subtitle">Kelola sistem donasi dengan mudah dan efisien</p>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

    <main class="dashboard-main">
        <div class="dashboard-container">
            <!-- Welcome Section -->
            <div class="welcome-section">
                <div class="welcome-section__content">
                    <div class="welcome-section__text">
                        <h3>
                            <svg class="icon" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"/>
                            </svg>
                            Selamat Datang, Admin!
                        </h3>
                        <p>Di sini Anda bisa mengelola kampanye dan verifikasi pembayaran dengan sistem yang terintegrasi.</p>
                    </div>
                    <div class="welcome-section__avatar">
                        <svg fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Stats Overview -->
            <div class="grid grid--stats">
                <div class="card card--stats card--green">
                    <div class="card__stats-content">
                        <div class="card__stats-info">
                            <h4>Total Kampanye</h4>
                            <div class="value">{{ $totalCampaigns ?? '24' }}</div>
                        </div>
                        <div class="card__stats-icon">
                            <svg fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                                <path fill-rule="evenodd" d="M4 5a2 2 0 012-2v1a1 1 0 102 0V3a2 2 0 012 2v6a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 2a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                    </div>
                </div>
                
                <div class="card card--stats card--emerald">
                    <div class="card__stats-content">
                        <div class="card__stats-info">
                            <h4>Donasi Pending</h4>
                            <div class="value">{{ $pendingDonations ?? '8' }}</div>
                        </div>
                        <div class="card__stats-icon">
                            <svg fill="currentColor" viewBox="0 0 20 20">
                                <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z"/>
                                <path fill-rule="evenodd" d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                    </div>
                </div>
                
                <div class="card card--stats card--teal">
                    <div class="card__stats-content">
                        <div class="card__stats-info">
                            <h4>Total Donasi</h4>
                            <div class="value">Rp {{ number_format($totalDonations ?? 125500000, 0, ',', '.') }}</div>
                        </div>
                        <div class="card__stats-icon">
                            <svg fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Action Cards -->
            <div class="grid grid--actions">
                {{-- Card untuk Verifikasi Pembayaran --}}
                <div class="card card--action">
                    <div class="card__header card__header--green">
                        <div class="card__header-content">
                            <div class="card__header-icon">
                                <svg fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z"/>
                                    <path fill-rule="evenodd" d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div class="card__badge">Prioritas Tinggi</div>
                        </div>
                    </div>
                    <div class="card__body">
                        <h4 class="card__title card__title--green">Verifikasi Pembayaran</h4>
                        <p class="card__description card__description--green">Lihat dan verifikasi donasi yang masuk untuk memastikan transparansi dan akuntabilitas sistem.</p>
                        <div class="card__features">
                            <div class="card__feature card__feature--green">
                                <svg fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                                Verifikasi otomatis
                            </div>
                            <div class="card__feature card__feature--green">
                                <svg fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                                Laporan real-time
                            </div>
                        </div>
                        <a href="{{ route('admin.donations.index') }}" class="btn btn--green btn--full">
                            <svg class="btn__icon" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
                            </svg>
                            Kelola Pembayaran
                        </a>
                    </div>
                </div>

                {{-- Card untuk Manajemen Kampanye --}}
                <div class="card card--action">
                    <div class="card__header card__header--emerald">
                        <div class="card__header-content">
                            <div class="card__header-icon">
                                <svg fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                                    <path fill-rule="evenodd" d="M4 5a2 2 0 012-2v1a1 1 0 102 0V3a2 2 0 012 2v6a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 2a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div class="card__badge">Manajemen</div>
                        </div>
                    </div>
                    <div class="card__body">
                        <h4 class="card__title card__title--emerald">Manajemen Kampanye</h4>
                        <p class="card__description card__description--emerald">Buat, edit, setujui, dan tolak kampanye donasi dengan sistem workflow yang terintegrasi.</p>
                        <div class="card__features">
                            <div class="card__feature card__feature--emerald">
                                <svg fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                                Workflow approval
                            </div>
                            <div class="card__feature card__feature--emerald">
                                <svg fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                                Analytics dashboard
                            </div>
                        </div>
                        <a href="{{ route('admin.campaigns.index') }}" class="btn btn--emerald btn--full">
                            <svg class="btn__icon" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
                            </svg>
                            Kelola Kampanye
                        </a>
                    </div>
                </div>

                {{-- Card untuk Ajukan Kampanye Baru --}}
                <div class="card card--action">
                    <div class="card__header card__header--teal">
                        <div class="card__header-content">
                            <div class="card__header-icon">
                                <svg fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div class="card__badge">Buat Baru</div>
                        </div>
                    </div>
                    <div class="card__body">
                        <h4 class="card__title card__title--teal">Ajukan Kampanye Baru</h4>
                        <p class="card__description card__description--teal">Buat kampanye donasi baru dengan wizard yang mudah digunakan untuk persetujuan admin.</p>
                        <div class="card__features">
                            <div class="card__feature card__feature--teal">
                                <svg fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                                Form wizard
                            </div>
                            <div class="card__feature card__feature--teal">
                                <svg fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                                Upload media
                            </div>
                        </div>
                        <a href="{{ route('admin.campaigns.create') }}" class="btn btn--teal btn--full">
                            <svg class="btn__icon" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"/>
                            </svg>
                            Ajukan Kampanye
                        </a>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="quick-actions">
                <div class="quick-actions__header">
                    <h3 class="quick-actions__title">
                        <svg fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z" clip-rule="evenodd"/>
                        </svg>
                        Aksi Cepat
                    </h3>
                    <p class="quick-actions__subtitle">Akses fitur yang sering digunakan</p>
                </div>
                <div class="quick-actions__body">
                    <div class="grid grid--quick">
                        <button class="quick-action-btn" onclick="alert('Fitur Laporan')">
                            <svg fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                                <path fill-rule="evenodd" d="M4 5a2 2 0 012-2v1a1 1 0 102 0V3a2 2 0 012 2v6a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm8 0a2 2 0 012-2v1a1 1 0 102 0V3a2 2 0 012 2v6a2 2 0 01-2 2h-2a2 2 0 01-2-2V5z" clip-rule="evenodd"/>
                            </svg>
                            <span>Laporan</span>
                        </button>
                        <button class="quick-action-btn" onclick="alert('Fitur Pengguna')">
                            <svg fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"/>
                            </svg>
                            <span>Pengguna</span>
                        </button>
                        <button class="quick-action-btn" onclick="alert('Fitur Pengaturan')">
                            <svg fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"/>
                            </svg>
                            <span>Pengaturan</span>
                        </button>
                        <button class="quick-action-btn" onclick="alert('Fitur Notifikasi')">
                            <svg fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 3a1 1 0 00-1.447-.894L8.763 6H5a3 3 0 000 6h.28l1.771 5.316A1 1 0 008 18h1a1 1 0 001-1v-4.382l6.553 3.276A1 1 0 0018 15V3z" clip-rule="evenodd"/>
                            </svg>
                            <span>Notifikasi</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Include CSS -->
    <style>
        {!! file_get_contents(public_path('css/dashboard-styles.css')) !!}
    </style>
</x-app-layout>

