<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    protected $table = 'buku';
    protected $fillable = [ 'judul_buku', 'kategori_buku', 'deskripsi_buku', 'jumlah_buku',	'pdf_buku',	'cover_buku', 'created_at','updated_at'];
    
    public function kategori() {
        return $this->belongsTo(Kategori::class, 'kategori_buku', 'id');
    }
}
