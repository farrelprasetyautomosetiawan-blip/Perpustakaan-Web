@extends('peminjaman.layout')

@section('peminjaman_content')
<div style="max-width:800px;margin:0 auto;">
    <div style="background:var(--warm-white);border-radius:8px;padding:2rem;border:1px solid var(--border);">
        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:1.5rem;">
            <h1 style="font-family: 'Playfair Display', serif; font-size: 1.75rem; font-weight: 700; color: var(--brown-deep); margin: 0;">Detail Peminjaman</h1>
            <div style="display:flex;gap:0.75rem;flex-wrap:wrap;justify-content:flex-end;">
                <a href="{{ route('peminjaman.edit', $peminjaman) }}" class="inline-block bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600 transition">
                    Edit
                </a>
                <form action="{{ route('peminjaman.destroy', $peminjaman) }}" method="POST" class="inline-block"
                    onsubmit="return confirm('Yakin ingin menghapus?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition">
                        Hapus
                    </button>
                </form>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-8">
            <!-- Bagian Peminjam -->
            <div class="space-y-4">
                <h2 class="text-xl font-semibold text-gray-800 pb-2 border-b">Informasi Peminjam</h2>
                <div>
                    <label class="text-sm font-medium text-gray-600">Nama Peminjam</label>
                    <p class="text-lg text-gray-900 mt-1">{{ $peminjaman->nama_peminjam }}</p>
                </div>
                <div>
                    <label class="text-sm font-medium text-gray-600">Email</label>
                    <p class="text-lg text-gray-900 mt-1">{{ $peminjaman->email_peminjam ?? '-' }}</p>
                </div>
                <div>
                    <label class="text-sm font-medium text-gray-600">No. Telepon</label>
                    <p class="text-lg text-gray-900 mt-1">{{ $peminjaman->no_telepon ?? '-' }}</p>
                </div>
            </div>

            <!-- Status -->
            <div class="space-y-4">
                <h2 class="text-xl font-semibold text-gray-800 pb-2 border-b">Status Peminjaman</h2>
                <div>
                    <label class="text-sm font-medium text-gray-600">Status</label>
                    <p class="mt-2">
                        <span class="px-4 py-2 rounded-full text-sm font-medium
                            @if($peminjaman->status === 'dipinjam') bg-yellow-100 text-yellow-800
                            @elseif($peminjaman->status === 'dikembalikan') bg-green-100 text-green-800
                            @else bg-red-100 text-red-800 @endif">
                            {{ ucfirst($peminjaman->status) }}
                        </span>
                    </p>
                </div>
            </div>
        </div>

        <!-- Informasi Buku -->
        <div class="mt-8 space-y-4">
            <h2 class="text-xl font-semibold text-gray-800 pb-2 border-b">Informasi Buku</h2>
            <div class="grid grid-cols-2 gap-8">
                <div>
                    <label class="text-sm font-medium text-gray-600">Judul Buku</label>
                    <p class="text-lg text-gray-900 mt-1">{{ $peminjaman->judul_buku }}</p>
                </div>
                <div>
                    <label class="text-sm font-medium text-gray-600">Pengarang</label>
                    <p class="text-lg text-gray-900 mt-1">{{ $peminjaman->pengarang }}</p>
                </div>
                <div>
                    <label class="text-sm font-medium text-gray-600">ISBN</label>
                    <p class="text-lg text-gray-900 mt-1">{{ $peminjaman->isbn ?? '-' }}</p>
                </div>
            </div>
        </div>

        <!-- Tanggal -->
        <div class="mt-8 space-y-4">
            <h2 class="text-xl font-semibold text-gray-800 pb-2 border-b">Jadwal Peminjaman</h2>
            <div class="grid grid-cols-3 gap-8">
                <div>
                    <label class="text-sm font-medium text-gray-600">Tanggal Peminjaman</label>
                    <p class="text-lg text-gray-900 mt-1">{{ $peminjaman->tanggal_peminjaman->format('d M Y') }}</p>
                </div>
                <div>
                    <label class="text-sm font-medium text-gray-600">Batas Pengembalian</label>
                    <p class="text-lg text-gray-900 mt-1">{{ $peminjaman->batas_pengembalian->format('d M Y') }}</p>
                </div>
                <div>
                    <label class="text-sm font-medium text-gray-600">Tanggal Kembali</label>
                    <p class="text-lg text-gray-900 mt-1">
                        @if($peminjaman->tanggal_kembali)
                            {{ $peminjaman->tanggal_kembali->format('d M Y') }}
                        @else
                            <span class="text-gray-400">Belum dikembalikan</span>
                        @endif
                    </p>
                </div>
            </div>
        </div>

        <!-- Catatan -->
        @if($peminjaman->catatan)
            <div class="mt-8 space-y-4">
                <h2 class="text-xl font-semibold text-gray-800 pb-2 border-b">Catatan</h2>
                <p class="text-gray-700 bg-gray-50 p-4 rounded">{{ $peminjaman->catatan }}</p>
            </div>
        @endif

        <!-- Waktu Dibuat/Diperbarui -->
        <div class="mt-8 pt-6 border-t text-sm text-gray-500 space-y-1">
            <p>Dibuat pada: {{ $peminjaman->created_at->format('d M Y H:i') }}</p>
            <p>Terakhir diperbarui: {{ $peminjaman->updated_at->format('d M Y H:i') }}</p>
        </div>

        <!-- Tombol Kembali -->
        <div class="mt-8 pt-6 border-t">
            <a href="{{ route('peminjaman.index') }}" class="inline-block bg-gray-300 text-gray-700 px-6 py-2 rounded-lg hover:bg-gray-400 transition">
                ← Kembali ke Daftar
            </a>
        </div>
    </div>
</div>
@endsection
