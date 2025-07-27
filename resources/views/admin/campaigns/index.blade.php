<x-app-layout>
    <x-slot name="header">
        <h2 class="header-title">
            {{ __('Manajemen Kampanye') }}
        </h2>
    </x-slot>

    <div class="main-container">
        <div class="content-wrapper">
            <div class="card">
                <div class="card-body">

                    <div class="section-header">
                        <h3 class="section-title">Daftar Kampanye</h3>
                        <p class="section-subtitle">Pantau progres dan status kampanye</p>
                    </div>

                    {{-- Tombol Ajukan Kampanye Baru (opsional) --}}
                    {{-- <div class="mb-4">
                        <a href="{{ route('admin.campaigns.create') }}" class="btn btn-primary">
                            + Ajukan Kampanye Baru
                        </a>
                    </div> --}}

                    <div class="table-container">
                        <table class="campaigns-table">
                            <thead>
                                <tr>
                                    <th>Judul Kampanye</th>
                                    <th>Target Dana</th>
                                    <th>Terkumpul</th>
                                    <th>Status</th>
                                    <th class="text-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($campaigns as $campaign)
                                    <tr class="table-row">
                                        <td class="campaign-title">
                                            <div class="campaign-info">
                                                <div class="campaign-name">{{ $campaign->title }}</div>
                                                <div class="campaign-id">ID: #{{ $campaign->id }}</div>
                                            </div>
                                        </td>
                                        <td class="target-amount">
                                            <span class="amount-badge">Rp {{ number_format($campaign->target_amount, 0, ',', '.') }}</span>
                                        </td>
                                        <td class="collected-amount">
                                            <div class="collected-info">
                                                <span class="collected-badge">Rp {{ number_format($campaign->collected_amount, 0, ',', '.') }}</span>
                                                <div class="progress-bar">
                                                    <div class="progress-fill" style="width: {{ $campaign->target_amount > 0 ? min(($campaign->collected_amount / $campaign->target_amount) * 100, 100) : 0 }}%"></div>
                                                </div>
                                                <div class="progress-text">{{ $campaign->target_amount > 0 ? number_format(min(($campaign->collected_amount / $campaign->target_amount) * 100, 100), 1) : 0 }}% tercapai</div>
                                            </div>
                                        </td>
                                        <td class="status-cell">
                                            <span class="status-badge status-{{ $campaign->status }}">
                                                {{ ucfirst($campaign->status) }}
                                            </span>
                                        </td>
                                        <td class="actions-cell">
                                            <div class="action-buttons">
                                                <a href="{{ route('admin.campaigns.show', $campaign->id) }}" class="btn btn-view">Lihat</a>
                                                <a href="{{ route('admin.campaigns.edit', $campaign->id) }}" class="btn btn-edit">Edit</a>
                                                @if($campaign->status == 'pending')
                                                    <form action="{{ route('admin.campaigns.approve', $campaign->id) }}" method="POST" class="inline-form">
                                                        @csrf
                                                        <button type="submit" class="btn btn-approve">Setujui</button>
                                                    </form>
                                                    <form action="{{ route('admin.campaigns.reject', $campaign->id) }}" method="POST" class="inline-form">
                                                        @csrf
                                                        <button type="submit" class="btn btn-reject">Tolak</button>
                                                    </form>
                                                @endif
                                                <form action="{{ route('admin.campaigns.destroy', $campaign->id) }}" method="POST" class="inline-form" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kampanye ini?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-delete">Hapus</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="empty-state">
                                            <div class="empty-message">
                                                <div class="empty-icon">📊</div>
                                                <h4>Belum ada kampanye</h4>
                                                <p>Tidak ada kampanye yang tersedia saat ini.</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="pagination-wrapper">
                        <div class="pagination-info">
                            📊 Menampilkan data kampanye
                        </div>
                        <div class="pagination-container">
                            {{ $campaigns->links() }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    {{-- CSS MENYATU DALAM FILE PHP --}}
    <style>
        /* ===== RESET & BASE STYLES ===== */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            line-height: 1.6;
        }

        /* ===== HEADER STYLES ===== */
        .header-title {
            font-size: 1.75rem;
            font-weight: 700;
            color: #ffffff;
            background: linear-gradient(135deg, #10b981, #059669);
            padding: 1.5rem 2rem;
            border-radius: 12px;
            margin: 1rem;
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
            position: relative;
            overflow: hidden;
            text-align: center;
        }

        .header-title::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, rgba(255,255,255,0.1) 0%, transparent 50%);
            pointer-events: none;
        }

        /* ===== MAIN CONTAINER ===== */
        .main-container {
            padding: 2rem 0;
            background: linear-gradient(135deg, #f0fdf4, #ecfdf5, #d1fae5);
            min-height: calc(100vh - 100px);
        }

        .content-wrapper {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1.5rem;
        }

        /* ===== CARD STYLES ===== */
        .card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 16px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(16, 185, 129, 0.1);
            overflow: hidden;
            animation: fadeInUp 0.6s ease-out;
        }

        .card-body {
            padding: 2rem;
        }

        /* ===== SECTION HEADER ===== */
        .section-header {
            margin-bottom: 2rem;
            text-align: center;
        }

        .section-title {
            font-size: 2rem;
            font-weight: 700;
            color: #065f46;
            margin-bottom: 0.5rem;
            position: relative;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background: linear-gradient(90deg, #10b981, #059669);
            border-radius: 2px;
        }

        .section-subtitle {
            color: #6b7280;
            font-size: 1rem;
            margin-top: 1rem;
        }

        /* ===== TABLE CONTAINER ===== */
        .table-container {
            background: #ffffff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.05);
            border: 1px solid #e5e7eb;
            overflow-x: auto;
        }

        /* ===== TABLE STYLES ===== */
        .campaigns-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.9rem;
            min-width: 800px;
        }

        .campaigns-table thead {
            background: linear-gradient(135deg, #10b981, #059669);
        }

        .campaigns-table th {
            padding: 1rem 1.5rem;
            text-align: left;
            font-weight: 600;
            color: #ffffff;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.05em;
            border-bottom: 2px solid #047857;
            white-space: nowrap;
        }

        .campaigns-table th.text-right {
            text-align: right;
        }

        .campaigns-table tbody tr {
            border-bottom: 1px solid #f3f4f6;
            transition: all 0.3s ease;
        }

        .campaigns-table tbody tr:hover {
            background-color: #f0fdf4;
            transform: translateY(-1px);
            box-shadow: 0 2px 8px rgba(16, 185, 129, 0.1);
        }

        .campaigns-table td {
            padding: 1.25rem 1.5rem;
            vertical-align: middle;
        }

        /* ===== CAMPAIGN INFO ===== */
        .campaign-info {
            display: flex;
            flex-direction: column;
            gap: 0.25rem;
        }

        .campaign-name {
            font-weight: 600;
            color: #111827;
            font-size: 0.95rem;
        }

        .campaign-id {
            font-size: 0.75rem;
            color: #6b7280;
        }

        /* ===== AMOUNT BADGES ===== */
        .amount-badge, .collected-badge {
            display: inline-block;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.85rem;
            white-space: nowrap;
        }

        .amount-badge {
            background: #dcfce7;
            color: #166534;
            border: 1px solid #bbf7d0;
        }

        .collected-badge {
            background: #d1fae5;
            color: #065f46;
            border: 1px solid #a7f3d0;
        }

        /* ===== PROGRESS BAR ===== */
        .collected-info {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
            min-width: 150px;
        }

        .progress-bar {
            width: 100%;
            height: 6px;
            background-color: #e5e7eb;
            border-radius: 3px;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            background: linear-gradient(90deg, #10b981, #059669);
            border-radius: 3px;
            transition: width 0.5s ease;
            box-shadow: 0 0 4px rgba(16, 185, 129, 0.3);
        }

        .progress-text {
            font-size: 0.75rem;
            color: #6b7280;
            text-align: center;
        }

        /* ===== STATUS BADGES ===== */
        .status-badge {
            display: inline-flex;
            align-items: center;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: capitalize;
            white-space: nowrap;
        }

        .status-approved {
            background: #dcfce7;
            color: #166534;
            border: 1px solid #bbf7d0;
        }

        .status-pending {
            background: #fef3c7;
            color: #92400e;
            border: 1px solid #fde68a;
        }

        .status-rejected {
            background: #fee2e2;
            color: #991b1b;
            border: 1px solid #fecaca;
        }

        /* ===== ACTION BUTTONS ===== */
        .actions-cell {
            text-align: right;
            min-width: 200px;
        }

        .action-buttons {
            display: flex;
            gap: 0.5rem;
            justify-content: flex-end;
            flex-wrap: wrap;
        }

        .btn {
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-size: 0.75rem;
            font-weight: 600;
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.25rem;
            white-space: nowrap;
        }

        .btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .btn-view {
            background: #dbeafe;
            color: #1e40af;
            border: 1px solid #bfdbfe;
        }

        .btn-view:hover {
            background: #bfdbfe;
        }

        .btn-edit {
            background: #d1fae5;
            color: #065f46;
            border: 1px solid #a7f3d0;
        }

        .btn-edit:hover {
            background: #a7f3d0;
        }

        .btn-approve {
            background: #dcfce7;
            color: #166534;
            border: 1px solid #bbf7d0;
        }

        .btn-approve:hover {
            background: #bbf7d0;
        }

        .btn-reject, .btn-delete {
            background: #fee2e2;
            color: #991b1b;
            border: 1px solid #fecaca;
        }

        .btn-reject:hover, .btn-delete:hover {
            background: #fecaca;
        }

        .inline-form {
            display: inline;
        }

        /* ===== EMPTY STATE ===== */
        .empty-state {
            text-align: center;
            padding: 3rem 2rem;
        }

        .empty-message {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 1rem;
        }

        .empty-icon {
            font-size: 3rem;
            opacity: 0.5;
        }

        .empty-message h4 {
            font-size: 1.25rem;
            font-weight: 600;
            color: #374151;
        }

        .empty-message p {
            color: #6b7280;
        }

        /* ===== PAGINATION ===== */
        .pagination-wrapper {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 2rem;
            padding-top: 1.5rem;
            border-top: 1px solid #e5e7eb;
        }

        .pagination-info {
            color: #6b7280;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .pagination-container {
            background: #ffffff;
            border-radius: 8px;
            padding: 0.5rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            border: 1px solid #e5e7eb;
        }

        /* ===== ANIMATIONS ===== */
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

        /* ===== HOVER EFFECTS ===== */
        .table-row:hover .campaign-name {
            color: #059669;
        }

        .table-row:hover .progress-fill {
            box-shadow: 0 0 8px rgba(16, 185, 129, 0.4);
        }

        /* ===== CUSTOM SCROLLBAR ===== */
        .table-container::-webkit-scrollbar {
            height: 6px;
        }

        .table-container::-webkit-scrollbar-track {
            background: #f1f5f9;
            border-radius: 3px;
        }

        .table-container::-webkit-scrollbar-thumb {
            background: linear-gradient(90deg, #10b981, #059669);
            border-radius: 3px;
        }

        .table-container::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(90deg, #059669, #047857);
        }

        /* ===== RESPONSIVE DESIGN ===== */
        @media (max-width: 768px) {
            .main-container {
                padding: 1rem 0;
            }

            .content-wrapper {
                padding: 0 1rem;
            }

            .card-body {
                padding: 1rem;
            }

            .header-title {
                font-size: 1.5rem;
                margin: 0.5rem;
                padding: 1rem 1.5rem;
            }

            .section-title {
                font-size: 1.5rem;
            }

            .campaigns-table {
                font-size: 0.8rem;
            }

            .campaigns-table th,
            .campaigns-table td {
                padding: 0.75rem 0.5rem;
            }

            .action-buttons {
                flex-direction: column;
                align-items: flex-end;
                gap: 0.25rem;
            }

            .pagination-wrapper {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }

            .collected-info {
                min-width: 120px;
            }

            .actions-cell {
                min-width: 150px;
            }
        }

        @media (max-width: 480px) {
            .header-title {
                font-size: 1.25rem;
                padding: 0.75rem 1rem;
            }

            .section-title {
                font-size: 1.25rem;
            }

            .campaigns-table {
                font-size: 0.75rem;
            }

            .btn {
                font-size: 0.7rem;
                padding: 0.4rem 0.8rem;
            }
        }
    </style>
</x-app-layout>

