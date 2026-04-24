<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\DendaController;
use App\Http\Controllers\AnggotaController;

Route::get('/', function () {
    return view('welcome');
});

// Routes manual untuk CRUD Buku
Route::get('/buku', [BukuController::class, 'index'])->name('buku.index');
Route::get('/buku/create', [BukuController::class, 'create'])->name('buku.create');
Route::post('/buku', [BukuController::class, 'store'])->name('buku.store');
Route::get('/buku/{id}', [BukuController::class, 'show'])->name('buku.show');
Route::get('/buku/{id}/edit', [BukuController::class, 'edit'])->name('buku.edit');
Route::put('/buku/{id}', [BukuController::class, 'update'])->name('buku.update');
Route::delete('/buku/{id}', [BukuController::class, 'destroy'])->name('buku.destroy');

// Routes untuk Peminjaman CRUD
Route::resource('peminjaman', PeminjamanController::class);

// Routes untuk Pengembalian CRUD
Route::resource('pengembalian', PengembalianController::class);

// Routes untuk Denda CRUD
Route::resource('denda', DendaController::class);

// Route manual untuk CRUD Anggota
Route::get('/anggota', [AnggotaController::class, 'index'])->name('anggota.index');
Route::get('/anggota/create', [AnggotaController::class, 'create'])->name('anggota.create');
Route::post('/anggota', [AnggotaController::class, 'store'])->name('anggota.store');
Route::get('/anggota/{id}', [AnggotaController::class, 'show'])->name('anggota.show');
Route::get('/anggota/{id}/edit', [AnggotaController::class, 'edit'])->name('anggota.edit');
Route::put('/anggota/{id}', [AnggotaController::class, 'update'])->name('anggota.update');
Route::delete('/anggota/{id}', [AnggotaController::class, 'destroy'])->name('anggota.destroy');
