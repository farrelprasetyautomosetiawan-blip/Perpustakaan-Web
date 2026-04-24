<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    protected $fillable = [
        'peminjaman_id',
        'tanggal_pengembalian',
        'kondisi_buku',
        'denda',
        'catatan',
    ];

    protected $casts = [
        'tanggal_pengembalian' => 'date',
        'denda' => 'decimal:2',
    ];

    public function peminjaman()
    {
        return $this->belongsTo(peminjaman::class);
    }
}
