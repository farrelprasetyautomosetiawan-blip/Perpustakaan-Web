<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Denda</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-7xl mx-auto">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Manajemen Denda</h1>
                <p class="text-gray-600 mt-1">Kelola data denda pengembalian buku dari peminjaman.</p>
            </div>
            <div class="flex flex-wrap gap-3">
                <a href="{{ route('denda.create') }}" class="inline-flex items-center justify-center px-4 py-2 bg-blue-600 text-white rounded-lg shadow-sm hover:bg-blue-700">Tambah Denda</a>
                <a href="{{ route('peminjaman.index') }}" class="inline-flex items-center justify-center px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300">Daftar Peminjaman</a>
            </div>
        </div>

        @if(session('success'))
            <div class="mb-4 rounded-lg bg-green-100 border border-green-300 p-4 text-green-700">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-hidden rounded-lg bg-white shadow">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Peminjam</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Judul Buku</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Tanggal Pengembalian</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Denda</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                    @forelse($dendas as $denda)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $denda->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $denda->peminjaman->nama_peminjam ?? 'Tidak tersedia' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $denda->peminjaman->judul_buku ?? 'Tidak tersedia' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ optional($denda->tanggal_pengembalian)->format('d-m-Y') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">Rp {{ number_format($denda->denda ?? 0, 0, ',', '.') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                                <a href="{{ route('denda.show', $denda) }}" class="text-indigo-600 hover:text-indigo-900">Lihat</a>
                                <a href="{{ route('denda.edit', $denda) }}" class="text-yellow-600 hover:text-yellow-900">Edit</a>
                                <form action="{{ route('denda.destroy', $denda) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Hapus data denda ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-10 text-center text-sm text-gray-500">Belum ada data denda.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $dendas->links() }}
        </div>
    </div>
</body>
</html>
