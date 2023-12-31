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
        Schema::create('buku', function (Blueprint $table) {
            $table->id();
            $table->string('judul_buku');
            $table->string('penulis_buku');
            $table->string('tahun_terbit_buku');
            $table->integer('kategori_buku');
            $table->string('deskripsi_buku');
            $table->string('jumlah_buku');
            $table->string('pdf_buku');
            $table->string('cover_buku');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buku');
    }
};
