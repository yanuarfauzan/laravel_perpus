<?php

use App\Models\Buku;
use App\Models\User;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Authen;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\BukuController;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
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
Route::get('/login', [Authen::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [Authen::class, 'is_login'])->middleware('guest');
Route::get('/register', [Authen::class, 'register'])->middleware('guest');
Route::post('/is_register', [Authen::class, 'is_register'])->middleware('guest');
Route::get('/logout', [Authen::class, 'logout']);

// FORGOT PASSWORD
Route::get('/forgot-password', function () {
    return view('auth/forgot-password-page');
})->middleware('guest')->name('password.request');

Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);
 
    $status = Password::sendResetLink(
        $request->only('email')
    );
 
    return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($status)])
                : back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');

Route::get('/reset-password/{token}', function (string $token) {
    return view('auth/reset-password-page', ['token' => $token]);
})->middleware('guest')->name('password.reset');


Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);
 
    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function (User $user, string $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));
 
            $user->save();
 
            event(new PasswordReset($user));
        }
    );
 
    return $status === Password::PASSWORD_RESET
                ? redirect()->route('login')->with('status', __($status))
                : back()->withErrors(['email' => [__($status)]]);
})->middleware('guest')->name('password.update');

// END FORGOT PASSWORD

Route::group(['middleware' => ['web']], function () {
    
    // DASHBOARD
Route::get('/dashboard', [Dashboard::class, 'index'])->middleware('auth');

    // BUKU
    Route::get('/buku', [BukuController::class, 'index'])->middleware('auth');
Route::get('/search_buku/{keyword}', [BukuController::class, 'search'])->middleware('auth');
Route::get('/detail_buku/{bukuById}', [BukuController::class, 'detail_buku'])->middleware('auth');
Route::get('/create_buku', [BukuController::class, 'create'])->middleware('auth')->middleware('must-admin');
Route::post('/store_buku', [BukuController::class, 'store'])->middleware('auth');
Route::get('/edit_buku/{bukuById}', [BukuController::class, 'edit'])->middleware('auth');
Route::put('/update_buku/{bukuById}', [BukuController::class, 'update'])->middleware('auth');
Route::get('/deleted_buku', [BukuController::class, 'deleted_buku'])->middleware('auth');
Route::get('/buku/{bukuById}/restore', [BukuController::class, 'restore_buku'])->middleware('auth');
Route::get('/delete_buku/{bukuById}', function($bukuById) {
    $buku = Buku::findOrFail($bukuById);
    $buku->destroy($buku->id);
    return redirect('buku')->with(['success' => 'Buku telah terhapus']);
})->middleware('auth');

// KATEGORI
Route::get('/kategori', [KategoriController::class, 'index'])->middleware('auth');
Route::get('/create_kategori', [KategoriController::class, 'create'])->middleware('auth')->middleware('must-admin');
Route::post('/store_kategori', [KategoriController::class, 'store'])->middleware('auth');
Route::get('/edit_kategori/{kateById}', [KategoriController::class, 'edit'])->middleware('auth');
Route::put('/update_kategori/{kateById}', [KategoriController::class, 'update'])->middleware('auth');
Route::get('/deleted_kategori', [KategoriController::class, 'deleted_kategori'])->middleware('auth');
Route::get('/kategori/{kateById}/restore', [KategoriController::class, 'restore_kategori'])->middleware('auth');
Route::get('/delete_kategori/{kateById}', function($kateById) {
    $kategori = Kategori::findOrFail($kateById);
    $kategori->destroy($kategori->id);
    return redirect('kategori')->with(['success' => 'Kategori telah terhapus']);
})->middleware('auth');

});