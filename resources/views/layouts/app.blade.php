<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan - Manajemen Anggota</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --cream: #F5F0E8;
            --warm-white: #FDFAF4;
            --ink: #1C1A17;
            --brown-deep: #3D2B1F;
            --brown-mid: #7B4F35;
            --amber: #C8862A;
            --amber-light: #E8A84C;
            --sage: #5C7A5E;
            --paper: #EDE8DC;
            --border: #D4C9B0;
        }

        * { box-sizing: border-box; }

        body {
            font-family: 'DM Sans', sans-serif;
            background-color: var(--cream);
            color: var(--ink);
            min-height: 100vh;
        }

        h1, h2, h3, h4, h5 {
            font-family: 'Playfair Display', serif;
        }

        /* Grain texture overlay */
        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 512 512' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.04'/%3E%3C/svg%3E");
            pointer-events: none;
            z-index: 1000;
            opacity: 0.6;
        }

        /* Navbar */
        .navbar {
            background: var(--brown-deep);
            border-bottom: 3px solid var(--amber);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .navbar-brand {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--cream);
            text-decoration: none;
            letter-spacing: 0.02em;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: color 0.2s;
        }

        .navbar-brand:hover { color: var(--amber-light); }

        .brand-icon {
            width: 36px;
            height: 36px;
            background: var(--amber);
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
        }

        .btn-add {
            font-family: 'DM Sans', sans-serif;
            font-weight: 600;
            font-size: 0.85rem;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            padding: 0.5rem 1.25rem;
            background: var(--amber);
            color: var(--brown-deep);
            border-radius: 6px;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 6px;
            transition: all 0.2s;
            border: 2px solid var(--amber);
        }

        .btn-add:hover {
            background: transparent;
            color: var(--amber);
        }

        /* Sidebar decorative spine */
        .page-wrapper {
            display: flex;
            min-height: calc(100vh - 70px);
        }

        .sidebar-spine {
            width: 6px;
            background: repeating-linear-gradient(
                180deg,
                var(--brown-mid) 0px,
                var(--brown-mid) 40px,
                var(--amber) 40px,
                var(--amber) 44px,
                var(--brown-deep) 44px,
                var(--brown-deep) 80px
            );
            flex-shrink: 0;
        }

        .main-content {
            flex: 1;
            padding: 2.5rem 2rem;
            max-width: 1200px;
            margin: 0 auto;
            width: 100%;
        }

        /* Alert */
        .alert-success {
            background: #EBF5EC;
            border-left: 4px solid var(--sage);
            color: #2D5A30;
            padding: 1rem 1.25rem;
            border-radius: 6px;
            margin-bottom: 1.75rem;
            font-size: 0.9rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        /* Decorative bottom rule */
        .page-footer {
            text-align: center;
            padding: 1.5rem;
            font-size: 0.75rem;
            color: var(--brown-mid);
            letter-spacing: 0.1em;
            text-transform: uppercase;
            border-top: 1px solid var(--border);
            font-family: 'DM Sans', sans-serif;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar">
        <div style="max-width:1200px;margin:0 auto;padding:0 1.5rem;">
            <div style="display:flex;justify-content:space-between;align-items:center;height:70px;">
                <a href="{{ route('anggota.index') }}" class="navbar-brand">
                    <div class="brand-icon">📚</div>
                    <div>
                        <div style="font-size:1.25rem;line-height:1.2;">Pustaka</div>
                        <div style="font-size:0.65rem;letter-spacing:0.2em;color:var(--amber);font-family:'DM Sans',sans-serif;font-weight:400;text-transform:uppercase;">Manajemen Anggota</div>
                    </div>
                </a>
                <a href="{{ route('anggota.create') }}" class="btn-add">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                    Tambah Anggota
                </a>
            </div>
        </div>
    </nav>

    <!-- Page Body -->
    <div class="page-wrapper">
        <div class="sidebar-spine"></div>
        <div style="flex:1;padding:2.5rem 2rem;">
            <div style="max-width:1100px;margin:0 auto;">
                @if(session('success'))
                    <div class="alert-success">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
                        {{ session('success') }}
                    </div>
                @endif

                @yield('content')
            </div>
        </div>
    </div>

    <footer class="page-footer">
        &copy; {{ date('Y') }} &nbsp;·&nbsp; Sistem Manajemen Perpustakaan
    </footer>

</body>
</html>