<?php

namespace App\Http\Controllers;

use App\Models\Pengembalian;
use App\Models\peminjaman;
use Illuminate\Http\Request;

class DendaController extends Controller
{
    public function index()
    {
        $dendas = Pengembalian::with('peminjaman')->latest()->paginate(10);
        return view('denda.index', compact('dendas'));
    }

    public function create()
    {
        $peminjamans = peminjaman::where('status', 'dipinjam')->get();
        return view('denda.create', compact('peminjamans'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'peminjaman_id' => 'required|exists:peminjamen,id',
            'tanggal_pengembalian' => 'required|date',
            'kondisi_buku' => 'required|in:baik,rusak,hilang',
            'denda' => 'nullable|numeric|min:0',
            'catatan' => 'nullable|string',
        ]);

        Pengembalian::create($validated);

        $peminjaman = peminjaman::find($validated['peminjaman_id']);
        if ($peminjaman) {
            $peminjaman->update([
                'status' => 'dikembalikan',
                'tanggal_kembali' => $validated['tanggal_pengembalian'],
            ]);
        }

        return redirect()->route('denda.index')->with('success', 'Data denda berhasil ditambahkan.');
    }

    public function show(Pengembalian $denda)
    {
        return view('denda.show', compact('denda'));
    }

    public function edit(Pengembalian $denda)
    {
        return view('denda.edit', compact('denda'));
    }

    public function update(Request $request, Pengembalian $denda)
    {
        $validated = $request->validate([
            'peminjaman_id' => 'required|exists:peminjamen,id',
            'tanggal_pengembalian' => 'required|date',
            'kondisi_buku' => 'required|in:baik,rusak,hilang',
            'denda' => 'nullable|numeric|min:0',
            'catatan' => 'nullable|string',
        ]);

        $oldPeminjamanId = $denda->peminjaman_id;
        $newPeminjamanId = $validated['peminjaman_id'];

        $denda->update($validated);

        if ($oldPeminjamanId !== $newPeminjamanId) {
            $oldPeminjaman = peminjaman::find($oldPeminjamanId);
            if ($oldPeminjaman) {
                $oldPeminjaman->update(['status' => 'dipinjam', 'tanggal_kembali' => null]);
            }

            $newPeminjaman = peminjaman::find($newPeminjamanId);
            if ($newPeminjaman) {
                $newPeminjaman->update(['status' => 'dikembalikan', 'tanggal_kembali' => $validated['tanggal_pengembalian']]);
            }
        } else {
            $peminjaman = peminjaman::find($newPeminjamanId);
            if ($peminjaman) {
                $peminjaman->update(['status' => 'dikembalikan', 'tanggal_kembali' => $validated['tanggal_pengembalian']]);
            }
        }

        return redirect()->route('denda.index')->with('success', 'Data denda berhasil diperbarui.');
    }

    public function destroy(Pengembalian $denda)
    {
        $peminjaman = $denda->peminjaman;
        $denda->delete();

        if ($peminjaman) {
            $peminjaman->update(['status' => 'dipinjam', 'tanggal_kembali' => null]);
        }

        return redirect()->route('denda.index')->with('success', 'Data denda berhasil dihapus.');
    }
}
