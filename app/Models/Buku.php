<?php

namespace App\Models;

use App\Models\Kategori;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Buku extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'buku';
    protected $fillable = [ 'judul_buku','penulis_buku', 'tahun_terbit_buku', 'kategori_buku', 'deskripsi_buku', 'jumlah_buku',	'pdf_buku',	'cover_buku', 'created_at','updated_at'];
    
    public function kategori() {
        return $this->belongsTo(Kategori::class, 'kategori_buku', 'id');
    }
}
