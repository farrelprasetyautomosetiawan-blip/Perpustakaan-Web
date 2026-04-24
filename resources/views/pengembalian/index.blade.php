@extends('pengembalian.layout')

@section('pengembalian_content')
<div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:1.5rem;">
    <h1 style="font-family: 'Playfair Display', serif; font-size: 2.2rem; font-weight: 700; color: var(--brown-deep); margin: 0;">Daftar Pengembalian</h1>
    <a href="{{ route('pengembalian.create') }}" class="btn-add">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
        Tambah Pengembalian
    </a>
</div>

@if($pengembalians->count() > 0)
    <div style="background:var(--warm-white);border-radius:8px;overflow:hidden;border:1px solid var(--border);box-shadow:0 2px 4px rgba(0,0,0,0.05);">
        <table style="width:100%;border-collapse:collapse;">
            <thead style="background:var(--paper);border-bottom:2px solid var(--border);">
                <tr>
                    <th style="padding:1.25rem;text-align:left;font-weight:600;color:var(--brown-deep);font-size:0.85rem;text-transform:uppercase;letter-spacing:0.05em;">ID</th>
                    <th style="padding:1.25rem;text-align:left;font-weight:600;color:var(--brown-deep);font-size:0.85rem;text-transform:uppercase;letter-spacing:0.05em;">Peminjam</th>
                    <th style="padding:1.25rem;text-align:left;font-weight:600;color:var(--brown-deep);font-size:0.85rem;text-transform:uppercase;letter-spacing:0.05em;">Buku</th>
                    <th style="padding:1.25rem;text-align:left;font-weight:600;color:var(--brown-deep);font-size:0.85rem;text-transform:uppercase;letter-spacing:0.05em;">Tanggal Pengembalian</th>
                    <th style="padding:1.25rem;text-align:left;font-weight:600;color:var(--brown-deep);font-size:0.85rem;text-transform:uppercase;letter-spacing:0.05em;">Kondisi</th>
                    <th style="padding:1.25rem;text-align:left;font-weight:600;color:var(--brown-deep);font-size:0.85rem;text-transform:uppercase;letter-spacing:0.05em;">Denda</th>
                    <th style="padding:1.25rem;text-align:left;font-weight:600;color:var(--brown-deep);font-size:0.85rem;text-transform:uppercase;letter-spacing:0.05em;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pengembalians as $pengembalian)
                    <tr style="border-bottom:1px solid var(--border);">
                        <td style="padding:1.25rem;color:var(--ink);font-size:0.9rem;font-weight:500;">{{ $pengembalian->id }}</td>
                        <td style="padding:1.25rem;color:var(--ink);font-size:0.9rem;">{{ $pengembalian->peminjaman->nama_peminjam ?? 'N/A' }}</td>
                        <td style="padding:1.25rem;color:var(--ink);font-size:0.9rem;">{{ $pengembalian->peminjaman->judul_buku ?? 'N/A' }}</td>
                        <td style="padding:1.25rem;color:var(--ink);font-size:0.9rem;">{{ $pengembalian->tanggal_pengembalian->format('d/m/Y') }}</td>
                        <td style="padding:1.25rem;color:var(--ink);font-size:0.9rem;text-transform:capitalize;">{{ $pengembalian->kondisi_buku }}</td>
                        <td style="padding:1.25rem;color:var(--ink);font-size:0.9rem;font-weight:600;">Rp {{ number_format($pengembalian->denda, 0, ',', '.') }}</td>
                        <td style="padding:1.25rem;">
                            <div style="display:flex;gap:0.5rem;flex-wrap:wrap;">
                                <a href="{{ route('pengembalian.show', $pengembalian) }}" style="padding:0.4rem 0.8rem;background:var(--sage);color:white;border-radius:4px;text-decoration:none;font-size:0.85rem;font-weight:500;">Lihat</a>
                                <a href="{{ route('pengembalian.edit', $pengembalian) }}" style="padding:0.4rem 0.8rem;background:var(--amber);color:var(--brown-deep);border-radius:4px;text-decoration:none;font-size:0.85rem;font-weight:500;">Edit</a>
                                <form action="{{ route('pengembalian.destroy', $pengembalian) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="padding:0.4rem 0.8rem;background:#C41E3A;color:white;border-radius:4px;border:none;font-size:0.85rem;cursor:pointer;font-weight:500;">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" style="padding:2rem;text-align:center;color:var(--brown-mid);">Tidak ada data pengembalian</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@else
    <div style="background:var(--warm-white);border-radius:8px;padding:2rem;text-align:center;border:1px solid var(--border);">
        <p style="color:var(--brown-mid);margin-bottom:1rem;font-size:1.05rem;">📭 Belum ada data pengembalian</p>
        <a href="{{ route('pengembalian.create') }}" class="btn-add" style="display:inline-flex;">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
            Buat Data Pengembalian
        </a>
    </div>
@endif
@endsection