<?php

use App\Models\Buku;
use App\Models\Kategori;
use App\Http\Controllers\Authen;
use App\Http\Controllers\Dashboard;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// AUTH
Route::get('/login', [Authen::class, 'login']);
Route::post('/login', [Authen::class, 'is_login']);
Route::get('/register', [Authen::class, 'register']);
Route::post('/register', [Authen::class, 'is_register']);

// DASHBOARD
Route::get('/dashboard', [Dashboard::class, 'index']);

// BUKU
Route::get('/buku', [BukuController::class, 'index']);
Route::get('/search_buku/{keyword}', [BukuController::class, 'search']);
Route::get('/detail_buku/{bukuById}', [BukuController::class, 'detail_buku']);
Route::get('/create_buku', [BukuController::class, 'create']);
Route::post('/store_buku', [BukuController::class, 'store']);
Route::get('/edit_buku/{bukuById}', [BukuController::class, 'edit']);
Route::put('/update_buku/{bukuById}', [BukuController::class, 'update']);
Route::get('/delete_buku/{bukuById}', function(Buku $bukuById) {
    Buku::destroy($bukuById->id);
    return redirect('buku')->with(['success' => 'Buku telah terhapus']);
});

// KATEGORI
Route::get('/kategori', [KategoriController::class, 'index']);
Route::get('/create_kategori', [KategoriController::class, 'create']);
Route::post('/store_kategori', [KategoriController::class, 'store']);
Route::get('/edit_kategori/{kateById}', [KategoriController::class, 'edit']);
Route::put('/update_kategori/{kateById}', [KategoriController::class, 'update']);
Route::get('/delete_kategori/{kateById}', function(Kategori $kateById) {
    Kategori::destroy($kateById->id);
    return redirect('kategori')->with(['success' => 'Kategori telah terhapus']);
});

