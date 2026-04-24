@extends('denda.layout')

@section('denda_content')
<div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:1.5rem;flex-wrap:wrap;gap:1rem;">
    <div>
        <h1 style="font-family: 'Playfair Display', serif; font-size: 2.2rem; font-weight: 700; color: var(--brown-deep); margin: 0 0 0.5rem 0;">Manajemen Denda</h1>
        <p style="color:var(--brown-mid);margin:0;font-size:0.95rem;">Kelola data denda pengembalian buku</p>
    </div>
    <a href="{{ route('denda.create') }}" class="btn-add">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
        Tambah Denda
    </a>
</div>

@if($dendas->count() > 0)
    <div style="background:var(--warm-white);border-radius:8px;overflow:hidden;border:1px solid var(--border);box-shadow:0 2px 4px rgba(0,0,0,0.05);">
        <table style="width:100%;border-collapse:collapse;">
            <thead style="background:var(--paper);border-bottom:2px solid var(--border);">
                <tr>
                    <th style="padding:1.25rem;text-align:left;font-weight:600;color:var(--brown-deep);font-size:0.85rem;text-transform:uppercase;letter-spacing:0.05em;">ID</th>
                    <th style="padding:1.25rem;text-align:left;font-weight:600;color:var(--brown-deep);font-size:0.85rem;text-transform:uppercase;letter-spacing:0.05em;">Peminjam</th>
                    <th style="padding:1.25rem;text-align:left;font-weight:600;color:var(--brown-deep);font-size:0.85rem;text-transform:uppercase;letter-spacing:0.05em;">Buku</th>
                    <th style="padding:1.25rem;text-align:left;font-weight:600;color:var(--brown-deep);font-size:0.85rem;text-transform:uppercase;letter-spacing:0.05em;">Tgl Pengembalian</th>
                    <th style="padding:1.25rem;text-align:left;font-weight:600;color:var(--brown-deep);font-size:0.85rem;text-transform:uppercase;letter-spacing:0.05em;">Denda</th>
                    <th style="padding:1.25rem;text-align:left;font-weight:600;color:var(--brown-deep);font-size:0.85rem;text-transform:uppercase;letter-spacing:0.05em;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($dendas as $denda)
                    <tr style="border-bottom:1px solid var(--border);">
                        <td style="padding:1.25rem;color:var(--ink);font-size:0.9rem;font-weight:500;">{{ $denda->id }}</td>
                        <td style="padding:1.25rem;color:var(--ink);font-size:0.9rem;">{{ $denda->peminjaman->nama_peminjam ?? '-' }}</td>
                        <td style="padding:1.25rem;color:var(--ink);font-size:0.9rem;">{{ $denda->peminjaman->judul_buku ?? '-' }}</td>
                        <td style="padding:1.25rem;color:var(--ink);font-size:0.9rem;">{{ optional($denda->tanggal_pengembalian)->format('d/m/Y') ?? '-' }}</td>
                        <td style="padding:1.25rem;color:var(--ink);font-size:0.9rem;font-weight:600;color:#C41E3A;">Rp {{ number_format($denda->denda ?? 0, 0, ',', '.') }}</td>
                        <td style="padding:1.25rem;">
                            <div style="display:flex;gap:0.5rem;flex-wrap:wrap;">
                                <a href="{{ route('denda.show', $denda) }}" style="padding:0.4rem 0.8rem;background:var(--sage);color:white;border-radius:4px;text-decoration:none;font-size:0.85rem;font-weight:500;">Lihat</a>
                                <a href="{{ route('denda.edit', $denda) }}" style="padding:0.4rem 0.8rem;background:var(--amber);color:var(--brown-deep);border-radius:4px;text-decoration:none;font-size:0.85rem;font-weight:500;">Edit</a>
                                <form action="{{ route('denda.destroy', $denda) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="padding:0.4rem 0.8rem;background:#C41E3A;color:white;border-radius:4px;border:none;font-size:0.85rem;cursor:pointer;font-weight:500;">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" style="padding:2rem;text-align:center;color:var(--brown-mid);">Tidak ada data denda</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div style="display:flex;justify-content:center;margin-top:2rem;">
        {{ $dendas->links() }}
    </div>
@else
    <div style="background:var(--warm-white);border-radius:8px;padding:2rem;text-align:center;border:1px solid var(--border);">
        <p style="color:var(--brown-mid);margin-bottom:1rem;font-size:1.05rem;">📭 Belum ada data denda</p>
        <a href="{{ route('denda.create') }}" class="btn-add" style="display:inline-flex;">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
            Buat Data Denda
        </a>
    </div>
@endif
@endsection
