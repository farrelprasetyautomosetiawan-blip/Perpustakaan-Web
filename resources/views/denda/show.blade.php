@extends('denda.layout')

@section('denda_content')
<div style="max-width:700px;margin:0 auto;">
    <div style="background:var(--warm-white);border-radius:8px;padding:2rem;border:1px solid var(--border);">
        <div style="margin-bottom:1.5rem;">
            <h1 style="font-family: 'Playfair Display', serif; font-size: 1.75rem; font-weight: 700; color: var(--brown-deep); margin: 0 0 0.5rem 0;">Detail Denda</h1>
            <p style="color:var(--brown-mid);margin:0;font-size:0.95rem;">Informasi lengkap tentang denda pengembalian</p>
        </div>

        <div style="display:grid;grid-template-columns:1fr 1fr;gap:1.25rem;">
            <div>
                <label style="display:block;font-weight:600;color:var(--brown-deep);margin-bottom:0.5rem;font-size:0.85rem;text-transform:uppercase;letter-spacing:0.05em;">ID Denda</label>
                <p style="color:var(--ink);font-size:0.95rem;">{{ $denda->id }}</p>
            </div>
            <div>
                <label style="display:block;font-weight:600;color:var(--brown-deep);margin-bottom:0.5rem;font-size:0.85rem;text-transform:uppercase;letter-spacing:0.05em;">ID Peminjaman</label>
                <p style="color:var(--ink);font-size:0.95rem;">#{{ $denda->peminjaman_id }}</p>
            </div>
            <div>
                <label style="display:block;font-weight:600;color:var(--brown-deep);margin-bottom:0.5rem;font-size:0.85rem;text-transform:uppercase;letter-spacing:0.05em;">Nama Peminjam</label>
                <p style="color:var(--ink);font-size:0.95rem;">{{ $denda->peminjaman->nama_peminjam ?? '-' }}</p>
            </div>
            <div>
                <label style="display:block;font-weight:600;color:var(--brown-deep);margin-bottom:0.5rem;font-size:0.85rem;text-transform:uppercase;letter-spacing:0.05em;">Judul Buku</label>
                <p style="color:var(--ink);font-size:0.95rem;">{{ $denda->peminjaman->judul_buku ?? '-' }}</p>
            </div>
            <div>
                <label style="display:block;font-weight:600;color:var(--brown-deep);margin-bottom:0.5rem;font-size:0.85rem;text-transform:uppercase;letter-spacing:0.05em;">Tanggal Pengembalian</label>
                <p style="color:var(--ink);font-size:0.95rem;">{{ optional($denda->tanggal_pengembalian)->format('d/m/Y') ?? '-' }}</p>
            </div>
            <div>
                <label style="display:block;font-weight:600;color:var(--brown-deep);margin-bottom:0.5rem;font-size:0.85rem;text-transform:uppercase;letter-spacing:0.05em;">Kondisi Buku</label>
                <p style="color:var(--ink);font-size:0.95rem;text-transform:capitalize;">{{ $denda->kondisi_buku }}</p>
            </div>
            <div style="grid-column:1 / -1;">
                <label style="display:block;font-weight:600;color:var(--brown-deep);margin-bottom:0.5rem;font-size:0.85rem;text-transform:uppercase;letter-spacing:0.05em;">Jumlah Denda</label>
                <p style="color:#C41E3A;font-size:1.1rem;font-weight:600;">Rp {{ number_format($denda->denda ?? 0, 0, ',', '.') }}</p>
            </div>
            <div style="grid-column:1 / -1;">
                <label style="display:block;font-weight:600;color:var(--brown-deep);margin-bottom:0.5rem;font-size:0.85rem;text-transform:uppercase;letter-spacing:0.05em;">Catatan</label>
                <p style="color:var(--ink);font-size:0.95rem;">{{ $denda->catatan ?? '-' }}</p>
            </div>
        </div>

        <div style="display:flex;gap:1rem;padding-top:1.5rem;margin-top:1.5rem;border-top:1px solid var(--border);">
            <a href="{{ route('denda.index') }}" style="flex:1;padding:0.75rem;background:var(--brown-mid);color:white;border-radius:6px;font-weight:600;text-align:center;text-decoration:none;font-size:0.95rem;transition:all 0.2s;">
                Kembali
            </a>
            <a href="{{ route('denda.edit', $denda) }}" style="flex:1;padding:0.75rem;background:var(--amber);color:var(--brown-deep);border-radius:6px;font-weight:600;text-align:center;text-decoration:none;font-size:0.95rem;transition:all 0.2s;">
                Edit
            </a>
        </div>
    </div>
</div>
@endsection
