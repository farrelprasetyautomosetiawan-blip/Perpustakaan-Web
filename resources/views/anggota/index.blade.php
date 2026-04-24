@extends('layouts.app')

@section('content')

<style>
    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
        margin-bottom: 1.75rem;
        padding-bottom: 1.25rem;
        border-bottom: 2px solid var(--border);
    }

    .page-title {
        font-family: 'Playfair Display', serif;
        font-size: 2rem;
        font-weight: 700;
        color: var(--brown-deep);
        line-height: 1.1;
    }

    .page-subtitle {
        font-size: 0.85rem;
        color: var(--brown-mid);
        margin-top: 4px;
        font-weight: 400;
    }

    .member-count-badge {
        background: var(--amber);
        color: var(--brown-deep);
        font-size: 0.75rem;
        font-weight: 700;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        padding: 0.35rem 0.85rem;
        border-radius: 20px;
    }

    /* Table card */
    .table-card {
        background: var(--warm-white);
        border: 1px solid var(--border);
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 2px 20px rgba(61,43,31,0.07), 0 1px 4px rgba(61,43,31,0.04);
    }

    .table-card table {
        width: 100%;
        border-collapse: collapse;
    }

    .table-card thead {
        background: var(--paper);
        border-bottom: 2px solid var(--border);
    }

    .table-card thead th {
        font-family: 'DM Sans', sans-serif;
        font-size: 0.7rem;
        font-weight: 600;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        color: var(--brown-mid);
        padding: 0.9rem 1.25rem;
        text-align: left;
    }

    .table-card tbody tr {
        border-bottom: 1px solid var(--border);
        transition: background 0.15s;
    }

    .table-card tbody tr:last-child { border-bottom: none; }

    .table-card tbody tr:hover { background: #F9F5EE; }

    .table-card tbody td {
        padding: 1rem 1.25rem;
        font-size: 0.875rem;
        color: var(--ink);
        vertical-align: middle;
    }

    .td-number {
        color: var(--brown-mid);
        font-size: 0.8rem;
        font-weight: 600;
        width: 48px;
    }

    .td-name {
        font-weight: 600;
        color: var(--brown-deep);
    }

    .td-badge {
        display: inline-block;
        background: var(--paper);
        border: 1px solid var(--border);
        border-radius: 4px;
        padding: 0.15rem 0.5rem;
        font-size: 0.78rem;
        color: var(--brown-mid);
        font-weight: 500;
    }

    /* Action buttons */
    .action-btns { display: flex; gap: 6px; align-items: center; }

    .btn-detail, .btn-edit, .btn-delete {
        font-size: 0.75rem;
        font-weight: 600;
        letter-spacing: 0.05em;
        padding: 0.3rem 0.75rem;
        border-radius: 5px;
        border: 1.5px solid;
        cursor: pointer;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 4px;
        transition: all 0.15s;
        font-family: 'DM Sans', sans-serif;
    }

    .btn-detail {
        background: transparent;
        border-color: #5B7FA0;
        color: #5B7FA0;
    }
    .btn-detail:hover { background: #5B7FA0; color: white; }

    .btn-edit {
        background: transparent;
        border-color: var(--amber);
        color: var(--amber);
    }
    .btn-edit:hover { background: var(--amber); color: var(--brown-deep); }

    .btn-delete {
        background: transparent;
        border-color: #C0392B;
        color: #C0392B;
    }
    .btn-delete:hover { background: #C0392B; color: white; }

    /* Empty state */
    .empty-state {
        padding: 4rem 2rem;
        text-align: center;
        color: var(--brown-mid);
    }
    .empty-state-icon { font-size: 3rem; margin-bottom: 1rem; opacity: 0.5; }
    .empty-state p { font-size: 0.95rem; }

    /* Pagination */
    .pagination-wrapper {
        padding: 1rem 1.25rem;
        background: var(--paper);
        border-top: 1px solid var(--border);
        display: flex;
        justify-content: center;
        font-size: 0.85rem;
    }
</style>

<div class="page-header">
    <div>
        <div class="page-title">Daftar Anggota</div>
        <div class="page-subtitle">Kelola seluruh data anggota perpustakaan</div>
    </div>
    <span class="member-count-badge">{{ $anggota->total() }} Anggota</span>
</div>

<div class="table-card">
    <div style="overflow-x:auto;">
        <table>
            <thead>
                <tr>
                    <th class="td-number">#</th>
                    <th>Nama Lengkap</th>
                    <th>Nomor Induk</th>
                    <th>Jurusan</th>
                    <th>Email</th>
                    <th>No. Telepon</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($anggota as $key => $item)
                <tr>
                    <td class="td-number">
                        {{ $loop->iteration + ($anggota->currentPage() - 1) * $anggota->perPage() }}
                    </td>
                    <td class="td-name">{{ $item->nama_lengkap }}</td>
                    <td><span class="td-badge">{{ $item->nomor_induk }}</span></td>
                    <td>{{ $item->jurusan }}</td>
                    <td style="color:var(--brown-mid);">{{ $item->email }}</td>
                    <td>{{ $item->no_telepon }}</td>
                    <td>
                        <div class="action-btns">
                            <a href="{{ route('anggota.show', $item->id) }}" class="btn-detail">
                                <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                                Detail
                            </a>
                            <a href="{{ route('anggota.edit', $item->id) }}" class="btn-edit">
                                <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                                Edit
                            </a>
                            <form action="{{ route('anggota.destroy', $item->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete"
                                        onclick="return confirm('Yakin ingin menghapus data anggota ini?')">
                                    <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/><path d="M10 11v6M14 11v6"/></svg>
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7">
                        <div class="empty-state">
                            <div class="empty-state-icon">📭</div>
                            <p>Belum ada data anggota terdaftar.</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="pagination-wrapper">
        {{ $anggota->links() }}
    </div>
</div>

@endsection