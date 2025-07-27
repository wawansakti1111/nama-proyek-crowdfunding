<x-app-layout>
    <x-slot name="header">
        <div class="dashboard-header-modern">
            <div class="header-content">
                <div class="header-icon-wrapper">
                    <div class="header-icon">
                        <svg fill="currentColor" viewBox="0 0 20 20">
                            <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"/>
                        </svg>
                    </div>
                </div>
                <div class="header-text">
                    <h2 class="header-title">Dashboard Admin</h2>
                    <p class="header-subtitle">Kelola sistem donasi dengan mudah dan efisien</p>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="dashboard-container">
        <!-- Welcome Section -->
        <div class="welcome-card">
            <div class="welcome-content">
                <div class="welcome-text">
                    <div class="welcome-icon">
                        <svg fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="welcome-title">Selamat Datang, Admin!</h3>
                        <p class="welcome-description">Di sini Anda bisa mengelola kampanye dan verifikasi pembayaran dengan sistem yang terintegrasi.</p>
                    </div>
                </div>
                <div class="welcome-illustration">
                    <svg fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Stats Overview -->
        <div class="stats-grid">
            <div class="stat-card stat-card--emerald">
                <div class="stat-content">
                    <div class="stat-info">
                        <h4 class="stat-label">Total Kampanye</h4>
                        <div class="stat-value">{{ $totalCampaigns ?? '24' }}</div>
                        <div class="stat-trend">
                            <svg class="trend-icon trend-up" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M3.293 9.707a1 1 0 010-1.414l6-6a1 1 0 011.414 0l6 6a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L4.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                            </svg>
                            <span>+12% dari bulan lalu</span>
                        </div>
                    </div>
                    <div class="stat-icon stat-icon--emerald">
                        <svg fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                            <path fill-rule="evenodd" d="M4 5a2 2 0 012-2v1a1 1 0 102 0V3a2 2 0 012 2v6a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 2a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                </div>
            </div>
            
            <div class="stat-card stat-card--teal">
                <div class="stat-content">
                    <div class="stat-info">
                        <h4 class="stat-label">Donasi Pending</h4>
                        <div class="stat-value">{{ $pendingDonations ?? '8' }}</div>
                        <div class="stat-trend">
                            <svg class="trend-icon trend-down" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 10.293a1 1 0 010 1.414l-6 6a1 1 0 01-1.414 0l-6-6a1 1 0 111.414-1.414L9 14.586V3a1 1 0 012 0v11.586l4.293-4.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                            <span>-5% dari minggu lalu</span>
                        </div>
                    </div>
                    <div class="stat-icon stat-icon--teal">
                        <svg fill="currentColor" viewBox="0 0 20 20">
                            <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z"/>
                            <path fill-rule="evenodd" d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                </div>
            </div>
            
            <div class="stat-card stat-card--green">
                <div class="stat-content">
                    <div class="stat-info">
                        <h4 class="stat-label">Total Donasi</h4>
                        <div class="stat-value">Rp {{ number_format($totalDonations ?? 125500000, 0, ',', '.') }}</div>
                        <div class="stat-trend">
                            <svg class="trend-icon trend-up" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M3.293 9.707a1 1 0 010-1.414l6-6a1 1 0 011.414 0l6 6a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L4.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                            </svg>
                            <span>+28% dari bulan lalu</span>
                        </div>
                    </div>
                    <div class="stat-icon stat-icon--green">
                        <svg fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Action Cards -->
        <div class="action-grid">
            {{-- Card untuk Verifikasi Pembayaran --}}
            <div class="action-card">
                <div class="action-header action-header--emerald">
                    <div class="action-header-content">
                        <div class="action-header-icon">
                            <svg fill="currentColor" viewBox="0 0 20 20">
                                <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z"/>
                                <path fill-rule="evenodd" d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div class="action-badge action-badge--emerald">Prioritas Tinggi</div>
                    </div>
                </div>
                <div class="action-body">
                    <h4 class="action-title">Verifikasi Pembayaran</h4>
                    <p class="action-description">Lihat dan verifikasi donasi yang masuk untuk memastikan transparansi dan akuntabilitas sistem.</p>
                    <div class="action-features">
                        <div class="action-feature">
                            <svg class="feature-icon" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                            <span>Verifikasi otomatis</span>
                        </div>
                        <div class="action-feature">
                            <svg class="feature-icon" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                            <span>Laporan real-time</span>
                        </div>
                    </div>
                    <a href="{{ route('admin.donations.index') }}" class="action-button action-button--emerald">
                        <svg class="button-icon" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
                        </svg>
                        Kelola Pembayaran
                    </a>
                </div>
            </div>

            {{-- Card untuk Manajemen Kampanye --}}
            <div class="action-card">
                <div class="action-header action-header--teal">
                    <div class="action-header-content">
                        <div class="action-header-icon">
                            <svg fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                                <path fill-rule="evenodd" d="M4 5a2 2 0 012-2v1a1 1 0 102 0V3a2 2 0 012 2v6a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 2a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div class="action-badge action-badge--teal">Manajemen</div>
                    </div>
                </div>
                <div class="action-body">
                    <h4 class="action-title">Manajemen Kampanye</h4>
                    <p class="action-description">Buat, edit, setujui, dan tolak kampanye donasi dengan sistem workflow yang terintegrasi.</p>
                    <div class="action-features">
                        <div class="action-feature">
                            <svg class="feature-icon" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                            <span>Workflow approval</span>
                        </div>
                        <div class="action-feature">
                            <svg class="feature-icon" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                            <span>Analytics dashboard</span>
                        </div>
                    </div>
                    <a href="{{ route('admin.campaigns.index') }}" class="action-button action-button--teal">
                        <svg class="button-icon" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
                        </svg>
                        Kelola Kampanye
                    </a>
                </div>
            </div>

            {{-- Card untuk Ajukan Kampanye Baru --}}
            <div class="action-card">
                <div class="action-header action-header--green">
                    <div class="action-header-content">
                        <div class="action-header-icon">
                            <svg fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div class="action-badge action-badge--green">Buat Baru</div>
                    </div>
                </div>
                <div class="action-body">
                    <h4 class="action-title">Ajukan Kampanye Baru</h4>
                    <p class="action-description">Buat kampanye donasi baru dengan wizard yang mudah digunakan untuk persetujuan admin.</p>
                    <div class="action-features">
                        <div class="action-feature">
                            <svg class="feature-icon" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                            <span>Form wizard</span>
                        </div>
                        <div class="action-feature">
                            <svg class="feature-icon" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                            <span>Upload media</span>
                        </div>
                    </div>
                    <a href="{{ route('admin.campaigns.create') }}" class="action-button action-button--green">
                        <svg class="button-icon" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"/>
                        </svg>
                        Ajukan Kampanye
                    </a>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="quick-actions-section">
            <div class="quick-actions-header">
                <h3 class="quick-actions-title">
                    <svg class="title-icon" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z" clip-rule="evenodd"/>
                    </svg>
                    Aksi Cepat
                </h3>
                <p class="quick-actions-subtitle">Akses fitur yang sering digunakan</p>
            </div>
            <div class="quick-actions-grid">
                <button class="quick-action-button" onclick="alert('Fitur Laporan')">
                    <div class="quick-action-icon">
                        <svg fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                            <path fill-rule="evenodd" d="M4 5a2 2 0 012-2v1a1 1 0 102 0V3a2 2 0 012 2v6a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm8 0a2 2 0 012-2v1a1 1 0 102 0V3a2 2 0 012 2v6a2 2 0 01-2 2h-2a2 2 0 01-2-2V5z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <span class="quick-action-label">Laporan</span>
                </button>
                <button class="quick-action-button" onclick="alert('Fitur Pengguna')">
                    <div class="quick-action-icon">
                        <svg fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <span class="quick-action-label">Pengguna</span>
                </button>
                <button class="quick-action-button" onclick="alert('Fitur Pengaturan')">
                    <div class="quick-action-icon">
                        <svg fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <span class="quick-action-label">Pengaturan</span>
                </button>
                <button class="quick-action-button" onclick="alert('Fitur Notifikasi')">
                    <div class="quick-action-icon">
                        <svg fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 3a1 1 0 00-1.447-.894L8.763 6H5a3 3 0 000 6h.28l1.771 5.316A1 1 0 008 18h1a1 1 0 001-1v-4.382l6.553 3.276A1 1 0 0018 15V3z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <span class="quick-action-label">Notifikasi</span>
                </button>
            </div>
        </div>
    </div>

    <!-- Modern CSS Styles -->
    <style>
        :root {
            --emerald-50: #ecfdf5;
            --emerald-100: #d1fae5;
            --emerald-400: #34d399;
            --emerald-500: #10b981;
            --emerald-600: #059669;
            --emerald-700: #047857;
            --teal-500: #14b8a6;
            --teal-600: #0d9488;
            --green-500: #22c55e;
            --green-600: #16a34a;
            --slate-50: #f8fafc;
            --slate-100: #f1f5f9;
            --slate-200: #e2e8f0;
            --slate-500: #64748b;
            --slate-700: #334155;
            --slate-800: #1e293b;
            --slate-900: #0f172a;
        }

        .dashboard-container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0;
            display: flex;
            flex-direction: column;
            gap: 2rem;
        }

        /* Header Styles */
        .dashboard-header-modern {
            background: linear-gradient(135deg, var(--emerald-500) 0%, var(--teal-500) 100%);
            border-radius: 1rem;
            padding: 2rem;
            color: white;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }

        .header-content {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .header-icon-wrapper {
            flex-shrink: 0;
        }

        .header-icon {
            width: 4rem;
            height: 4rem;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .header-icon svg {
            width: 2rem;
            height: 2rem;
        }

        .header-title {
            font-size: 2rem;
            font-weight: 700;
            margin: 0;
            line-height: 1.2;
        }

        .header-subtitle {
            font-size: 1.125rem;
            margin: 0.5rem 0 0 0;
            opacity: 0.9;
        }

        /* Welcome Card */
        .welcome-card {
            background: white;
            border-radius: 1rem;
            padding: 2rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            border: 1px solid var(--slate-200);
        }

        .welcome-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 2rem;
        }

        .welcome-text {
            display: flex;
            align-items: center;
            gap: 1rem;
            flex: 1;
        }

        .welcome-icon {
            width: 3rem;
            height: 3rem;
            background: linear-gradient(135deg, var(--emerald-500) 0%, var(--teal-500) 100%);
            border-radius: 0.75rem;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            flex-shrink: 0;
        }

        .welcome-icon svg {
            width: 1.5rem;
            height: 1.5rem;
        }

        .welcome-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--slate-800);
            margin: 0 0 0.5rem 0;
        }

        .welcome-description {
            color: var(--slate-500);
            margin: 0;
            line-height: 1.6;
        }

        .welcome-illustration {
            width: 4rem;
            height: 4rem;
            background: linear-gradient(135deg, var(--emerald-100) 0%, var(--teal-100) 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--emerald-600);
            flex-shrink: 0;
        }

        .welcome-illustration svg {
            width: 2rem;
            height: 2rem;
        }

        /* Stats Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
        }

        .stat-card {
            background: white;
            border-radius: 1rem;
            padding: 1.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            border: 1px solid var(--slate-200);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }

        .stat-content {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }

        .stat-info {
            flex: 1;
        }

        .stat-label {
            font-size: 0.875rem;
            font-weight: 500;
            color: var(--slate-500);
            margin: 0 0 0.5rem 0;
        }

        .stat-value {
            font-size: 2rem;
            font-weight: 700;
            color: var(--slate-800);
            margin: 0 0 0.5rem 0;
        }

        .stat-trend {
            display: flex;
            align-items: center;
            gap: 0.25rem;
            font-size: 0.875rem;
            font-weight: 500;
        }

        .trend-icon {
            width: 1rem;
            height: 1rem;
        }

        .trend-up {
            color: var(--green-500);
        }

        .trend-down {
            color: #ef4444;
        }

        .stat-icon {
            width: 3rem;
            height: 3rem;
            border-radius: 0.75rem;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
        }

        .stat-icon svg {
            width: 1.5rem;
            height: 1.5rem;
        }

        .stat-icon--emerald {
            background: linear-gradient(135deg, var(--emerald-500) 0%, var(--emerald-600) 100%);
        }

        .stat-icon--teal {
            background: linear-gradient(135deg, var(--teal-500) 0%, var(--teal-600) 100%);
        }

        .stat-icon--green {
            background: linear-gradient(135deg, var(--green-500) 0%, var(--green-600) 100%);
        }

        /* Action Grid */
        .action-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 1.5rem;
        }

        .action-card {
            background: white;
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            border: 1px solid var(--slate-200);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .action-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .action-header {
            padding: 1.5rem;
            color: white;
        }

        .action-header--emerald {
            background: linear-gradient(135deg, var(--emerald-500) 0%, var(--emerald-600) 100%);
        }

        .action-header--teal {
            background: linear-gradient(135deg, var(--teal-500) 0%, var(--teal-600) 100%);
        }

        .action-header--green {
            background: linear-gradient(135deg, var(--green-500) 0%, var(--green-600) 100%);
        }

        .action-header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .action-header-icon {
            width: 2.5rem;
            height: 2.5rem;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 0.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .action-header-icon svg {
            width: 1.25rem;
            height: 1.25rem;
        }

        .action-badge {
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 600;
            background: rgba(255, 255, 255, 0.2);
        }

        .action-body {
            padding: 1.5rem;
        }

        .action-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--slate-800);
            margin: 0 0 0.75rem 0;
        }

        .action-description {
            color: var(--slate-500);
            line-height: 1.6;
            margin: 0 0 1.5rem 0;
        }

        .action-features {
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
            margin-bottom: 1.5rem;
        }

        .action-feature {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--slate-700);
            font-size: 0.875rem;
        }

        .feature-icon {
            width: 1rem;
            height: 1rem;
            color: var(--emerald-500);
        }

        .action-button {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            width: 100%;
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            font-weight: 600;
            text-decoration: none;
            color: white;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .action-button--emerald {
            background: linear-gradient(135deg, var(--emerald-500) 0%, var(--emerald-600) 100%);
        }

        .action-button--emerald:hover {
            background: linear-gradient(135deg, var(--emerald-600) 0%, var(--emerald-700) 100%);
            transform: translateY(-1px);
        }

        .action-button--teal {
            background: linear-gradient(135deg, var(--teal-500) 0%, var(--teal-600) 100%);
        }

        .action-button--teal:hover {
            background: linear-gradient(135deg, var(--teal-600) 0%, #0f766e 100%);
            transform: translateY(-1px);
        }

        .action-button--green {
            background: linear-gradient(135deg, var(--green-500) 0%, var(--green-600) 100%);
        }

        .action-button--green:hover {
            background: linear-gradient(135deg, var(--green-600) 0%, #15803d 100%);
            transform: translateY(-1px);
        }

        .button-icon {
            width: 1.25rem;
            height: 1.25rem;
        }

        /* Quick Actions */
        .quick-actions-section {
            background: white;
            border-radius: 1rem;
            padding: 2rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            border: 1px solid var(--slate-200);
        }

        .quick-actions-header {
            margin-bottom: 1.5rem;
        }

        .quick-actions-title {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--slate-800);
            margin: 0 0 0.5rem 0;
        }

        .title-icon {
            width: 1.5rem;
            height: 1.5rem;
            color: var(--emerald-500);
        }

        .quick-actions-subtitle {
            color: var(--slate-500);
            margin: 0;
        }

        .quick-actions-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
            gap: 1rem;
        }

        .quick-action-button {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0.75rem;
            padding: 1.5rem 1rem;
            background: var(--slate-50);
            border: 1px solid var(--slate-200);
            border-radius: 0.75rem;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .quick-action-button:hover {
            background: var(--emerald-50);
            border-color: var(--emerald-200);
            transform: translateY(-2px);
        }

        .quick-action-icon {
            width: 3rem;
            height: 3rem;
            background: linear-gradient(135deg, var(--emerald-500) 0%, var(--teal-500) 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
        }

        .quick-action-icon svg {
            width: 1.5rem;
            height: 1.5rem;
        }

        .quick-action-label {
            font-size: 0.875rem;
            font-weight: 500;
            color: var(--slate-700);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .dashboard-container {
                gap: 1.5rem;
            }

            .header-content {
                flex-direction: column;
                text-align: center;
                gap: 1rem;
            }

            .welcome-content {
                flex-direction: column;
                text-align: center;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .action-grid {
                grid-template-columns: 1fr;
            }

            .quick-actions-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        /* Animation */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .dashboard-container > * {
            animation: fadeInUp 0.6s ease-out;
        }

        .dashboard-container > *:nth-child(2) {
            animation-delay: 0.1s;
        }

        .dashboard-container > *:nth-child(3) {
            animation-delay: 0.2s;
        }

        .dashboard-container > *:nth-child(4) {
            animation-delay: 0.3s;
        }

        .dashboard-container > *:nth-child(5) {
            animation-delay: 0.4s;
        }
    </style>
</x-app-layout>

