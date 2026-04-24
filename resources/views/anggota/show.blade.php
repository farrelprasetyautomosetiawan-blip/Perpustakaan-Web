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
        max-width: 680px;
    }

    .detail-header {
        background: var(--brown-deep);
        padding: 2rem 2.5rem;
        display: flex;
        align-items: center;
        gap: 1.25rem;
        position: relative;
        overflow: hidden;
    }

    /* Decorative book spines in header */
    .detail-header::after {
        content: '';
        position: absolute;
        right: 0; top: 0; bottom: 0;
        width: 80px;
        background: repeating-linear-gradient(
            90deg,
            rgba(200,134,42,0.15) 0px, rgba(200,134,42,0.15) 12px,
            rgba(200,134,42,0.05) 12px, rgba(200,134,42,0.05) 16px,
            rgba(200,134,42,0.25) 16px, rgba(200,134,42,0.25) 20px,
            rgba(200,134,42,0.08) 20px, rgba(200,134,42,0.08) 28px
        );
    }

    .avatar-circle {
        width: 64px;
        height: 64px;
        background: var(--amber);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: 'Playfair Display', serif;
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--brown-deep);
        flex-shrink: 0;
        border: 3px solid rgba(255,255,255,0.2);
    }

    .detail-header-info {}

    .detail-name {
        font-family: 'Playfair Display', serif;
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--cream);
        line-height: 1.2;
    }

    .detail-nim {
        font-size: 0.8rem;
        color: var(--amber-light);
        margin-top: 4px;
        letter-spacing: 0.08em;
        font-weight: 500;
    }

    .detail-body {
        padding: 2rem 2.5rem;
    }

    .detail-grid {
        display: grid;
        gap: 0;
    }

    .detail-row {
        display: grid;
        grid-template-columns: 180px 1fr;
        padding: 1rem 0;
        border-bottom: 1px solid var(--border);
        align-items: start;
    }

    .detail-row:last-child { border-bottom: none; }

    .detail-label {
        font-size: 0.75rem;
        font-weight: 600;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        color: var(--brown-mid);
        display: flex;
        align-items: center;
        gap: 6px;
        padding-top: 2px;
    }

    .detail-label svg { opacity: 0.6; }

    .detail-value {
        font-size: 0.95rem;
        color: var(--ink);
        font-weight: 400;
    }

    .detail-actions {
        display: flex;
        gap: 10px;
        margin-top: 2rem;
        padding-top: 1.5rem;
        border-top: 2px solid var(--border);
    }

    .btn-action {
        font-family: 'DM Sans', sans-serif;
        font-size: 0.82rem;
        font-weight: 600;
        letter-spacing: 0.06em;
        text-transform: uppercase;
        padding: 0.6rem 1.5rem;
        border-radius: 6px;
        border: 2px solid;
        cursor: pointer;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        transition: all 0.15s;
    }

    .btn-edit-main {
        background: var(--amber);
        border-color: var(--amber);
        color: var(--brown-deep);
    }
    .btn-edit-main:hover { background: var(--amber-light); border-color: var(--amber-light); }

    .btn-back {
        background: transparent;
        border-color: var(--border);
        color: var(--brown-mid);
    }
    .btn-back:hover { border-color: var(--brown-mid); color: var(--brown-deep); }
</style>

<a href="{{ route('anggota.index') }}" class="back-link">
    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
    Kembali ke Daftar Anggota
</a>

<div class="detail-card">
    <div class="detail-header">
        <div class="avatar-circle">{{ strtoupper(substr($anggota->nama_lengkap, 0, 1)) }}</div>
        <div class="detail-header-info">
            <div class="detail-name">{{ $anggota->nama_lengkap }}</div>
            <div class="detail-nim">NIM / KTP: {{ $anggota->nomor_induk }}</div>
        </div>
    </div>

    <div class="detail-body">
        <div class="detail-grid">
            <div class="detail-row">
                <div class="detail-label">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                    Nama Lengkap
                </div>
                <div class="detail-value">{{ $anggota->nama_lengkap }}</div>
            </div>

            <div class="detail-row">
                <div class="detail-label">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="M7 15h0M12 15h0M17 15h0"/></svg>
                    Nomor Induk
                </div>
                <div class="detail-value" style="font-family:monospace;font-size:1rem;letter-spacing:0.05em;">{{ $anggota->nomor_induk }}</div>
            </div>

            <div class="detail-row">
                <div class="detail-label">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg>
                    Jurusan
                </div>
                <div class="detail-value">{{ $anggota->jurusan }}</div>
            </div>

            <div class="detail-row">
                <div class="detail-label">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                    Email
                </div>
                <div class="detail-value">{{ $anggota->email }}</div>
            </div>

            <div class="detail-row">
                <div class="detail-label">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 13a19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 3.64 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L7.91 9.91a16 16 0 0 0 6.18 6.18l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                    Nomor Telepon
                </div>
                <div class="detail-value">{{ $anggota->no_telepon }}</div>
            </div>

            <div class="detail-row">
                <div class="detail-label">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                    Tanggal Daftar
                </div>
                <div class="detail-value">{{ $anggota->created_at->format('d/m/Y') }} <span style="color:var(--brown-mid);font-size:0.85em;">pukul {{ $anggota->created_at->format('H:i') }}</span></div>
            </div>
        </div>

        <div class="detail-actions">
            <a href="{{ route('anggota.edit', $anggota->id) }}" class="btn-action btn-edit-main">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                Edit Data
            </a>
            <a href="{{ route('anggota.index') }}" class="btn-action btn-back">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
                Kembali
            </a>
        </div>
    </div>
</div>

@endsection