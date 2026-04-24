<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pengembalian</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-2xl mx-auto">
        <h1 class="text-3xl font-bold mb-6">Edit Pengembalian</h1>

        <form action="{{ route('pengembalian.update', $pengembalian) }}" method="POST" class="bg-white shadow-md rounded-lg p-6">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="peminjaman_id" class="block text-sm font-medium text-gray-700">ID Peminjaman</label>
                <input type="number" name="peminjaman_id" id="peminjaman_id" value="{{ $pengembalian->peminjaman_id }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" placeholder="Masukkan ID Peminjaman" required>
                @error('peminjaman_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="tanggal_pengembalian" class="block text-sm font-medium text-gray-700">Tanggal Pengembalian</label>
                <input type="date" name="tanggal_pengembalian" id="tanggal_pengembalian" value="{{ $pengembalian->tanggal_pengembalian->format('Y-m-d') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                @error('tanggal_pengembalian')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="kondisi_buku" class="block text-sm font-medium text-gray-700">Kondisi Buku</label>
                <select name="kondisi_buku" id="kondisi_buku" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                    <option value="baik" {{ $pengembalian->kondisi_buku == 'baik' ? 'selected' : '' }}>Baik</option>
                    <option value="rusak" {{ $pengembalian->kondisi_buku == 'rusak' ? 'selected' : '' }}>Rusak</option>
                    <option value="hilang" {{ $pengembalian->kondisi_buku == 'hilang' ? 'selected' : '' }}>Hilang</option>
                </select>
                @error('kondisi_buku')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="denda" class="block text-sm font-medium text-gray-700">Denda</label>
                <input type="number" step="0.01" name="denda" id="denda" value="{{ $pengembalian->denda }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                @error('denda')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="catatan" class="block text-sm font-medium text-gray-700">Catatan</label>
                <textarea name="catatan" id="catatan" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">{{ $pengembalian->catatan }}</textarea>
                @error('catatan')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end">
                <a href="{{ route('pengembalian.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mr-2">Batal</a>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update</button>
            </div>
        </form>
    </div>
</body>
</html>