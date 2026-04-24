<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    // Menampilkan daftar buku
    public function index()
    {
        $buku = Buku::latest()->paginate(10);
        return view('buku.index', compact('buku'));
    }

    // Menampilkan form tambah buku
    public function create()
    {
        return view('buku.create');
    }

    // Menyimpan data buku baru
    public function store(Request $request)
    {
        $request->validate([
            'kode_buku' => 'required|unique:bukus|max:20',
            'judul' => 'required|min:3|max:200',
            'penulis' => 'required|max:100',
            'penerbit' => 'required|max:100',
            'tahun_terbit' => 'required|integer|min:1900|max:'.date('Y'),
            'isbn' => 'nullable|max:20',
            'jumlah_halaman' => 'required|integer|min:1',
            'deskripsi' => 'nullable',
            'kategori' => 'required|max:50',
            'stok' => 'required|integer|min:0',
            'rak' => 'nullable|max:20'
        ]);

        Buku::create($request->all());

        return redirect()->route('buku.index')
            ->with('success', 'Buku berhasil ditambahkan!');
    }

    // Menampilkan detail buku
    public function show($id)
    {
        $buku = Buku::findOrFail($id);
        return view('buku.show', compact('buku'));
    }

    // Menampilkan form edit buku
    public function edit($id)
    {
        $buku = Buku::findOrFail($id);
        return view('buku.edit', compact('buku'));
    }

    // Mengupdate data buku
    public function update(Request $request, $id)
    {
        $buku = Buku::findOrFail($id);

        $request->validate([
            'kode_buku' => 'required|max:20|unique:bukus,kode_buku,' . $id,
            'judul' => 'required|min:3|max:200',
            'penulis' => 'required|max:100',
            'penerbit' => 'required|max:100',
            'tahun_terbit' => 'required|integer|min:1900|max:'.date('Y'),
            'isbn' => 'nullable|max:20',
            'jumlah_halaman' => 'required|integer|min:1',
            'deskripsi' => 'nullable',
            'kategori' => 'required|max:50',
            'stok' => 'required|integer|min:0',
            'rak' => 'nullable|max:20'
        ]);

        $buku->update($request->all());

        return redirect()->route('buku.index')
            ->with('success', 'Buku berhasil diupdate!');
    }

    // Menghapus data buku
    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);
        $buku->delete();

        return redirect()->route('buku.index')
            ->with('success', 'Buku berhasil dihapus!');
    }
}