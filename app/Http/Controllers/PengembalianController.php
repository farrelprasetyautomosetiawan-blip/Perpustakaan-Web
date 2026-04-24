<?php

namespace App\Http\Controllers;

use App\Models\Pengembalian;
use App\Models\peminjaman;
use Illuminate\Http\Request;

class PengembalianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengembalians = Pengembalian::with('peminjaman')->get();
        return view('pengembalian.index', compact('pengembalians'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $peminjamans = peminjaman::where('status', 'dipinjam')->get();
        $selectedPeminjamanId = request('peminjaman_id');
        return view('pengembalian.create', compact('peminjamans', 'selectedPeminjamanId'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'peminjaman_id' => 'required|exists:peminjamen,id',
            'tanggal_pengembalian' => 'required|date',
            'kondisi_buku' => 'required|in:baik,rusak,hilang',
            'denda' => 'nullable|numeric|min:0',
            'catatan' => 'nullable|string',
        ]);

        Pengembalian::create($request->all());

        // Update status peminjaman
        $peminjaman = peminjaman::find($request->peminjaman_id);
        $peminjaman->update(['status' => 'dikembalikan', 'tanggal_kembali' => $request->tanggal_pengembalian]);

        return redirect()->route('pengembalian.index')->with('success', 'Pengembalian berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pengembalian $pengembalian)
    {
        return view('pengembalian.show', compact('pengembalian'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengembalian $pengembalian)
    {
        return view('pengembalian.edit', compact('pengembalian'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pengembalian $pengembalian)
    {
        $request->validate([
            'peminjaman_id' => 'required|exists:peminjamen,id',
            'tanggal_pengembalian' => 'required|date',
            'kondisi_buku' => 'required|in:baik,rusak,hilang',
            'denda' => 'nullable|numeric|min:0',
            'catatan' => 'nullable|string',
        ]);

        $pengembalian->update($request->all());

        return redirect()->route('pengembalian.index')->with('success', 'Pengembalian berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengembalian $pengembalian)
    {
        $pengembalian->delete();
        return redirect()->route('pengembalian.index')->with('success', 'Pengembalian berhasil dihapus.');
    }
}
