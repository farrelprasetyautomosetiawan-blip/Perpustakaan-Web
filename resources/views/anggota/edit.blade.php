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

    .form-card {
        background: var(--warm-white);
        border: 1px solid var(--border);
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 24px rgba(61,43,31,0.09);
        max-width: 680px;
    }

    .form-header {
        background: #8B6914;
        padding: 1.75rem 2.5rem;
        display: flex;
        align-items: center;
        gap: 12px;
        position: relative;
        overflow: hidden;
    }

    .form-header::before {
        content: '';
        position: absolute;
        right: 1.5rem;
        top: 50%;
        transform: translateY(-50%);
        width: 48px;
        height: 48px;
        border-radius: 50%;
        border: 2px solid rgba(255,255,255,0.15);
        box-shadow: 0 0 0 8px rgba(255,255,255,0.06), 0 0 0 16px rgba(255,255,255,0.03);
    }

    .form-header-icon {
        width: 42px;
        height: 42px;
        background: rgba(255,255,255,0.18);
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
    }

    .form-title {
        font-family: 'Playfair Display', serif;
        font-size: 1.4rem;
        font-weight: 700;
        color: #fff;
    }

    .form-subtitle {
        font-size: 0.8rem;
        color: rgba(255,255,255,0.7);
        margin-top: 2px;
    }

    .member-chip {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: var(--paper);
        border: 1px solid var(--border);
        border-radius: 20px;
        padding: 0.3rem 0.85rem;
        font-size: 0.8rem;
        color: var(--brown-mid);
        font-weight: 500;
        margin-bottom: 1.5rem;
    }

    .form-body {
        padding: 2rem 2.5rem;
    }

    .form-section-title {
        font-size: 0.7rem;
        font-weight: 700;
        letter-spacing: 0.14em;
        text-transform: uppercase;
        color: var(--brown-mid);
        margin-bottom: 1.25rem;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .form-section-title::after {
        content: '';
        flex: 1;
        height: 1px;
        background: var(--border);
    }

    .form-group {
        margin-bottom: 1.25rem;
    }

    .form-label {
        display: block;
        font-size: 0.8rem;
        font-weight: 600;
        color: var(--brown-deep);
        margin-bottom: 6px;
        letter-spacing: 0.02em;
    }

    .form-label span {
        color: #C0392B;
        margin-left: 2px;
    }

    .form-input {
        width: 100%;
        padding: 0.65rem 1rem;
        background: var(--cream);
        border: 1.5px solid var(--border);
        border-radius: 7px;
        font-family: 'DM Sans', sans-serif;
        font-size: 0.9rem;
        color: var(--ink);
        transition: all 0.15s;
        outline: none;
    }

    .form-input:focus {
        border-color: var(--amber);
        background: #fff;
        box-shadow: 0 0 0 3px rgba(200,134,42,0.12);
    }

    .form-input.is-error {
        border-color: #C0392B;
        background: #FDF2F2;
    }

    .form-error {
        font-size: 0.78rem;
        color: #C0392B;
        margin-top: 5px;
        display: flex;
        align-items: center;
        gap: 4px;
    }

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1rem;
    }

    .form-actions {
        display: flex;
        gap: 10px;
        margin-top: 2rem;
        padding-top: 1.5rem;
        border-top: 2px solid var(--border);
    }

    .btn-update {
        font-family: 'DM Sans', sans-serif;
        font-size: 0.82rem;
        font-weight: 700;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        padding: 0.65rem 2rem;
        border-radius: 7px;
        border: 2px solid var(--amber);
        background: var(--amber);
        color: var(--brown-deep);
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        transition: all 0.15s;
    }
    .btn-update:hover { background: var(--amber-light); border-color: var(--amber-light); }

    .btn-cancel {
        font-family: 'DM Sans', sans-serif;
        font-size: 0.82rem;
        font-weight: 600;
        letter-spacing: 0.06em;
        text-transform: uppercase;
        padding: 0.65rem 1.5rem;
        border-radius: 7px;
        border: 2px solid var(--border);
        background: transparent;
        color: var(--brown-mid);
        cursor: pointer;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        transition: all 0.15s;
    }
    .btn-cancel:hover { border-color: var(--brown-mid); color: var(--brown-deep); }
</style>

<a href="{{ route('anggota.index') }}" class="back-link">
    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
    Kembali ke Daftar Anggota
</a>

<div class="form-card">
    <div class="form-header">
        <div class="form-header-icon">✏️</div>
        <div>
            <div class="form-title">Edit Data Anggota</div>
            <div class="form-subtitle">Perbarui informasi anggota perpustakaan</div>
        </div>
    </div>

    <div class="form-body">
        <div class="member-chip">
            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
            Sedang mengedit: <strong>{{ $anggota->nama_lengkap }}</strong>
        </div>

        <form action="{{ route('anggota.update', $anggota->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-section-title">Informasi Identitas</div>

            <div class="form-row">
                <div class="form-group">
                    <label class="form-label" for="nama_lengkap">Nama Lengkap <span>*</span></label>
                    <input type="text"
                           class="form-input @error('nama_lengkap') is-error @enderror"
                           id="nama_lengkap" name="nama_lengkap"
                           value="{{ old('nama_lengkap', $anggota->nama_lengkap) }}"
                           >
                    @error('nama_lengkap')
                        <div class="form-error">
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label" for="nomor_induk">Nomor Induk (NIM/KTP) <span>*</span></label>
                    <input type="text"
                           class="form-input @error('nomor_induk') is-error @enderror"
                           id="nomor_induk" name="nomor_induk"
                           value="{{ old('nomor_induk', $anggota->nomor_induk) }}"
                           >
                    @error('nomor_induk')
                        <div class="form-error">
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label class="form-label" for="jurusan">Jurusan / Program Studi <span>*</span></label>
                <input type="text"
                       class="form-input @error('jurusan') is-error @enderror"
                       id="jurusan" name="jurusan"
                       value="{{ old('jurusan', $anggota->jurusan) }}"
                       >
                @error('jurusan')
                    <div class="form-error">
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-section-title" style="margin-top:1.5rem;">Informasi Kontak</div>

            <div class="form-row">
                <div class="form-group">
                    <label class="form-label" for="email">Alamat Email <span>*</span></label>
                    <input type="email"
                           class="form-input @error('email') is-error @enderror"
                           id="email" name="email"
                           value="{{ old('email', $anggota->email) }}"
                           >
                    @error('email')
                        <div class="form-error">
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label" for="no_telepon">Nomor Telepon <span>*</span></label>
                    <input type="text"
                           class="form-input @error('no_telepon') is-error @enderror"
                           id="no_telepon" name="no_telepon"
                           value="{{ old('no_telepon', $anggota->no_telepon) }}"
                           >
                    @error('no_telepon')
                        <div class="form-error">
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-update">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                    Simpan Perubahan
                </button>
                <a href="{{ route('anggota.index') }}" class="btn-cancel">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>

@endsection