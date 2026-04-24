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
        max-width: 800px;
    }

    .form-header {
        background: var(--sage);
        padding: 1.75rem 2.5rem;
        display: flex;
        align-items: center;
        gap: 12px;
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

    .form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1.5rem;
    }

    .form-group {
        margin-bottom: 1.25rem;
    }

    .form-group.full-width {
        grid-column: 1 / -1;
    }

    .form-label {
        display: block;
        font-size: 0.8rem;
        font-weight: 600;
        color: var(--brown-deep);
        margin-bottom: 0.5rem;
    }

    .form-label .required {
        color: #DC3545;
    }

    .form-input {
        width: 100%;
        padding: 0.7rem 1rem;
        font-size: 0.9rem;
        border: 1px solid var(--border);
        border-radius: 8px;
        background: #fff;
        color: var(--ink);
        transition: all 0.2s;
    }

    .form-input:focus {
        outline: none;
        border-color: var(--amber);
        box-shadow: 0 0 0 3px rgba(200,134,42,0.15);
    }

    .form-input::placeholder {
        color: #A89F91;
    }

    textarea.form-input {
        min-height: 100px;
        resize: vertical;
    }

    .form-select {
        width: 100%;
        padding: 0.7rem 1rem;
        font-size: 0.9rem;
        border: 1px solid var(--border);
        border-radius: 8px;
        background: #fff;
        color: var(--ink);
        cursor: pointer;
    }

    .form-select:focus {
        outline: none;
        border-color: var(--amber);
        box-shadow: 0 0 0 3px rgba(200,134,42,0.15);
    }

    .error-message {
        color: #DC3545;
        font-size: 0.75rem;
        margin-top: 0.35rem;
    }

    .form-actions {
        display: flex;
        justify-content: flex-end;
        gap: 12px;
        margin-top: 2rem;
        padding-top: 1.5rem;
        border-top: 1px solid var(--border);
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

    .btn-cancel {
        background: var(--paper);
        color: var(--brown-mid);
        border: 1px solid var(--border);
    }

    .btn-cancel:hover {
        background: var(--border);
    }

    .btn-submit {
        background: var(--amber);
        color: var(--brown-deep);
        border: 2px solid var(--amber);
    }

    .btn-submit:hover {
        background: var(--amber-light);
        border-color: var(--amber-light);
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

    <div class="form-card">
        <div class="form-header">
            <div class="form-header-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="color: #fff;">
                    <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                    <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                    <line x1="12" y1="6" x2="12" y2="12"></line>
                    <line x1="9" y1="9" x2="15" y2="9"></line>
                </svg>
            </div>
            <div>
                <h2 class="form-title">Tambah Buku Baru</h2>
                <p class="form-subtitle">Masukkan informasi lengkap buku</p>
            </div>
        </div>

        <div class="form-body">
            <form action="{{ route('buku.store') }}" method="POST">
                @csrf

                <p class="form-section-title">Informasi Dasar</p>
                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label">Kode Buku <span class="required">*</span></label>
                        <input type="text" name="kode_buku" class="form-input" placeholder="Contoh: BK-001" value="{{ old('kode_buku') }}">
                        @error('kode_buku')
                            <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label">ISBN</label>
                        <input type="text" name="isbn" class="form-input" placeholder="Contoh: 978-602-0000-00-0" value="{{ old('isbn') }}">
                    </div>

                    <div class="form-group full-width">
                        <label class="form-label">Judul Buku <span class="required">*</span></label>
                        <input type="text" name="judul" class="form-input" placeholder="Masukkan judul buku" value="{{ old('judul') }}">
                        @error('judul')
                            <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <p class="form-section-title" style="margin-top: 1.5rem;">Informasi Penulis & Penerbit</p>
                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label">Penulis <span class="required">*</span></label>
                        <input type="text" name="penulis" class="form-input" placeholder="Nama penulis" value="{{ old('penulis') }}">
                        @error('penulis')
                            <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label">Penerbit <span class="required">*</span></label>
                        <input type="text" name="penerbit" class="form-input" placeholder="Nama penerbit" value="{{ old('penerbit') }}">
                        @error('penerbit')
                            <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label">Tahun Terbit <span class="required">*</span></label>
                        <input type="number" name="tahun_terbit" class="form-input" placeholder="Contoh: 2024" value="{{ old('tahun_terbit') }}">
                        @error('tahun_terbit')
                            <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label">Jumlah Halaman <span class="required">*</span></label>
                        <input type="number" name="jumlah_halaman" class="form-input" placeholder="Contoh: 256" value="{{ old('jumlah_halaman') }}">
                        @error('jumlah_halaman')
                            <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <p class="form-section-title" style="margin-top: 1.5rem;">Informasi Lainnya</p>
                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label">Kategori <span class="required">*</span></label>
                        <select name="kategori" class="form-select">
                            <option value="">Pilih Kategori</option>
                            <option value="Fiksi" {{ old('kategori') == 'Fiksi' ? 'selected' : '' }}>Fiksi</option>
                            <option value="Non-Fiksi" {{ old('kategori') == 'Non-Fiksi' ? 'selected' : '' }}>Non-Fiksi</option>
                            <option value="Ilmu Pengetahuan" {{ old('kategori') == 'Ilmu Pengetahuan' ? 'selected' : '' }}>Ilmu Pengetahuan</option>
                            <option value="Sejarah" {{ old('kategori') == 'Sejarah' ? 'selected' : '' }}>Sejarah</option>
                            <option value="Agama" {{ old('kategori') == 'Agama' ? 'selected' : '' }}>Agama</option>
                            <option value="Teknologi" {{ old('kategori') == 'Teknologi' ? 'selected' : '' }}>Teknologi</option>
                            <option value="Seni" {{ old('kategori') == 'Seni' ? 'selected' : '' }}>Seni</option>
                            <option value="Sastra" {{ old('kategori') == 'Sastra' ? 'selected' : '' }}>Sastra</option>
                            <option value="Pendidikan" {{ old('kategori') == 'Pendidikan' ? 'selected' : '' }}>Pendidikan</option>
                            <option value="Lainnya" {{ old('kategori') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                        </select>
                        @error('kategori')
                            <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label">Stok <span class="required">*</span></label>
                        <input type="number" name="stok" class="form-input" placeholder="Jumlah stok" value="{{ old('stok', 1) }}">
                        @error('stok')
                            <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label">Rak</label>
                        <input type="text" name="rak" class="form-input" placeholder="Contoh: Rak A-1" value="{{ old('rak') }}">
                    </div>

                    <div class="form-group full-width">
                        <label class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" class="form-input" placeholder="Masukkan deskripsi buku (opsional)">{{ old('deskripsi') }}</textarea>
                    </div>
                </div>

                <div class="form-actions">
                    <a href="{{ route('buku.index') }}" class="btn btn-cancel">Batal</a>
                    <button type="submit" class="btn btn-submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path>
                            <polyline points="17 21 17 13 7 13 7 21"></polyline>
                            <polyline points="7 3 7 8 15 8"></polyline>
                        </svg>
                        Simpan Buku
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection