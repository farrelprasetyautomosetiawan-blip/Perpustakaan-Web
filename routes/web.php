<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengembalianController;

Route::get('/', function () {
    return view('welcome');
});

// Routes untuk Peminjaman CRUD
Route::resource('peminjaman', PeminjamanController::class);

// Routes untuk Pengembalian CRUD
Route::resource('pengembalian', PengembalianController::class);
