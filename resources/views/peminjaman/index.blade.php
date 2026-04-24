@extends('peminjaman.layout')

@section('title', 'Daftar Peminjaman')

@section('content')
<div class="space-y-6">
    <div class="flex justify-between items-center">
        <h1 class="text-3xl font-bold text-gray-900">Daftar Peminjaman</h1>
        <a href="{{ route('peminjaman.create') }}" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">
            + Tambah Peminjaman
        </a>
    </div>

    @if($peminjaman->count() > 0)
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">No</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Peminjam</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Judul Buku</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Pengarang</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Tgl Peminjaman</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Batas Kembali</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($peminjaman as $item)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $loop->iteration + ($peminjaman->currentPage() - 1) * $peminjaman->perPage() }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $item->nama_peminjam }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $item->email_peminjam ?? '-' }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $item->judul_buku }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $item->pengarang }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $item->tanggal_peminjaman->format('d/m/Y') }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $item->batas_pengembalian->format('d/m/Y') }}</td>
                            <td class="px-6 py-4 text-sm">
                                <span class="px-3 py-1 rounded-full text-sm font-medium
                                    @if($item->status === 'dipinjam') bg-yellow-100 text-yellow-800
                                    @elseif($item->status === 'dikembalikan') bg-green-100 text-green-800
                                    @else bg-red-100 text-red-800 @endif">
                                    {{ ucfirst($item->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm space-x-2">
                                <a href="{{ route('peminjaman.show', $item) }}" class="inline-block bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 transition">
                                    Lihat
                                </a>
                                <a href="{{ route('peminjaman.edit', $item) }}" class="inline-block bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 transition">
                                    Edit
                                </a>
                                @if($item->status === 'dipinjam')
                                    <a href="{{ route('pengembalian.create', ['peminjaman_id' => $item->id]) }}" class="inline-block bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 transition">
                                        Kembalikan
                                    </a>
                                @endif
                                <form action="{{ route('peminjaman.destroy', $item) }}" method="POST" class="inline-block"
                                    onsubmit="return confirm('Yakin ingin menghapus?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 transition">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="px-6 py-8 text-center text-gray-500">
                                Tidak ada data peminjaman
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $peminjaman->links() }}
        </div>
    @else
        <div class="bg-white rounded-lg shadow p-8 text-center">
            <p class="text-gray-500 text-lg mb-4">Belum ada data peminjaman</p>
            <a href="{{ route('peminjaman.create') }}" class="inline-block bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">
                Buat Peminjaman Baru
            </a>
        </div>
    @endif
</div>
@endsection
