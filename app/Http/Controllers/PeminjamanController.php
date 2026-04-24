<?php

namespace App\Http\Controllers;

use App\Models\peminjaman;
use App\Models\User;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjaman = peminjaman::latest()->paginate(10);
        return view('peminjaman.index', compact('peminjaman'));
    }

    public function create()
    {
        return view('peminjaman.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_peminjam' => 'required|string|max:255',
            'email_peminjam' => 'nullable|email|max:255',
            'no_telepon' => 'nullable|string|max:20',
            'judul_buku' => 'required|string|max:255',
            'pengarang' => 'required|string|max:255',
            'isbn' => 'nullable|string|max:20',
            'tanggal_peminjaman' => 'required|date',
            'batas_pengembalian' => 'required|date|after_or_equal:tanggal_peminjaman',
            'catatan' => 'nullable|string',
        ]);

        peminjaman::create($validated);

        return redirect()->route('peminjaman.index')
                        ->with('success', 'Data peminjaman berhasil ditambahkan');
    }

    public function show(peminjaman $peminjaman)
    {
        return view('peminjaman.show', compact('peminjaman'));
    }

    public function edit(peminjaman $peminjaman)
    {
        return view('peminjaman.edit', compact('peminjaman'));
    }

    public function update(Request $request, peminjaman $peminjaman)
    {
        $validated = $request->validate([
            'nama_peminjam' => 'required|string|max:255',
            'email_peminjam' => 'nullable|email|max:255',
            'no_telepon' => 'nullable|string|max:20',
            'judul_buku' => 'required|string|max:255',
            'pengarang' => 'required|string|max:255',
            'isbn' => 'nullable|string|max:20',
            'tanggal_peminjaman' => 'required|date',
            'tanggal_kembali' => 'nullable|date',
            'batas_pengembalian' => 'required|date|after_or_equal:tanggal_peminjaman',
            'status' => 'required|in:dipinjam,dikembalikan,hilang',
            'catatan' => 'nullable|string',
        ]);

        $peminjaman->update($validated);

        return redirect()->route('peminjaman.show', $peminjaman)
                        ->with('success', 'Data peminjaman berhasil diperbarui');
    }

    public function destroy(peminjaman $peminjaman)
    {
        $peminjaman->delete();

        return redirect()->route('peminjaman.index')
                        ->with('success', 'Data peminjaman berhasil dihapus');
    }
}
