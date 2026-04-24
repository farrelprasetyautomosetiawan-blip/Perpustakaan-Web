<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Denda</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-4xl mx-auto">
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-gray-900">Detail Denda</h1>
            <p class="text-gray-600 mt-1">Informasi lengkap tentang denda pengembalian.</p>
        </div>

        <div class="space-y-4 rounded-lg bg-white p-6 shadow">
            <div class="grid gap-4 sm:grid-cols-2">
                <div>
                    <p class="text-sm font-semibold text-gray-500">ID Denda</p>
                    <p class="mt-1 text-gray-900">{{ $denda->id }}</p>
                </div>
                <div>
                    <p class="text-sm font-semibold text-gray-500">ID Peminjaman</p>
                    <p class="mt-1 text-gray-900">#{{ $denda->peminjaman_id }}</p>
                </div>
                <div>
                    <p class="text-sm font-semibold text-gray-500">Nama Peminjam</p>
                    <p class="mt-1 text-gray-900">{{ $denda->peminjaman->nama_peminjam ?? 'Tidak tersedia' }}</p>
                </div>
                <div>
                    <p class="text-sm font-semibold text-gray-500">Judul Buku</p>
                    <p class="mt-1 text-gray-900">{{ $denda->peminjaman->judul_buku ?? 'Tidak tersedia' }}</p>
                </div>
                <div>
                    <p class="text-sm font-semibold text-gray-500">Tanggal Pengembalian</p>
                    <p class="mt-1 text-gray-900">{{ optional($denda->tanggal_pengembalian)->format('d-m-Y') }}</p>
                </div>
                <div>
                    <p class="text-sm font-semibold text-gray-500">Kondisi Buku</p>
                    <p class="mt-1 text-gray-900">{{ ucfirst($denda->kondisi_buku) }}</p>
                </div>
                <div>
                    <p class="text-sm font-semibold text-gray-500">Jumlah Denda</p>
                    <p class="mt-1 text-gray-900">Rp {{ number_format($denda->denda ?? 0, 0, ',', '.') }}</p>
                </div>
                <div>
                    <p class="text-sm font-semibold text-gray-500">Catatan</p>
                    <p class="mt-1 text-gray-900">{{ $denda->catatan ?? '-' }}</p>
                </div>
            </div>

            <div class="mt-6 flex flex-wrap gap-3">
                <a href="{{ route('denda.index') }}" class="inline-flex items-center justify-center rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-semibold text-gray-700 hover:bg-gray-50">Kembali</a>
                <a href="{{ route('denda.edit', $denda) }}" class="inline-flex items-center justify-center rounded-lg bg-yellow-500 px-4 py-2 text-sm font-semibold text-white hover:bg-yellow-600">Edit</a>
            </div>
        </div>
    </div>
</body>
</html>
