@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<div style="background:linear-gradient(135deg,var(--brown-deep),var(--brown-mid));border-radius:12px;padding:3.5rem 2rem;margin-bottom:3rem;color:white;position:relative;overflow:hidden;">
    <div style="position:absolute;top:-50px;right:-50px;font-size:200px;opacity:0.1;">📚</div>
    <div style="position:relative;z-index:2;">
        <h1 style="font-family: 'Playfair Display', serif;font-size:3rem;font-weight:700;margin:0 0 1rem 0;letter-spacing:-0.02em;">
            Selamat Datang
        </h1>
        <p style="font-size:1.25rem;margin:0;color:rgba(255,255,255,0.9);max-width:500px;">
            Sistem Manajemen Perpustakaan Modern
        </p>
    </div>
</div>

<!-- Menu Utama Section -->
<div style="margin-bottom:3rem;">
    <h2 style="font-family: 'Playfair Display', serif;font-size:1.5rem;color:var(--brown-deep);margin-bottom:1.5rem;font-weight:700;">Akses Cepat</h2>
    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(250px,1fr));gap:1.5rem;">
        
        <!-- Peminjaman Card -->
        <div style="background:var(--warm-white);border-radius:8px;padding:2rem;border:1px solid var(--border);box-shadow:0 2px 8px rgba(0,0,0,0.08);transition:all 0.3s;cursor:pointer;" onmouseover="this.style.transform='translateY(-4px)';this.style.boxShadow='0 8px 16px rgba(0,0,0,0.12)';" onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 2px 8px rgba(0,0,0,0.08)';">
            <div style="font-size:2.5rem;margin-bottom:1rem;">📖</div>
            <h3 style="font-family: 'Playfair Display', serif;font-size:1.25rem;color:var(--brown-deep);margin:0 0 0.5rem 0;font-weight:700;">Peminjaman</h3>
            <p style="color:var(--brown-mid);margin:0 0 1.5rem 0;font-size:0.95rem;">Kelola data peminjaman buku oleh anggota</p>
            <a href="{{ route('peminjaman.index') }}" style="display:inline-block;background:var(--amber);color:var(--brown-deep);padding:0.75rem 1.5rem;border-radius:6px;text-decoration:none;font-weight:600;font-size:0.9rem;transition:all 0.2s;">
                Lihat Data →
            </a>
        </div>

        <!-- Buku Card -->
        @if(Route::has('buku.index'))
        <div style="background:var(--warm-white);border-radius:8px;padding:2rem;border:1px solid var(--border);box-shadow:0 2px 8px rgba(0,0,0,0.08);transition:all 0.3s;cursor:pointer;" onmouseover="this.style.transform='translateY(-4px)';this.style.boxShadow='0 8px 16px rgba(0,0,0,0.12)';" onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 2px 8px rgba(0,0,0,0.08)';">
            <div style="font-size:2.5rem;margin-bottom:1rem;">📕</div>
            <h3 style="font-family: 'Playfair Display', serif;font-size:1.25rem;color:var(--brown-deep);margin:0 0 0.5rem 0;font-weight:700;">Koleksi Buku</h3>
            <p style="color:var(--brown-mid);margin:0 0 1.5rem 0;font-size:0.95rem;">Manajemen katalog dan koleksi buku</p>
            <a href="{{ route('buku.index') }}" style="display:inline-block;background:var(--amber);color:var(--brown-deep);padding:0.75rem 1.5rem;border-radius:6px;text-decoration:none;font-weight:600;font-size:0.9rem;transition:all 0.2s;">
                Lihat Data →
            </a>
        </div>
        @endif

        <!-- Pengembalian Card -->
        @if(Route::has('pengembalian.index'))
        <div style="background:var(--warm-white);border-radius:8px;padding:2rem;border:1px solid var(--border);box-shadow:0 2px 8px rgba(0,0,0,0.08);transition:all 0.3s;cursor:pointer;" onmouseover="this.style.transform='translateY(-4px)';this.style.boxShadow='0 8px 16px rgba(0,0,0,0.12)';" onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 2px 8px rgba(0,0,0,0.08)';">
            <div style="font-size:2.5rem;margin-bottom:1rem;">✅</div>
            <h3 style="font-family: 'Playfair Display', serif;font-size:1.25rem;color:var(--brown-deep);margin:0 0 0.5rem 0;font-weight:700;">Pengembalian</h3>
            <p style="color:var(--brown-mid);margin:0 0 1.5rem 0;font-size:0.95rem;">Proses pengembalian buku yang dipinjam</p>
            <a href="{{ route('pengembalian.index') }}" style="display:inline-block;background:var(--amber);color:var(--brown-deep);padding:0.75rem 1.5rem;border-radius:6px;text-decoration:none;font-weight:600;font-size:0.9rem;transition:all 0.2s;">
                Lihat Data →
            </a>
        </div>
        @endif

        <!-- Denda Card -->
        @if(Route::has('denda.index'))
        <div style="background:var(--warm-white);border-radius:8px;padding:2rem;border:1px solid var(--border);box-shadow:0 2px 8px rgba(0,0,0,0.08);transition:all 0.3s;cursor:pointer;" onmouseover="this.style.transform='translateY(-4px)';this.style.boxShadow='0 8px 16px rgba(0,0,0,0.12)';" onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 2px 8px rgba(0,0,0,0.08)';">
            <div style="font-size:2.5rem;margin-bottom:1rem;">⚠️</div>
            <h3 style="font-family: 'Playfair Display', serif;font-size:1.25rem;color:var(--brown-deep);margin:0 0 0.5rem 0;font-weight:700;">Denda</h3>
            <p style="color:var(--brown-mid);margin:0 0 1.5rem 0;font-size:0.95rem;">Manajemen denda keterlambatan pengembalian</p>
            <a href="{{ route('denda.index') }}" style="display:inline-block;background:var(--amber);color:var(--brown-deep);padding:0.75rem 1.5rem;border-radius:6px;text-decoration:none;font-weight:600;font-size:0.9rem;transition:all 0.2s;">
                Lihat Data →
            </a>
        </div>
        @endif

        <!-- Anggota Card -->
        @if(Route::has('anggota.index'))
        <div style="background:var(--warm-white);border-radius:8px;padding:2rem;border:1px solid var(--border);box-shadow:0 2px 8px rgba(0,0,0,0.08);transition:all 0.3s;cursor:pointer;" onmouseover="this.style.transform='translateY(-4px)';this.style.boxShadow='0 8px 16px rgba(0,0,0,0.12)';" onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 2px 8px rgba(0,0,0,0.08)';">
            <div style="font-size:2.5rem;margin-bottom:1rem;">👥</div>
            <h3 style="font-family: 'Playfair Display', serif;font-size:1.25rem;color:var(--brown-deep);margin:0 0 0.5rem 0;font-weight:700;">Anggota</h3>
            <p style="color:var(--brown-mid);margin:0 0 1.5rem 0;font-size:0.95rem;">Kelola data anggota perpustakaan</p>
            <a href="{{ route('anggota.index') }}" style="display:inline-block;background:var(--amber);color:var(--brown-deep);padding:0.75rem 1.5rem;border-radius:6px;text-decoration:none;font-weight:600;font-size:0.9rem;transition:all 0.2s;">
                Lihat Data →
            </a>
        </div>
        @endif
    </div>
</div>

<!-- Info Section -->
<div style="background:var(--paper);border-radius:8px;padding:2rem;border-left:4px solid var(--amber);">
    <h2 style="font-family: 'Playfair Display', serif;font-size:1.2rem;color:var(--brown-deep);margin:0 0 0.75rem 0;font-weight:700;">ℹ️ Tentang Sistem</h2>
    <p style="color:var(--brown-mid);margin:0;line-height:1.6;font-size:0.95rem;">
        Sistem Manajemen Perpustakaan adalah aplikasi web yang dirancang untuk mempermudah pengelolaan operasional perpustakaan modern. Dengan fitur-fitur lengkap mulai dari manajemen koleksi buku, peminjaman, pengembalian, hingga penghitungan denda, sistem ini membantu perpustakaan memberikan layanan terbaik kepada anggota.
    </p>
</div>

@endsection
