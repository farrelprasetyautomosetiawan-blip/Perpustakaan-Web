<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pengembalian</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-2xl mx-auto">
        <h1 class="text-3xl font-bold mb-6">Detail Pengembalian</h1>

        <div class="bg-white shadow-md rounded-lg p-6">
            <div class="mb-4">
                <strong class="block text-sm font-medium text-gray-700">ID:</strong>
                <p class="text-gray-900">{{ $pengembalian->id }}</p>
            </div>

            <div class="mb-4">
                <strong class="block text-sm font-medium text-gray-700">Peminjaman:</strong>
                <p class="text-gray-900">{{ $pengembalian->peminjaman->judul_buku ?? 'N/A' }} - {{ $pengembalian->peminjaman->nama_peminjam ?? 'N/A' }}</p>
            </div>

            <div class="mb-4">
                <strong class="block text-sm font-medium text-gray-700">Tanggal Pengembalian:</strong>
                <p class="text-gray-900">{{ $pengembalian->tanggal_pengembalian->format('d-m-Y') }}</p>
            </div>

            <div class="mb-4">
                <strong class="block text-sm font-medium text-gray-700">Kondisi Buku:</strong>
                <p class="text-gray-900">{{ ucfirst($pengembalian->kondisi_buku) }}</p>
            </div>

            <div class="mb-4">
                <strong class="block text-sm font-medium text-gray-700">Denda:</strong>
                <p class="text-gray-900">Rp {{ number_format($pengembalian->denda, 0, ',', '.') }}</p>
            </div>

            <div class="mb-4">
                <strong class="block text-sm font-medium text-gray-700">Catatan:</strong>
                <p class="text-gray-900">{{ $pengembalian->catatan ?: 'Tidak ada catatan' }}</p>
            </div>

            <div class="flex justify-end">
                <a href="{{ route('pengembalian.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mr-2">Kembali</a>
                <a href="{{ route('pengembalian.edit', $pengembalian) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">Edit</a>
            </div>
        </div>
    </div>
</body>
</html>