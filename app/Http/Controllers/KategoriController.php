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
    public function edit($kateById) {
        $kategori = Kategori::findOrFail($kateById);
        $title = 'Halaman Edit Kategori';
        $subTitle = 'Edit Kategori';
        $action = 'update_kategori';
        return view(view: '/kategori/form-kategori-page', data: compact('title', 'subTitle', 'action', 'kategori'));
    }
    public function update(Request $request, $kateById) {
        $kategori = Kategori::findOrFail($kateById);
        $kategori->update([
            'nama_kategori' => $request->nama_kategori
        ]);
        
        return redirect('/kategori')->with(['success' => 'Kategori berhasil disimpan']);
    }

    public function deleted_kategori() {
        $deletedKategori = Kategori::onlyTrashed()->paginate(10);
        $title = 'Halaman Kategori Terhapus';
        return view(view: '/kategori/deleted-kategori-page', data: compact('title', 'deletedKategori'));
    }
    public function restore_kategori($kateById) {
        $restoredKategori = Kategori::withTrashed()->where('id', $kateById)->restore();
        return redirect()->to('/kategori')->with(['success' => 'Katagori berhasil dikembalikan']);
    }
    
}
