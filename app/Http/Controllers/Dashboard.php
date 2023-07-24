<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function index() {
        $title = 'Dashboard Page';
        $totalBuku = Buku::count();
        $totalKategori = Kategori::count();
        $buku = Buku::all();
        $bukuBaru = $buku->fresh();
        return view(view: 'dashboard/dashboard-page', data: compact('title', 'totalBuku', 'totalKategori', 'bukuBaru'));
    }
}
