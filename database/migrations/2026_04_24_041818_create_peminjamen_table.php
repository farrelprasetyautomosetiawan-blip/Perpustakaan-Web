<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('peminjamen', function (Blueprint $table) {
            $table->id();
            $table->string('nama_peminjam');
            $table->string('email_peminjam')->nullable();
            $table->string('no_telepon')->nullable();
            $table->string('judul_buku');
            $table->string('pengarang');
            $table->string('isbn')->nullable();
            $table->date('tanggal_peminjaman');
            $table->date('tanggal_kembali')->nullable();
            $table->date('batas_pengembalian');
            $table->enum('status', ['dipinjam', 'dikembalikan', 'hilang'])->default('dipinjam');
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjamen');
    }
};
