@extends('pengembalian.layout')

@section('pengembalian_content')
<div style="max-width:700px;margin:0 auto;">
    <div style="background:var(--warm-white);border-radius:8px;padding:2rem;border:1px solid var(--border);">
        <h1 style="font-family: 'Playfair Display', serif; font-size: 1.75rem; font-weight: 700; color: var(--brown-deep); margin: 0 0 1.5rem 0;">Tambah Pengembalian</h1>

        <form action="{{ route('pengembalian.store') }}" method="POST" style="display:flex;flex-direction:column;gap:1.25rem;">
            @csrf

            <div>
                <label for="peminjaman_id" style="display:block;font-weight:600;color:var(--brown-deep);margin-bottom:0.5rem;font-size:0.9rem;">Peminjaman <span style="color:#C41E3A;">*</span></label>
                <select name="peminjaman_id" id="peminjaman_id" required style="width:100%;padding:0.75rem;border:1px solid var(--border);border-radius:6px;font-size:0.95rem;font-family:'DM Sans',sans-serif;background:white;color:var(--ink);">
                    <option value="">-- Pilih Peminjaman --</option>
                    @foreach($peminjamans as $peminj)
                        <option value="{{ $peminj->id }}" {{ $selectedPeminjamanId == $peminj->id ? 'selected' : '' }}>
                            {{ $peminj->nama_peminjam }} - {{ $peminj->judul_buku }}
                        </option>
                    @endforeach
                </select>
                @error('peminjaman_id')
                    <p style="color:#C41E3A;font-size:0.85rem;margin-top:0.25rem;">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="tanggal_pengembalian" style="display:block;font-weight:600;color:var(--brown-deep);margin-bottom:0.5rem;font-size:0.9rem;">Tanggal Pengembalian <span style="color:#C41E3A;">*</span></label>
                <input type="date" name="tanggal_pengembalian" id="tanggal_pengembalian" required style="width:100%;padding:0.75rem;border:1px solid var(--border);border-radius:6px;font-size:0.95rem;font-family:'DM Sans',sans-serif;">
                @error('tanggal_pengembalian')
                    <p style="color:#C41E3A;font-size:0.85rem;margin-top:0.25rem;">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="kondisi_buku" style="display:block;font-weight:600;color:var(--brown-deep);margin-bottom:0.5rem;font-size:0.9rem;">Kondisi Buku <span style="color:#C41E3A;">*</span></label>
                <select name="kondisi_buku" id="kondisi_buku" required style="width:100%;padding:0.75rem;border:1px solid var(--border);border-radius:6px;font-size:0.95rem;font-family:'DM Sans',sans-serif;background:white;color:var(--ink);">
                    <option value="">-- Pilih Kondisi --</option>
                    <option value="baik">Baik</option>
                    <option value="rusak">Rusak</option>
                    <option value="hilang">Hilang</option>
                </select>
                @error('kondisi_buku')
                    <p style="color:#C41E3A;font-size:0.85rem;margin-top:0.25rem;">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="denda" style="display:block;font-weight:600;color:var(--brown-deep);margin-bottom:0.5rem;font-size:0.9rem;">Denda (Rp)</label>
                <input type="number" step="0.01" name="denda" id="denda" style="width:100%;padding:0.75rem;border:1px solid var(--border);border-radius:6px;font-size:0.95rem;font-family:'DM Sans',sans-serif;" placeholder="0">
                @error('denda')
                    <p style="color:#C41E3A;font-size:0.85rem;margin-top:0.25rem;">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="catatan" style="display:block;font-weight:600;color:var(--brown-deep);margin-bottom:0.5rem;font-size:0.9rem;">Catatan</label>
                <textarea name="catatan" id="catatan" rows="4" style="width:100%;padding:0.75rem;border:1px solid var(--border);border-radius:6px;font-size:0.95rem;font-family:'DM Sans',sans-serif;resize:vertical;" placeholder="Masukkan catatan..."></textarea>
                @error('catatan')
                    <p style="color:#C41E3A;font-size:0.85rem;margin-top:0.25rem;">{{ $message }}</p>
                @enderror
            </div>

            <div style="display:flex;gap:1rem;padding-top:0.5rem;">
                <button type="submit" style="flex:1;padding:0.75rem;background:var(--amber);color:var(--brown-deep);border:none;border-radius:6px;font-weight:600;cursor:pointer;font-size:0.95rem;transition:all 0.2s;">
                    Simpan
                </button>
                <a href="{{ route('pengembalian.index') }}" style="flex:1;padding:0.75rem;background:var(--brown-mid);color:white;border-radius:6px;font-weight:600;text-align:center;text-decoration:none;font-size:0.95rem;transition:all 0.2s;">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection