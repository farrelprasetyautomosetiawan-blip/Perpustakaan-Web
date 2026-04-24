<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class peminjaman extends Model
{
    protected $table = 'peminjamen';

    protected $fillable = [
        'nama_peminjam',
        'email_peminjam',
        'no_telepon',
        'judul_buku',
        'pengarang',
        'isbn',
        'tanggal_peminjaman',
        'tanggal_kembali',
        'batas_pengembalian',
        'status',
        'catatan',
    ];

    protected $casts = [
        'tanggal_peminjaman' => 'date',
        'tanggal_kembali' => 'date',
        'batas_pengembalian' => 'date',
    ];
}
