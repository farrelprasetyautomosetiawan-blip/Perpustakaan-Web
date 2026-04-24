@extends('denda.layout')

@section('denda_content')
<div style="max-width:700px;margin:0 auto;">
    <div style="background:var(--warm-white);border-radius:8px;padding:2rem;border:1px solid var(--border);">
        <div style="margin-bottom:1.5rem;">
            <h1 style="font-family: 'Playfair Display', serif; font-size: 1.75rem; font-weight: 700; color: var(--brown-deep); margin: 0 0 0.5rem 0;">Edit Denda</h1>
            <p style="color:var(--brown-mid);margin:0;font-size:0.95rem;">Perbarui informasi denda dan detail pengembalian</p>
        </div>

        <form action="{{ route('denda.update', $denda) }}" method="POST" style="display:flex;flex-direction:column;gap:1.25rem;">
            @csrf
            @method('PUT')

            <div>
                <label for="peminjaman_id" style="display:block;font-weight:600;color:var(--brown-deep);margin-bottom:0.5rem;font-size:0.9rem;">Peminjaman</label>
                <input type="text" value="#{{ $denda->peminjaman_id }} - {{ $denda->peminjaman->judul_buku ?? 'Judul tidak tersedia' }}" readonly style="width:100%;padding:0.75rem;border:1px solid var(--border);border-radius:6px;font-size:0.95rem;font-family:'DM Sans',sans-serif;background:var(--paper);color:var(--brown-mid);">
                <p style="color:var(--brown-mid);font-size:0.85rem;margin-top:0.25rem;">ID Peminjaman tidak dapat diubah</p>
            </div>

            <div>
                <label for="tanggal_pengembalian" style="display:block;font-weight:600;color:var(--brown-deep);margin-bottom:0.5rem;font-size:0.9rem;">Tanggal Pengembalian <span style="color:#C41E3A;">*</span></label>
                <input type="date" name="tanggal_pengembalian" id="tanggal_pengembalian" value="{{ old('tanggal_pengembalian', $denda->tanggal_pengembalian?->format('Y-m-d')) }}" required style="width:100%;padding:0.75rem;border:1px solid var(--border);border-radius:6px;font-size:0.95rem;font-family:'DM Sans',sans-serif;">
                @error('tanggal_pengembalian')
                    <p style="color:#C41E3A;font-size:0.85rem;margin-top:0.25rem;">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="kondisi_buku" style="display:block;font-weight:600;color:var(--brown-deep);margin-bottom:0.5rem;font-size:0.9rem;">Kondisi Buku <span style="color:#C41E3A;">*</span></label>
                <select name="kondisi_buku" id="kondisi_buku" required style="width:100%;padding:0.75rem;border:1px solid var(--border);border-radius:6px;font-size:0.95rem;font-family:'DM Sans',sans-serif;background:white;color:var(--ink);">
                    <option value="baik" {{ old('kondisi_buku', $denda->kondisi_buku) == 'baik' ? 'selected' : '' }}>Baik</option>
                    <option value="rusak" {{ old('kondisi_buku', $denda->kondisi_buku) == 'rusak' ? 'selected' : '' }}>Rusak</option>
                    <option value="hilang" {{ old('kondisi_buku', $denda->kondisi_buku) == 'hilang' ? 'selected' : '' }}>Hilang</option>
                </select>
                @error('kondisi_buku')
                    <p style="color:#C41E3A;font-size:0.85rem;margin-top:0.25rem;">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="denda" style="display:block;font-weight:600;color:var(--brown-deep);margin-bottom:0.5rem;font-size:0.9rem;">Denda (Rp)</label>
                <input type="number" step="0.01" name="denda" id="denda" value="{{ old('denda', $denda->denda) }}" style="width:100%;padding:0.75rem;border:1px solid var(--border);border-radius:6px;font-size:0.95rem;font-family:'DM Sans',sans-serif;" placeholder="Contoh: 7500">
                @error('denda')
                    <p style="color:#C41E3A;font-size:0.85rem;margin-top:0.25rem;">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="catatan" style="display:block;font-weight:600;color:var(--brown-deep);margin-bottom:0.5rem;font-size:0.9rem;">Catatan</label>
                <textarea name="catatan" id="catatan" rows="4" style="width:100%;padding:0.75rem;border:1px solid var(--border);border-radius:6px;font-size:0.95rem;font-family:'DM Sans',sans-serif;resize:vertical;" placeholder="Masukkan catatan...">{{ old('catatan', $denda->catatan) }}</textarea>
                @error('catatan')
                    <p style="color:#C41E3A;font-size:0.85rem;margin-top:0.25rem;">{{ $message }}</p>
                @enderror
            </div>

            <div style="display:flex;gap:1rem;padding-top:0.5rem;">
                <button type="submit" style="flex:1;padding:0.75rem;background:var(--amber);color:var(--brown-deep);border:none;border-radius:6px;font-weight:600;cursor:pointer;font-size:0.95rem;transition:all 0.2s;">
                    Update
                </button>
                <a href="{{ route('denda.index') }}" style="flex:1;padding:0.75rem;background:var(--brown-mid);color:white;border-radius:6px;font-weight:600;text-align:center;text-decoration:none;font-size:0.95rem;transition:all 0.2s;">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
