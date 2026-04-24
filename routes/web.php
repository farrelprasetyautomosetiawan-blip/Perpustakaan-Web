<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeminjamanController;

Route::get('/', function () {
    return view('welcome');
});

// Routes untuk Peminjaman CRUD
Route::resource('peminjaman', PeminjamanController::class);
