<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index() {
        $title = 'Halaman Kategori';
        $kategori = Kategori::paginate(5);
        return view(view: '/kategori/list-kategori-page', data: compact('title', 'kategori'));
    }
    public function create() {
        $title = 'Halaman Tambah Kategori';
        $subTitle = 'Tambah Kategori';
        $action = 'store_kategori';
        return view(view: '/kategori/form-kategori-page', data: compact('title', 'subTitle', 'action'));
    }
    public function store(Request $request) {
        Kategori::create([
            'nama_kategori' => $request->nama_kategori
        ]);
        
        return redirect('/kategori')->with(['success' => 'Kategori berhasil disimpan']);
    }
    public function edit(Kategori $kateById) {
        $title = 'Halaman Edit Kategori';
        $subTitle = 'Edit Kategori';
        $action = 'update_kategori';
        return view(view: '/kategori/form-kategori-page', data: compact('title', 'subTitle', 'action', 'kateById'));
    }
    public function update(Request $request, Kategori $kateById) {
        $kateById->update([
            'nama_kategori' => $request->nama_kategori
        ]);
        
        return redirect('/kategori')->with(['success' => 'Kategori berhasil disimpan']);
    }
}
