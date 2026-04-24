@extends('layouts.app')

@section('content')

<style>
    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
        margin-bottom: 1.75rem;
        padding-bottom: 1.25rem;
        border-bottom: 2px solid var(--border);
    }

    .page-title {
        font-family: 'Playfair Display', serif;
        font-size: 2rem;
        font-weight: 700;
        color: var(--brown-deep);
        line-height: 1.1;
    }

    .page-subtitle {
        font-size: 0.85rem;
        color: var(--brown-mid);
        margin-top: 4px;
        font-weight: 400;
    }

    .book-count-badge {
        background: var(--amber);
        color: var(--brown-deep);
        font-size: 0.75rem;
        font-weight: 700;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        padding: 0.35rem 0.85rem;
        border-radius: 20px;
    }

    /* Table card */
    .table-card {
        background: var(--warm-white);
        border: 1px solid var(--border);
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 2px 20px rgba(61,43,31,0.07), 0 1px 4px rgba(61,43,31,0.04);
    }

    .table-card table {
        width: 100%;
        border-collapse: collapse;
    }

    .table-card thead {
        background: var(--paper);
        border-bottom: 2px solid var(--border);
    }

    .table-card thead th {
        font-family: 'DM Sans', sans-serif;
        font-size: 0.7rem;
        font-weight: 600;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        color: var(--brown-mid);
        padding: 0.9rem 1.25rem;
        text-align: left;
    }

    .table-card tbody tr {
        border-bottom: 1px solid var(--border);
        transition: background 0.15s;
    }

    .table-card tbody tr:last-child { border-bottom: none; }

    .table-card tbody tr:hover { background: #F9F5EE; }

    .table-card tbody td {
        padding: 1rem 1.25rem;
        font-size: 0.9rem;
        color: var(--ink);
    }

    .book-cover-thumb {
        width: 40px;
        height: 55px;
        object-fit: cover;
        border-radius: 4px;
        background: var(--paper);
    }

    .book-title-cell {
        font-weight: 600;
        color: var(--brown-deep);
    }

    .category-badge {
        display: inline-block;
        padding: 0.25rem 0.75rem;
        background: var(--sage);
        color: #fff;
        font-size: 0.7rem;
        font-weight: 600;
        border-radius: 20px;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }

    .stok-badge {
        display: inline-flex;
        align-items: center;
        gap: 4px;
        padding: 0.25rem 0.6rem;
        border-radius: 6px;
        font-size: 0.75rem;
        font-weight: 600;
    }

    .stok-badge.available {
        background: #D4EDDA;
        color: #155724;
    }

    .stok-badge.low {
        background: #FFF3CD;
        color: #856404;
    }

    .stok-badge.empty {
        background: #F8D7DA;
        color: #721C24;
    }

    .action-buttons {
        display: flex;
        gap: 8px;
    }

    .btn-action {
        width: 32px;
        height: 32px;
        border-radius: 6px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.85rem;
        text-decoration: none;
        transition: all 0.2s;
        border: none;
        cursor: pointer;
    }

    .btn-view {
        background: var(--paper);
        color: var(--brown-mid);
    }

    .btn-view:hover { background: var(--amber); color: var(--brown-deep); }

    .btn-edit {
        background: #E8F4FD;
        color: #0D6EFD;
    }

    .btn-edit:hover { background: #0D6EFD; color: #fff; }

    .btn-delete {
        background: #FEE2E2;
        color: #DC3545;
    }

    .btn-delete:hover { background: #DC3545; color: #fff; }

    /* Pagination */
    .pagination-wrapper {
        padding: 1.25rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: var(--paper);
        border-top: 1px solid var(--border);
    }

    .pagination-info {
        font-size: 0.85rem;
        color: var(--brown-mid);
    }

    .pagination {
        display: flex;
        gap: 4px;
    }

    .pagination a, .pagination span {
        padding: 0.5rem 0.85rem;
        font-size: 0.85rem;
        border-radius: 6px;
        text-decoration: none;
        color: var(--brown-mid);
        transition: all 0.2s;
    }

    .pagination a:hover {
        background: var(--amber);
        color: var(--brown-deep);
    }

    .pagination .active {
        background: var(--brown-deep);
        color: #fff;
    }

    /* Alert */
    .alert {
        padding: 1rem 1.25rem;
        border-radius: 8px;
        margin-bottom: 1.5rem;
        font-size: 0.9rem;
    }

    .alert-success {
        background: #D4EDDA;
        color: #155724;
        border: 1px solid #C3E6CB;
    }

    .alert-error {
        background: #F8D7DA;
        color: #721C24;
        border: 1px solid #F5C6CB;
    }
</style>

<div class="container mx-auto px-4 py-6">
    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Manajemen Buku</h1>
            <p class="page-subtitle">Kelola koleksi buku perpustakaan</p>
        </div>
        <div style="display: flex; align-items: center; gap: 1rem;">
            <span class="book-count-badge">{{ $buku->total() }} Buku</span>
            <a href="{{ route('buku.create') }}" class="btn-add">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="12" y1="5" x2="12" y2="19"></line>
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                </svg>
                Tambah Buku
            </a>
        </div>
    </div>

    <!-- Alert Messages -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-error">
            {{ session('error') }}
        </div>
    @endif

    <!-- Table Card -->
    <div class="table-card">
        <table>
            <thead>
                <tr>
                    <th style="width: 60px;">No</th>
                    <th style="width: 80px;">Kode</th>
                    <th>Judul Buku</th>
                    <th style="width: 150px;">Penulis</th>
                    <th style="width: 100px;">Penerbit</th>
                    <th style="width: 90px;">Tahun</th>
                    <th style="width: 100px;">Kategori</th>
                    <th style="width: 80px;">Stok</th>
                    <th style="width: 120px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($buku as $index => $item)
                <tr>
                    <td>{{ $loop->iteration + ($buku->currentPage() - 1) * $buku->perPage() }}</td>
                    <td>
                        <span style="font-weight: 600; color: var(--amber); font-size: 0.8rem;">
                            {{ $item->kode_buku }}
                        </span>
                    </td>
                    <td>
                        <span class="book-title-cell">{{ $item->judul }}</span>
                    </td>
                    <td>{{ $item->penulis }}</td>
                    <td>{{ $item->penerbit }}</td>
                    <td>{{ $item->tahun_terbit }}</td>
                    <td>
                        <span class="category-badge">{{ $item->kategori }}</span>
                    </td>
                    <td>
                        @if($item->stok > 5)
                            <span class="stok-badge available">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="20 6 9 17 4 12"></polyline>
                                </svg>
                                {{ $item->stok }}
                            </span>
                        @elseif($item->stok > 0)
                            <span class="stok-badge low">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path>
                                    <line x1="12" y1="9" x2="12" y2="13"></line>
                                    <line x1="12" y1="17" x2="12.01" y2="17"></line>
                                </svg>
                                {{ $item->stok }}
                            </span>
                        @else
                            <span class="stok-badge empty">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="4.93" y1="4.93" x2="19.07" y2="19.07"></line>
                                </svg>
                                0
                            </span>
                        @endif
                    </td>
                    <td>
                        <div class="action-buttons">
                            <a href="{{ route('buku.show', $item->id) }}" class="btn-action btn-view" title="Lihat Detail">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                </svg>
                            </a>
                            <a href="{{ route('buku.edit', $item->id) }}" class="btn-action btn-edit" title="Edit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                </svg>
                            </a>
                            <form action="{{ route('buku.destroy', $item->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-action btn-delete" title="Hapus" onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?')">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <polyline points="3 6 5 6 21 6"></polyline>
                                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="9" style="text-align: center; padding: 3rem; color: var(--brown-mid);">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" style="margin-bottom: 1rem; opacity: 0.5;">
                            <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                            <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                        </svg>
                        <p>Belum ada data buku</p>
                        <a href="{{ route('buku.create') }}" style="color: var(--amber); text-decoration: none; font-weight: 600; margin-top: 0.5rem; display: inline-block;">Tambah Buku Pertama</a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    @if($buku->hasPages())
    <div class="pagination-wrapper">
        <div class="pagination-info">
            Menampilkan {{ $buku->firstItem() }} - {{ $buku->lastItem() }} dari {{ $buku->total() }} buku
        </div>
        <div class="pagination">
            {{ $buku->links() }}
        </div>
    </div>
    @endif
</div>

@endsection