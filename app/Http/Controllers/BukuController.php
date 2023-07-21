<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index() {
        $title = 'Halaman Buku';
        $buku = Buku::with('kategori')->paginate(5);
        return view('buku/list-buku-page', compact(['title', 'buku']));
    }
}
