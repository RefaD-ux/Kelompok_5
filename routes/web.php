<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KosController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

// ✅ Route public
Route::get('/', [KosController::class, 'index'])->name('beranda');
Route::get('/filter', [KosController::class, 'filter'])->name('filter.kos');
Route::get('/cari-kos', [KosController::class, 'cariKos'])->name('cari.kos');

// ✅ Route untuk login/logout (hanya bisa diakses jika belum login)
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showRoleSelection'])->name('login');
    Route::get('/login/{role}', [LoginController::class, 'showLoginForm']);
    Route::post('/login', [LoginController::class, 'login'])->name('login.post');

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showRoleSelection'])->name('login');
    Route::get('/login/{role}', [LoginController::class, 'showLoginForm']);
    Route::post('/login', [LoginController::class, 'login'])->name('login.post');

    // Register langsung dari RegisterController
    Route::get('/register/pemilik', [RegisterController::class, 'showPemilikRegisterForm'])->name('register.pemilik');
    Route::post('/register/pemilik', [RegisterController::class, 'registerPemilik'])->name('register.pemilik.post');

    Route::get('/register/pencari', [RegisterController::class, 'showPencariRegisterForm'])->name('register.pencari');
    Route::post('/register/pencari', [RegisterController::class, 'registerPencari'])->name('register.pencari.post');
});

});

// ✅ Logout butuh auth
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

// ✅ Route favorit (hanya untuk user yang sudah login)
Route::middleware('auth')->group(function () {
    Route::post('/favorites/{kos}', [FavoriteController::class, 'toggle'])->name('favorites.toggle');
    Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites.index');
    Route::delete('/favorites/{kos}', [FavoriteController::class, 'destroy'])->name('favorites.destroy');

    
});
