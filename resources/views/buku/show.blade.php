@extends('layouts.app')

@section('content')

<style>
    .back-link {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        color: var(--brown-mid);
        font-size: 0.82rem;
        font-weight: 500;
        text-decoration: none;
        letter-spacing: 0.04em;
        margin-bottom: 1.5rem;
        transition: color 0.2s;
    }
    .back-link:hover { color: var(--amber); }

    .detail-card {
        background: var(--warm-white);
        border: 1px solid var(--border);
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 24px rgba(61,43,31,0.09);
    }

    .detail-header {
        background: var(--brown-deep);
        padding: 2rem 2.5rem;
        display: flex;
        align-items: center;
        gap: 1.5rem;
    }

    .book-cover-large {
        width: 120px;
        height: 170px;
        background: var(--paper);
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        border: 3px solid var(--amber);
    }

    .book-cover-large svg {
        width: 48px;
        height: 48px;
        color: var(--brown-mid);
        opacity: 0.5;
    }

    .detail-header-content {
        flex: 1;
    }

    .detail-title {
        font-family: 'Playfair Display', serif;
        font-size: 1.75rem;
        font-weight: 700;
        color: #fff;
        line-height: 1.2;
        margin-bottom: 0.5rem;
    }

    .detail-meta {
        display: flex;
        gap: 1.5rem;
        flex-wrap: wrap;
    }

    .meta-item {
        display: flex;
        align-items: center;
        gap: 6px;
        color: rgba(255,255,255,0.8);
        font-size: 0.85rem;
    }

    .meta-item svg {
        width: 14px;
        height: 14px;
    }

    .detail-body {
        padding: 2rem 2.5rem;
    }

    .info-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1.5rem;
    }

    .info-card {
        background: var(--paper);
        padding: 1.25rem;
        border-radius: 10px;
        border: 1px solid var(--border);
    }

    .info-label {
        font-size: 0.7rem;
        font-weight: 700;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        color: var(--brown-mid);
        margin-bottom: 0.5rem;
    }

    .info-value {
        font-size: 1rem;
        font-weight: 600;
        color: var(--brown-deep);
    }

    .info-value.highlight {
        color: var(--amber);
    }

    .description-section {
        margin-top: 1.5rem;
        padding-top: 1.5rem;
        border-top: 1px solid var(--border);
    }

    .section-title {
        font-size: 0.7rem;
        font-weight: 700;
        letter-spacing: 0.14em;
        text-transform: uppercase;
        color: var(--brown-mid);
        margin-bottom: 1rem;
    }

    .description-text {
        font-size: 0.95rem;
        color: var(--ink);
        line-height: 1.7;
    }

    .detail-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 2rem;
        padding-top: 1.5rem;
        border-top: 1px solid var(--border);
    }

    .action-left {
        display: flex;
        gap: 12px;
    }

    .btn {
        padding: 0.7rem 1.5rem;
        font-size: 0.85rem;
        font-weight: 600;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.2s;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .btn-back {
        background: var(--paper);
        color: var(--brown-mid);
        border: 1px solid var(--border);
    }

    .btn-back:hover {
        background: var(--border);
    }

    .btn-edit {
        background: var(--amber);
        color: var(--brown-deep);
        border: 2px solid var(--amber);
    }

    .btn-edit:hover {
        background: var(--amber-light);
        border-color: var(--amber-light);
    }

    .btn-delete {
        background: #FEE2E2;
        color: #DC3545;
        border: 1px solid #DC3545;
    }

    .btn-delete:hover {
        background: #DC3545;
        color: #fff;
    }

    .status-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 0.4rem 1rem;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 600;
    }

    .status-badge.available {
        background: #D4EDDA;
        color: #155724;
    }

    .status-badge.low {
        background: #FFF3CD;
        color: #856404;
    }

    .status-badge.empty {
        background: #F8D7DA;
        color: #721C24;
    }
</style>

<div class="container mx-auto px-4 py-6">
    <a href="{{ route('buku.index') }}" class="back-link">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="19" y1="12" x2="5" y2="12"></line>
            <polyline points="12 19 5 12 12 5"></polyline>
        </svg>
        Kembali ke Daftar Buku
    </a>

    <div class="detail-card">
        <div class="detail-header">
            <div class="book-cover-large">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                    <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                </svg>
            </div>
            <div class="detail-header-content">
                <h1 class="detail-title">{{ $buku->judul }}</h1>
                <div class="detail-meta">
                    <span class="meta-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                            <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                        </svg>
                        {{ $buku->kode_buku }}
                    </span>
                    <span class="meta-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path>
                            <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
                        </svg>
                        {{ $buku->penulis }}
                    </span>
                    <span class="meta-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                            <line x1="16" y1="2" x2="16" y2="6"></line>
                            <line x1="8" y1="2" x2="8" y2="6"></line>
                            <line x1="3" y1="10" x2="21" y2="10"></line>
                        </svg>
                        {{ $buku->tahun_terbit }}
                    </span>
                    <span class="meta-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path>
                        </svg>
                        {{ $buku->rak ?? '-' }}
                    </span>
                </div>
            </div>
        </div>

        <div class="detail-body">
            <div class="info-grid">
                <div class="info-card">
                    <div class="info-label">Penerbit</div>
                    <div class="info-value">{{ $buku->penerbit }}</div>
                </div>
                <div class="info-card">
                    <div class="info-label">ISBN</div>
                    <div class="info-value">{{ $buku->isbn ?? '-' }}</div>
                </div>
                <div class="info-card">
                    <div class="info-label">Jumlah Halaman</div>
                    <div class="info-value">{{ $buku->jumlah_halaman }} halaman</div>
                </div>
                <div class="info-card">
                    <div class="info-label">Kategori</div>
                    <div class="info-value highlight">{{ $buku->kategori }}</div>
                </div>
                <div class="info-card">
                    <div class="info-label">Stok Tersedia</div>
                    <div class="info-value">
                        @if($buku->stok > 5)
                            <span class="status-badge available">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="20 6 9 17 4 12"></polyline>
                                </svg>
                                {{ $buku->stok }} buku
                            </span>
                        @elseif($buku->stok > 0)
                            <span class="status-badge low">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path>
                                    <line x1="12" y1="9" x2="12" y2="13"></line>
                                    <line x1="12" y1="17" x2="12.01" y2="17"></line>
                                </svg>
                                {{ $buku->stok }} buku
                            </span>
                        @else
                            <span class="status-badge empty">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="4.93" y1="4.93" x2="19.07" y2="19.07"></line>
                                </svg>
                                Stok Habis
                            </span>
                        @endif
                    </div>
                </div>
                <div class="info-card">
                    <div class="info-label">Lokasi Rak</div>
                    <div class="info-value">{{ $buku->rak ?? '-' }}</div>
                </div>
            </div>

            @if($buku->deskripsi)
            <div class="description-section">
                <h3 class="section-title">Deskripsi Buku</h3>
                <p class="description-text">{{ $buku->deskripsi }}</p>
            </div>
            @endif

            <div class="detail-actions">
                <div class="action-left">
                    <a href="{{ route('buku.index') }}" class="btn btn-back">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="19" y1="12" x2="5" y2="12"></line>
                            <polyline points="12 19 5 12 12 5"></polyline>
                        </svg>
                        Kembali
                    </a>
                    <a href="{{ route('buku.edit', $buku->id) }}" class="btn btn-edit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                        </svg>
                        Edit Buku
                    </a>
                </div>
                <form action="{{ route('buku.destroy', $buku->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-delete" onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?')">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="3 6 5 6 21 6"></polyline>
                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                        </svg>
                        Hapus Buku
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection