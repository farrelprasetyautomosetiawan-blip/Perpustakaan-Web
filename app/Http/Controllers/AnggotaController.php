<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    // Menampilkan daftar anggota
    public function index()
    {
        $anggota = Anggota::latest()->paginate(10);
        return view('anggota.index', compact('anggota'));
    }

    // Menampilkan form tambah anggota
    public function create()
    {
        return view('anggota.create');
    }

    // Menyimpan data anggota baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|min:3|max:100',
            'nomor_induk' => 'required|unique:anggotas|max:50',
            'jurusan' => 'required|max:100',
            'email' => 'required|email|unique:anggotas',
            'no_telepon' => 'required|max:15'
        ]);

        Anggota::create($request->all());

        return redirect()->route('anggota.index')
            ->with('success', 'Anggota berhasil ditambahkan!');
    }

    // Menampilkan detail anggota
    public function show($id)
    {
        $anggota = Anggota::findOrFail($id);
        return view('anggota.show', compact('anggota'));
    }

    // Menampilkan form edit anggota
    public function edit($id)
    {
        $anggota = Anggota::findOrFail($id);
        return view('anggota.edit', compact('anggota'));
    }

    // Mengupdate data anggota
    public function update(Request $request, $id)
    {
        $anggota = Anggota::findOrFail($id);

        $request->validate([
            'nama_lengkap' => 'required|min:3|max:100',
            'nomor_induk' => 'required|max:50|unique:anggotas,nomor_induk,' . $id,
            'jurusan' => 'required|max:100',
            'email' => 'required|email|unique:anggotas,email,' . $id,
            'no_telepon' => 'required|max:15'
        ]);

        $anggota->update($request->all());

        return redirect()->route('anggota.index')
            ->with('success', 'Anggota berhasil diupdate!');
    }

    // Menghapus data anggota
    public function destroy($id)
    {
        $anggota = Anggota::findOrFail($id);
        $anggota->delete();

        return redirect()->route('anggota.index')
            ->with('success', 'Anggota berhasil dihapus!');
    }
}