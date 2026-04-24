<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Sistem Peminjaman</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50">
    <nav class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="{{ route('peminjaman.index') }}" class="text-2xl font-bold text-blue-600">
                        📚 Perpustakaan
                    </a>
                </div>
                <div class="flex items-center gap-4">
                    <a href="{{ route('peminjaman.index') }}" class="text-gray-700 hover:text-blue-600">
                        Daftar Peminjaman
                    </a>
                    <a href="{{ route('peminjaman.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                        + Tambah Peminjaman
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        @if ($message = Session::get('success'))
            <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
                <button class="absolute top-4 right-4 text-green-700 font-bold text-2xl" onclick="this.parentElement.style.display='none';">&times;</button>
                {{ $message }}
            </div>
        @endif

        @if ($message = Session::get('error'))
            <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg">
                <button class="absolute top-4 right-4 text-red-700 font-bold text-2xl" onclick="this.parentElement.style.display='none';">&times;</button>
                {{ $message }}
            </div>
        @endif

        @yield('content')
    </div>

    <footer class="bg-white border-t mt-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <p class="text-center text-gray-600">© 2026 Sistem Peminjaman Perpustakaan. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
