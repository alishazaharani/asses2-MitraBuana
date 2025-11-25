<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Barang;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;


Route::get('/search', [BarangController::class, 'search'])->name('search');
Route::get('/search-autocomplete', [BarangController::class, 'autocomplete'])->name('search.autocomplete');
Route::get('/search-preview', [BarangController::class, 'searchPreview']);
Route::get('/', [BarangController::class, 'index'])->name('home');
Route::get('/login', function () {
    return view('login');
});
Route::get('/', [BarangController::class, 'home'])->name('home');
// Halaman dashboard admin
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');


Route::get('/profile', function() {
    return view('profile'); // buat view profile.blade.php
})->name('profile')->middleware('auth');


// Resource route untuk CRUD barang
Route::resource('/admin/barang', BarangController::class);
Route::resource('admin/kategori', KategoriController::class)->names([
    'index' => 'kategori.index',
    'create' => 'kategori.create',
    'store' => 'kategori.store',
    'edit' => 'kategori.edit',
    'update' => 'kategori.update',
    'destroy' => 'kategori.destroy',
]);

// Route untuk proses login

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');  

Route::get('/about', function () {
    return view('about');
})->name('about');
Route::get('/barang/{id}', [BarangController::class, 'show'])->name('barang.show');
