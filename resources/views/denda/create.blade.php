<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Denda</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-3xl mx-auto">
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-gray-900">Tambah Denda Baru</h1>
            <p class="text-gray-600 mt-1">Buat data denda untuk pengembalian buku.</p>
        </div>

        <form action="{{ route('denda.store') }}" method="POST" class="space-y-6 rounded-lg bg-white p-6 shadow">
            @csrf

            <div>
                <label for="peminjaman_id" class="block text-sm font-medium text-gray-700">Peminjaman</label>
                <select name="peminjaman_id" id="peminjaman_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    <option value="">Pilih peminjaman aktif</option>
                    @foreach($peminjamans as $peminjaman)
                        <option value="{{ $peminjaman->id }}" {{ old('peminjaman_id') == $peminjaman->id ? 'selected' : '' }}>
                            #{{ $peminjaman->id }} - {{ $peminjaman->judul_buku }} ({{ $peminjaman->nama_peminjam }})
                        </option>
                    @endforeach
                </select>
                @error('peminjaman_id')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="tanggal_pengembalian" class="block text-sm font-medium text-gray-700">Tanggal Pengembalian</label>
                <input type="date" name="tanggal_pengembalian" id="tanggal_pengembalian" value="{{ old('tanggal_pengembalian') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                @error('tanggal_pengembalian')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="kondisi_buku" class="block text-sm font-medium text-gray-700">Kondisi Buku</label>
                <select name="kondisi_buku" id="kondisi_buku" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                    <option value="baik" {{ old('kondisi_buku') == 'baik' ? 'selected' : '' }}>Baik</option>
                    <option value="rusak" {{ old('kondisi_buku') == 'rusak' ? 'selected' : '' }}>Rusak</option>
                    <option value="hilang" {{ old('kondisi_buku') == 'hilang' ? 'selected' : '' }}>Hilang</option>
                </select>
                @error('kondisi_buku')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="denda" class="block text-sm font-medium text-gray-700">Denda (Rp)</label>
                <input type="number" step="0.01" name="denda" id="denda" value="{{ old('denda') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" placeholder="Contoh: 5000">
                @error('denda')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="catatan" class="block text-sm font-medium text-gray-700">Catatan</label>
                <textarea name="catatan" id="catatan" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('catatan') }}</textarea>
                @error('catatan')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex flex-wrap gap-3 justify-end">
                <a href="{{ route('denda.index') }}" class="inline-flex items-center justify-center rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-semibold text-gray-700 hover:bg-gray-50">Batal</a>
                <button type="submit" class="inline-flex items-center justify-center rounded-lg bg-blue-600 px-4 py-2 text-sm font-semibold text-white hover:bg-blue-700">Simpan</button>
            </div>
        </form>
    </div>
</body>
</html>
