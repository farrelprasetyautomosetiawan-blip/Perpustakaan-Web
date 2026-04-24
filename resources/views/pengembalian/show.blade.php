@extends('pengembalian.layout')

@section('pengembalian_content')
<div style="max-width:700px;margin:0 auto;">
    <div style="background:var(--warm-white);border-radius:8px;padding:2rem;border:1px solid var(--border);">
        <h1 style="font-family: 'Playfair Display', serif; font-size: 1.75rem; font-weight: 700; color: var(--brown-deep); margin: 0 0 1.5rem 0;">Detail Pengembalian</h1>

        <div style="display:flex;flex-direction:column;gap:1.5rem;">
            <div>
                <label style="display:block;font-weight:600;color:var(--brown-deep);margin-bottom:0.5rem;font-size:0.9rem;">ID:</label>
                <p style="color:var(--ink);font-size:0.95rem;">{{ $pengembalian->id }}</p>
            </div>

            <div>
                <label style="display:block;font-weight:600;color:var(--brown-deep);margin-bottom:0.5rem;font-size:0.9rem;">Peminjaman:</label>
                <p style="color:var(--ink);font-size:0.95rem;">{{ $pengembalian->peminjaman->judul_buku ?? '-' }} - {{ $pengembalian->peminjaman->nama_peminjam ?? '-' }}</p>
            </div>

            <div>
                <label style="display:block;font-weight:600;color:var(--brown-deep);margin-bottom:0.5rem;font-size:0.9rem;">Tanggal Pengembalian:</label>
                <p style="color:var(--ink);font-size:0.95rem;">{{ $pengembalian->tanggal_pengembalian->format('d/m/Y') }}</p>
            </div>

            <div>
                <label style="display:block;font-weight:600;color:var(--brown-deep);margin-bottom:0.5rem;font-size:0.9rem;">Kondisi Buku:</label>
                <p style="color:var(--ink);font-size:0.95rem;text-transform:capitalize;">{{ $pengembalian->kondisi_buku }}</p>
            </div>

            <div>
                <label style="display:block;font-weight:600;color:var(--brown-deep);margin-bottom:0.5rem;font-size:0.9rem;">Denda:</label>
                <p style="color:#C41E3A;font-size:0.95rem;font-weight:600;">Rp {{ number_format($pengembalian->denda, 0, ',', '.') }}</p>
            </div>

            <div>
                <label style="display:block;font-weight:600;color:var(--brown-deep);margin-bottom:0.5rem;font-size:0.9rem;">Catatan:</label>
                <p style="color:var(--ink);font-size:0.95rem;">{{ $pengembalian->catatan ?: '-' }}</p>
            </div>

            <div style="display:flex;gap:1rem;padding-top:0.5rem;">
                <a href="{{ route('pengembalian.index') }}" style="flex:1;padding:0.75rem;background:var(--brown-mid);color:white;border-radius:6px;font-weight:600;text-align:center;text-decoration:none;font-size:0.95rem;transition:all 0.2s;">
                    Kembali
                </a>
                <a href="{{ route('pengembalian.edit', $pengembalian) }}" style="flex:1;padding:0.75rem;background:var(--amber);color:var(--brown-deep);border-radius:6px;font-weight:600;text-align:center;text-decoration:none;font-size:0.95rem;transition:all 0.2s;">
                    Edit
                </a>
            </div>
        </div>
    </div>
</div>
@endsection