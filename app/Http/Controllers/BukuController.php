<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BukuController extends Controller
{
    public function index() {
        $title = 'Halaman Buku';
        $kategori = Kategori::all();
        $buku = Buku::with('kategori')->paginate(10);
        return view(view: 'buku/list-buku-page', data: compact('title', 'buku', 'kategori'));
    }   
    public function detail_buku($bukuById) {
        $title = 'Halaman Detail Buku';
        $buku = Buku::findOrFail($bukuById);
        // Buku::where('id', $bukuById)->with('kategori');
        return view(view: 'buku/detail-buku-page', data: compact('title', 'buku'));
    }
    public function create() {
        $title = 'Halaman Tambah Buku';
        $subTitle = 'Tambah Buku';
        $action = 'store_buku';
        $kategori = Kategori::all();
        return view(view: 'buku/form-buku-page', data: compact('title', 'subTitle', 'action', 'kategori'));
    }
    public function store(Request $request) {

        $validator = Validator::make($request->all(), [
            'judul_buku' => 'required',
            'penulis_buku' => 'required',
            'tahun_terbit_buku' => 'required|numeric',
            'kategori_buku' => 'required',
            'deskripsi_buku' => 'required',
            'jumlah_buku' => 'required|numeric',
            'pdf_buku' => 'required|file|mimes:pdf',
            'cover_buku' => 'required|mimes:jpg,jpeg,png',
        ], [
            '*.required'  => 'inputan wajib diisi.',
            'tahun_terbit_buku.numeric' => 'inputan harus berupa angka',
            'jumlah_buku.numeric' => 'inputan harus berupa angka',
            'pdf_buku.mimes' => 'File harus berupa pdf', 
            'cover_buku.mimes' => 'File harus berupa jpeg, png' 
        ]);
    
        if ($validator->fails()) {
            return redirect('/create_buku')
                ->withErrors($validator)
                ->withInput();
        } 

        $cover_buku = $request->file('cover_buku');
        $image_extension = $cover_buku->extension();
        $image_name = date('ymdhis') .'.'. $image_extension;
        $cover_buku->move(public_path('image'), $image_name);

        
        $pdf_buku = $request->file('pdf_buku');
        $file_extension = $pdf_buku->extension();
        $file_name = date('ymdhis') .'.'. $file_extension;
        $pdf_buku->move(public_path('pdf_buku'), $file_name);

        Buku::create([
            'judul_buku' => $request->judul_buku,
            'penulis_buku' => $request->penulis_buku,
            'tahun_terbit_buku' => $request->tahun_terbit_buku,
            'kategori_buku' => $request->kategori_buku,
            'deskripsi_buku' => $request->deskripsi_buku,
            'jumlah_buku' => $request->jumlah_buku,
            'pdf_buku' => $file_name,
            'cover_buku' => $image_name,
        ]);


        return redirect('/buku')->with(['success' => 'Buku berhasil disimpan']);
    }
    public function edit($bukuById) {
        $buku = Buku::findOrFail($bukuById);
        $title = 'Halaman Edit Buku';
        $subTitle = 'Edit Buku';
        $action = 'update_buku';
        $kategori = Kategori::all();

        return view(view: 'buku/form-buku-page', data: compact('title', 'subTitle', 'action', 'kategori', 'buku'));
    }
    public function update(Request $request, $bukuById)
    {
        $validator = Validator::make($request->all(), [
            'judul_buku' => 'required',
            'penulis_buku' => 'required',
            'tahun_terbit_buku' => 'required|numeric',
            'kategori_buku' => 'required',
            'deskripsi_buku' => 'required',
            'jumlah_buku' => 'required|numeric',
            'pdf_buku' => 'required|file|mimes:pdf',
            'cover_buku' => 'required|mimes:jpg,jpeg,png',
        ], [
            '*.required'  => 'inputan wajib diisi.',
            'tahun_terbit_buku.numeric' => 'inputan harus berupa angka',
            'jumlah_buku.numeric' => 'inputan harus berupa angka',
            'pdf_buku.mimes' => 'File harus berupa pdf', 
            'cover_buku.mimes' => 'File harus berupa jpeg, png' 
        ]);

        $buku = Buku::findOrFail($bukuById);
    
        if ($validator->fails()) {
            return redirect('/edit_buku/' . $buku->id)
                ->withErrors($validator);
        } 

        $cover_buku = $request->file('cover_buku');
        $image_extension = $cover_buku->extension();
        $image_name = date('ymdhis') .'.'. $image_extension;
        $cover_buku->move(public_path('image'), $image_name);

        
        $pdf_buku = $request->file('pdf_buku');
        $file_extension = $pdf_buku->extension();
        $file_name = date('ymdhis') .'.'. $file_extension;
        $pdf_buku->move(public_path('pdf_buku'), $file_name);


        $buku->update([
            'judul_buku' => $request->judul_buku,
            'penulis_buku' => $request->penulis_buku,
            'tahun_terbit_buku' => $request->tahun_terbit_buku,
            'kategori_buku' => $request->kategori_buku,
            'deskripsi_buku' => $request->deskripsi_buku,
            'jumlah_buku' => $request->jumlah_buku,
            'pdf_buku' => $file_name,
            'cover_buku' => $image_name,
        ]);

        return redirect('/buku')->with(['success' => 'Buku berhasil diubah']);
    }

    public function search(Request $request, $keyword) {
        $title = 'Halaman Buku';
        $buku = Buku::whereHas('kategori', function ($query) use ($keyword) {
            $query->where('nama_kategori', $keyword);
        })->paginate(10);
        $kategori = Kategori::all();
        return view('/buku/list-buku-page', compact('buku', 'kategori', 'title'));
    }

    public function deleted_buku() {
        $title = 'Halaman Buku Terhapus';
        $deletedBuku = Buku::onlyTrashed()->paginate(10);
        $kategori = Kategori::onlyTrashed()->get();
        return view(view: 'buku/deleted-buku-page', data: compact('deletedBuku', 'title', 'kategori'));
    }
    public function restore_buku($bukuById) {
        $deletedBuku = Buku::withTrashed()->where('id', $bukuById)->restore();
        return redirect()->to('buku')->with(['success' => 'Buku berhasil dikembalikan.']);
    }
}
