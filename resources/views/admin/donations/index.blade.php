<x-app-layout>
    <x-slot name="header">
        <div class="verification-header">
            <div class="header-content">
                <div class="header-icon-wrapper">
                    <div class="header-icon">
                        <svg fill="currentColor" viewBox="0 0 20 20">
                            <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z"/>
                            <path fill-rule="evenodd" d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                </div>
                <div class="header-text">
                    <h2 class="header-title">{{ __('Verifikasi Pembayaran') }}</h2>
                    <p class="header-subtitle">Kelola dan verifikasi donasi yang masuk dengan sistem yang terintegrasi</p>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="verification-container">
        <div class="verification-content">
            <!-- Header Section -->
            <div class="page-header-section">
                <div class="page-header-content">
                    <div class="page-title-section">
                        <div class="page-title-icon">
                            <svg fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="page-title">Donasi Menunggu Verifikasi</h3>
                            <p class="page-subtitle">Kelola pembayaran donasi yang perlu diverifikasi</p>
                        </div>
                    </div>
                    <a href="{{ route('admin.donations.history') }}" class="history-button">
                        <svg class="button-icon" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                        </svg>
                        Riwayat Donasi
                    </a>
                </div>
            </div>

            <!-- Alert Messages -->
            @if(session('success'))
                <div class="alert alert-success">
                    <div class="alert-icon">
                        <svg fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div class="alert-content">
                        <h4 class="alert-title">Berhasil!</h4>
                        <p class="alert-message">{{ session('success') }}</p>
                    </div>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-error">
                    <div class="alert-icon">
                        <svg fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div class="alert-content">
                        <h4 class="alert-title">Error!</h4>
                        <p class="alert-message">{{ session('error') }}</p>
                    </div>
                </div>
            @endif

            <!-- Statistics Cards -->
            <div class="stats-section">
                <div class="stat-card stat-card--pending">
                    <div class="stat-content">
                        <div class="stat-info">
                            <h4 class="stat-label">Menunggu Verifikasi</h4>
                            <div class="stat-value">{{ $donations->where('status', 'paid')->count() }}</div>
                        </div>
                        <div class="stat-icon">
                            <svg fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                    </div>
                </div>
                
                <div class="stat-card stat-card--verified">
                    <div class="stat-content">
                        <div class="stat-info">
                            <h4 class="stat-label">Sudah Diverifikasi</h4>
                            <div class="stat-value">{{ $donations->where('status', 'verified')->count() }}</div>
                        </div>
                        <div class="stat-icon">
                            <svg fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                    </div>
                </div>
                
                <div class="stat-card stat-card--total">
                    <div class="stat-content">
                        <div class="stat-info">
                            <h4 class="stat-label">Total Donasi</h4>
                            <div class="stat-value">Rp {{ number_format($donations->sum('amount'), 0, ',', '.') }}</div>
                        </div>
                        <div class="stat-icon">
                            <svg fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Table Section -->
            <div class="table-section">
                <div class="table-container">
                    <div class="table-header">
                        <h4 class="table-title">Daftar Donasi</h4>
                        <div class="table-filters">
                            <div class="filter-badge filter-badge--all active">Semua</div>
                            <div class="filter-badge filter-badge--pending">Pending</div>
                            <div class="filter-badge filter-badge--verified">Verified</div>
                        </div>
                    </div>
                    
                    <div class="table-wrapper">
                        <table class="donations-table">
                            <thead>
                                <tr>
                                    <th>
                                        <div class="th-content">
                                            <svg class="th-icon" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"/>
                                            </svg>
                                            ID Donasi
                                        </div>
                                    </th>
                                    <th>
                                        <div class="th-content">
                                            <svg class="th-icon" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                                                <path fill-rule="evenodd" d="M4 5a2 2 0 012-2v1a1 1 0 102 0V3a2 2 0 012 2v6a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 2a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"/>
                                            </svg>
                                            Kampanye
                                        </div>
                                    </th>
                                    <th>
                                        <div class="th-content">
                                            <svg class="th-icon" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                                            </svg>
                                            Donatur
                                        </div>
                                    </th>
                                    <th>
                                        <div class="th-content">
                                            <svg class="th-icon" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                                            </svg>
                                            Jumlah
                                        </div>
                                    </th>
                                    <th>
                                        <div class="th-content">
                                            <svg class="th-icon" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V4a2 2 0 00-2-2H6zm1 2a1 1 0 000 2h6a1 1 0 100-2H7zm6 7a1 1 0 011 1v3a1 1 0 11-2 0v-3a1 1 0 011-1zm-3 3a1 1 0 100 2h.01a1 1 0 100-2H10zm-4 1a1 1 0 011-1h.01a1 1 0 110 2H7a1 1 0 01-1-1z" clip-rule="evenodd"/>
                                            </svg>
                                            Kode Unik
                                        </div>
                                    </th>
                                    <th>
                                        <div class="th-content">
                                            <svg class="th-icon" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z"/>
                                                <path fill-rule="evenodd" d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z" clip-rule="evenodd"/>
                                            </svg>
                                            Metode
                                        </div>
                                    </th>
                                    <th>
                                        <div class="th-content">
                                            <svg class="th-icon" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M3 6a3 3 0 013-3h10a1 1 0 01.8 1.6L14.25 8l2.55 3.4A1 1 0 0116 13H6a1 1 0 00-1 1v3a1 1 0 11-2 0V6z" clip-rule="evenodd"/>
                                            </svg>
                                            Status
                                        </div>
                                    </th>
                                    <th>
                                        <div class="th-content">
                                            <svg class="th-icon" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"/>
                                            </svg>
                                            Aksi
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($donations as $donation)
                                    <tr class="table-row" data-status="{{ $donation->status }}">
                                        <td>
                                            <div class="cell-content">
                                                <div class="donation-id">#{{ $donation->id }}</div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="cell-content">
                                                <div class="campaign-info">
                                                    <div class="campaign-title">{{ Str::limit($donation->campaign->title ?? 'N/A', 30) }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="cell-content">
                                                <div class="donor-info">
                                                    <div class="donor-avatar">
                                                        {{ substr($donation->donor_name, 0, 1) }}
                                                    </div>
                                                    <div class="donor-name">{{ $donation->donor_name }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="cell-content">
                                                <div class="amount">Rp {{ number_format($donation->amount, 0, ',', '.') }}</div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="cell-content">
                                                <div class="unique-code">{{ $donation->unique_code }}</div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="cell-content">
                                                <div class="payment-method">
                                                    <div class="method-badge">
                                                        {{ ucfirst(str_replace('_', ' ', $donation->payment_method)) }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="cell-content">
                                                <div class="status-badge status-{{ $donation->status }}">
                                                    @if($donation->status == 'paid')
                                                        <svg class="status-icon" fill="currentColor" viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                                        </svg>
                                                    @elseif($donation->status == 'verified')
                                                        <svg class="status-icon" fill="currentColor" viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                                        </svg>
                                                    @elseif($donation->status == 'cancelled')
                                                        <svg class="status-icon" fill="currentColor" viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                                        </svg>
                                                    @else
                                                        <svg class="status-icon" fill="currentColor" viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                                        </svg>
                                                    @endif
                                                    {{ ucfirst($donation->status) }}
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="cell-content">
                                                <div class="action-buttons">
                                                    @if($donation->status == 'paid')
                                                        <form action="{{ route('admin.donations.verify', $donation->id) }}" method="POST" onsubmit="return confirm('Anda yakin ingin VERIFIKASI pembayaran ini? Donasi akan ditambahkan ke kampanye.');" class="inline-form">
                                                            @csrf
                                                            <button type="submit" class="action-btn action-btn--verify">
                                                                <svg class="btn-icon" fill="currentColor" viewBox="0 0 20 20">
                                                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                                                </svg>
                                                                Verifikasi
                                                            </button>
                                                        </form>
                                                        <form action="{{ route('admin.donations.cancel', $donation->id) }}" method="POST" onsubmit="return confirm('Anda yakin ingin MEMBATALKAN pembayaran ini?');" class="inline-form">
                                                            @csrf
                                                            <button type="submit" class="action-btn action-btn--cancel">
                                                                <svg class="btn-icon" fill="currentColor" viewBox="0 0 20 20">
                                                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                                                </svg>
                                                                Batalkan
                                                            </button>
                                                        </form>
                                                    @else
                                                        <div class="processed-badge">
                                                            <svg class="processed-icon" fill="currentColor" viewBox="0 0 20 20">
                                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                                            </svg>
                                                            Sudah Diproses
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8">
                                            <div class="empty-state">
                                                <div class="empty-icon">
                                                    <svg fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                                    </svg>
                                                </div>
                                                <h4 class="empty-title">Tidak ada donasi</h4>
                                                <p class="empty-message">Tidak ada donasi yang menunggu verifikasi saat ini.</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    
                    <!-- Pagination -->
                    <div class="pagination-wrapper">
                        {{ $donations->links() }}
                    </div>
                </div>
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
            --blue-500: #3b82f6;
            --blue-600: #2563eb;
            --red-500: #ef4444;
            --red-600: #dc2626;
            --orange-500: #f97316;
            --orange-600: #ea580c;
            --slate-50: #f8fafc;
            --slate-100: #f1f5f9;
            --slate-200: #e2e8f0;
            --slate-300: #cbd5e1;
            --slate-400: #94a3b8;
            --slate-500: #64748b;
            --slate-600: #475569;
            --slate-700: #334155;
            --slate-800: #1e293b;
            --slate-900: #0f172a;
        }

        .verification-container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 2rem 1rem;
        }

        .verification-content {
            display: flex;
            flex-direction: column;
            gap: 2rem;
        }

        /* Header Styles */
        .verification-header {
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

        /* Page Header Section */
        .page-header-section {
            background: white;
            border-radius: 1rem;
            padding: 2rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            border: 1px solid var(--slate-200);
        }

        .page-header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 2rem;
        }

        .page-title-section {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .page-title-icon {
            width: 3rem;
            height: 3rem;
            background: linear-gradient(135deg, var(--emerald-500) 0%, var(--teal-500) 100%);
            border-radius: 0.75rem;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
        }

        .page-title-icon svg {
            width: 1.5rem;
            height: 1.5rem;
        }

        .page-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--slate-800);
            margin: 0 0 0.25rem 0;
        }

        .page-subtitle {
            color: var(--slate-500);
            margin: 0;
        }

        .history-button {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1.5rem;
            background: linear-gradient(135deg, var(--slate-600) 0%, var(--slate-700) 100%);
            color: white;
            text-decoration: none;
            border-radius: 0.5rem;
            font-weight: 600;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .history-button:hover {
            background: linear-gradient(135deg, var(--slate-700) 0%, var(--slate-800) 100%);
            transform: translateY(-1px);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }

        .button-icon {
            width: 1.25rem;
            height: 1.25rem;
        }

        /* Alert Styles */
        .alert {
            display: flex;
            align-items: flex-start;
            gap: 1rem;
            padding: 1rem 1.5rem;
            border-radius: 0.75rem;
            border: 1px solid;
        }

        .alert-success {
            background: var(--emerald-50);
            border-color: var(--emerald-200);
            color: var(--emerald-800);
        }

        .alert-error {
            background: #fef2f2;
            border-color: #fecaca;
            color: #991b1b;
        }

        .alert-icon {
            flex-shrink: 0;
            width: 2rem;
            height: 2rem;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .alert-success .alert-icon {
            background: var(--emerald-100);
            color: var(--emerald-600);
        }

        .alert-error .alert-icon {
            background: #fee2e2;
            color: #dc2626;
        }

        .alert-icon svg {
            width: 1.25rem;
            height: 1.25rem;
        }

        .alert-title {
            font-weight: 600;
            margin: 0 0 0.25rem 0;
        }

        .alert-message {
            margin: 0;
        }

        /* Statistics Section */
        .stats-section {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
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
            align-items: center;
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
            margin: 0;
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

        .stat-card--pending .stat-icon {
            background: linear-gradient(135deg, var(--orange-500) 0%, var(--orange-600) 100%);
        }

        .stat-card--verified .stat-icon {
            background: linear-gradient(135deg, var(--emerald-500) 0%, var(--emerald-600) 100%);
        }

        .stat-card--total .stat-icon {
            background: linear-gradient(135deg, var(--blue-500) 0%, var(--blue-600) 100%);
        }

        /* Table Section */
        .table-section {
            background: white;
            border-radius: 1rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            border: 1px solid var(--slate-200);
            overflow: hidden;
        }

        .table-container {
            padding: 0;
        }

        .table-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1.5rem 2rem;
            border-bottom: 1px solid var(--slate-200);
            background: var(--slate-50);
        }

        .table-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--slate-800);
            margin: 0;
        }

        .table-filters {
            display: flex;
            gap: 0.5rem;
        }

        .filter-badge {
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            font-size: 0.875rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            border: 1px solid var(--slate-200);
            background: white;
            color: var(--slate-600);
        }

        .filter-badge:hover {
            background: var(--emerald-50);
            border-color: var(--emerald-200);
            color: var(--emerald-700);
        }

        .filter-badge.active {
            background: var(--emerald-500);
            border-color: var(--emerald-500);
            color: white;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        .donations-table {
            width: 100%;
            border-collapse: collapse;
        }

        .donations-table th {
            background: var(--slate-50);
            padding: 1rem 1.5rem;
            text-align: left;
            border-bottom: 1px solid var(--slate-200);
        }

        .th-content {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.75rem;
            font-weight: 600;
            color: var(--slate-500);
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .th-icon {
            width: 1rem;
            height: 1rem;
            color: var(--emerald-500);
        }

        .table-row {
            transition: all 0.3s ease;
            border-bottom: 1px solid var(--slate-100);
        }

        .table-row:hover {
            background: var(--slate-50);
        }

        .donations-table td {
            padding: 1rem 1.5rem;
            vertical-align: middle;
        }

        .cell-content {
            display: flex;
            align-items: center;
        }

        .donation-id {
            font-weight: 600;
            color: var(--slate-700);
            font-family: monospace;
        }

        .campaign-title {
            font-weight: 500;
            color: var(--slate-800);
        }

        .donor-info {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .donor-avatar {
            width: 2.5rem;
            height: 2.5rem;
            background: linear-gradient(135deg, var(--emerald-500) 0%, var(--teal-500) 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 0.875rem;
        }

        .donor-name {
            font-weight: 500;
            color: var(--slate-800);
        }

        .amount {
            font-weight: 600;
            color: var(--slate-800);
            font-size: 1rem;
        }

        .unique-code {
            font-family: monospace;
            background: var(--slate-100);
            padding: 0.25rem 0.5rem;
            border-radius: 0.25rem;
            font-size: 0.875rem;
            color: var(--slate-700);
        }

        .method-badge {
            background: var(--blue-100);
            color: var(--blue-800);
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 500;
        }

        .status-badge {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .status-icon {
            width: 1rem;
            height: 1rem;
        }

        .status-paid {
            background: #fef3c7;
            color: #92400e;
        }

        .status-verified {
            background: var(--emerald-100);
            color: var(--emerald-800);
        }

        .status-cancelled {
            background: #fee2e2;
            color: #991b1b;
        }

        .action-buttons {
            display: flex;
            gap: 0.5rem;
        }

        .inline-form {
            display: inline;
        }

        .action-btn {
            display: flex;
            align-items: center;
            gap: 0.25rem;
            padding: 0.5rem 0.75rem;
            border: none;
            border-radius: 0.375rem;
            font-size: 0.75rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-icon {
            width: 1rem;
            height: 1rem;
        }

        .action-btn--verify {
            background: var(--emerald-500);
            color: white;
        }

        .action-btn--verify:hover {
            background: var(--emerald-600);
            transform: translateY(-1px);
        }

        .action-btn--cancel {
            background: var(--red-500);
            color: white;
        }

        .action-btn--cancel:hover {
            background: var(--red-600);
            transform: translateY(-1px);
        }

        .processed-badge {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--slate-500);
            font-size: 0.875rem;
        }

        .processed-icon {
            width: 1rem;
            height: 1rem;
        }

        .empty-state {
            text-align: center;
            padding: 3rem 2rem;
        }

        .empty-icon {
            width: 4rem;
            height: 4rem;
            margin: 0 auto 1rem;
            background: var(--slate-100);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--slate-400);
        }

        .empty-icon svg {
            width: 2rem;
            height: 2rem;
        }

        .empty-title {
            font-size: 1.125rem;
            font-weight: 600;
            color: var(--slate-700);
            margin: 0 0 0.5rem 0;
        }

        .empty-message {
            color: var(--slate-500);
            margin: 0;
        }

        .pagination-wrapper {
            padding: 1.5rem 2rem;
            border-top: 1px solid var(--slate-200);
            background: var(--slate-50);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .verification-container {
                padding: 1rem 0.5rem;
            }

            .page-header-content {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }

            .stats-section {
                grid-template-columns: 1fr;
            }

            .table-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }

            .table-filters {
                width: 100%;
                justify-content: flex-start;
            }

            .donations-table {
                font-size: 0.875rem;
            }

            .donations-table th,
            .donations-table td {
                padding: 0.75rem 1rem;
            }

            .action-buttons {
                flex-direction: column;
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

        .verification-content > * {
            animation: fadeInUp 0.6s ease-out;
        }

        .verification-content > *:nth-child(2) {
            animation-delay: 0.1s;
        }

        .verification-content > *:nth-child(3) {
            animation-delay: 0.2s;
        }

        .verification-content > *:nth-child(4) {
            animation-delay: 0.3s;
        }
    </style>
</x-app-layout>

