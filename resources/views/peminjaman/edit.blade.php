@extends('peminjaman.layout')

@section('title', 'Edit Peminjaman')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="bg-white rounded-lg shadow p-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-6">Edit Peminjaman</h1>

        @if ($errors->any())
            <div class="mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg">
                <h3 class="font-bold mb-2">Validasi Gagal:</h3>
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('peminjaman.update', $peminjaman) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label for="nama_peminjam" class="block text-sm font-medium text-gray-700 mb-2">Nama Peminjam <span class="text-red-500">*</span></label>
                <input type="text" name="nama_peminjam" id="nama_peminjam" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    value="{{ old('nama_peminjam', $peminjaman->nama_peminjam) }}" placeholder="Masukkan nama peminjam">
                @error('nama_peminjam')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="email_peminjam" class="block text-sm font-medium text-gray-700 mb-2">Email Peminjam (Opsional)</label>
                <input type="email" name="email_peminjam" id="email_peminjam"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    value="{{ old('email_peminjam', $peminjaman->email_peminjam) }}" placeholder="Masukkan email peminjam">
                @error('email_peminjam')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="no_telepon" class="block text-sm font-medium text-gray-700 mb-2">No. Telepon (Opsional)</label>
                <input type="text" name="no_telepon" id="no_telepon"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    value="{{ old('no_telepon', $peminjaman->no_telepon) }}" placeholder="Masukkan nomor telepon">
                @error('no_telepon')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="judul_buku" class="block text-sm font-medium text-gray-700 mb-2">Judul Buku <span class="text-red-500">*</span></label>
                <input type="text" name="judul_buku" id="judul_buku" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    value="{{ old('judul_buku', $peminjaman->judul_buku) }}" placeholder="Masukkan judul buku">
                @error('judul_buku')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="pengarang" class="block text-sm font-medium text-gray-700 mb-2">Pengarang <span class="text-red-500">*</span></label>
                <input type="text" name="pengarang" id="pengarang" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    value="{{ old('pengarang', $peminjaman->pengarang) }}" placeholder="Masukkan nama pengarang">
                @error('pengarang')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="isbn" class="block text-sm font-medium text-gray-700 mb-2">ISBN (Opsional)</label>
                <input type="text" name="isbn" id="isbn"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    value="{{ old('isbn', $peminjaman->isbn) }}" placeholder="Masukkan ISBN">
                @error('isbn')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="tanggal_peminjaman" class="block text-sm font-medium text-gray-700 mb-2">Tanggal Peminjaman <span class="text-red-500">*</span></label>
                    <input type="date" name="tanggal_peminjaman" id="tanggal_peminjaman" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        value="{{ old('tanggal_peminjaman', $peminjaman->tanggal_peminjaman->format('Y-m-d')) }}">
                    @error('tanggal_peminjaman')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="batas_pengembalian" class="block text-sm font-medium text-gray-700 mb-2">Batas Pengembalian <span class="text-red-500">*</span></label>
                    <input type="date" name="batas_pengembalian" id="batas_pengembalian" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        value="{{ old('batas_pengembalian', $peminjaman->batas_pengembalian->format('Y-m-d')) }}">
                    @error('batas_pengembalian')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div>
                <label for="tanggal_kembali" class="block text-sm font-medium text-gray-700 mb-2">Tanggal Kembali (Opsional)</label>
                <input type="date" name="tanggal_kembali" id="tanggal_kembali"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    value="{{ old('tanggal_kembali', $peminjaman->tanggal_kembali?->format('Y-m-d')) }}">
                @error('tanggal_kembali')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status <span class="text-red-500">*</span></label>
                <select name="status" id="status" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option value="dipinjam" {{ $peminjaman->status == 'dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                    <option value="dikembalikan" {{ $peminjaman->status == 'dikembalikan' ? 'selected' : '' }}>Dikembalikan</option>
                    <option value="hilang" {{ $peminjaman->status == 'hilang' ? 'selected' : '' }}>Hilang</option>
                </select>
                @error('status')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="catatan" class="block text-sm font-medium text-gray-700 mb-2">Catatan (Opsional)</label>
                <textarea name="catatan" id="catatan" rows="4"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    placeholder="Masukkan catatan jika ada">{{ old('catatan', $peminjaman->catatan) }}</textarea>
                @error('catatan')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex gap-4 pt-4">
                <button type="submit" class="flex-1 bg-blue-600 text-white py-2 rounded-lg font-medium hover:bg-blue-700 transition">
                    Simpan Perubahan
                </button>
                <a href="{{ route('peminjaman.show', $peminjaman) }}" class="flex-1 bg-gray-300 text-gray-700 py-2 rounded-lg font-medium text-center hover:bg-gray-400 transition">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
