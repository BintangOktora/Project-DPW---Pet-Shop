<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminProdukController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserLoginController;
use App\Http\Controllers\KeranjangController;


// =====================================================
// KERANJANG (CART) ROUTES
// =====================================================
Route::get('/keranjang', [KeranjangController::class, 'index']);
Route::post('/keranjang/add', [KeranjangController::class, 'store']);
Route::post('/keranjang/tambah/{id}', [KeranjangController::class, 'tambah']);
Route::post('/keranjang/kurang/{id}', [KeranjangController::class, 'kurang']);
Route::post('/keranjang/hapus/{id}', [KeranjangController::class, 'destroy']);
Route::post('/keranjang/checkout', [KeranjangController::class, 'checkout']);
Route::post('/keranjang/clear', [KeranjangController::class, 'clear']);

// =====================================================
// WISHLIST ROUTES
// =====================================================
Route::get('/wishlist', [\App\Http\Controllers\WishlistController::class, 'index']);
Route::post('/wishlist/add', [\App\Http\Controllers\WishlistController::class, 'store']);
Route::post('/wishlist/hapus/{id}', [\App\Http\Controllers\WishlistController::class, 'destroy']);


Route::get('/', [HomeController::class, 'index'])->name('home');

//buat register user
Route::get('/register', [UserController::class, 'create']);
Route::post('/register', [UserController::class, 'store']);


// buat kelola produk
Route::get('/admin/produk', [AdminProdukController::class, 'index']);
Route::post('/admin/produk/store', [AdminProdukController::class, 'store'])
    ->name('admin.produk.store');

Route::delete('/admin/produk/{id}', [AdminProdukController::class, 'destroy']);
Route::get('/admin/produk/{id}/edit', [AdminProdukController::class, 'edit']);
Route::post('/admin/produk/{id}/update', [AdminProdukController::class, 'update']);


// buat login admin
Route::get('/admin/login', [AdminController::class, 'loginForm']);
Route::post('/admin/login', [AdminController::class, 'loginProcess']);
Route::get('/admin/produk', [AdminController::class, 'produk']);

// buat LOGIN USER
Route::get('/login', [UserLoginController::class, 'loginForm']);
Route::post('/login', [UserLoginController::class, 'loginProcess']);
Route::get('/logout', [UserLoginController::class, 'logout']);

// buat PROFILE & GANTI PASSWORD
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index']);
Route::post('/profile/update', [App\Http\Controllers\ProfileController::class, 'update']);
Route::post('/profile/password', [App\Http\Controllers\ProfileController::class, 'changePassword']);
Route::post('/profile/delete', [App\Http\Controllers\ProfileController::class, 'destroy']);

//buat ke page About Us 
Route::get('/about', function () {
    return view('about');
});

// buat melihat Detail produk 
Route::get('/detail/{id}', [App\Http\Controllers\ProdukController::class, 'show']);

// buat ke page Makanan kucing
Route::get('/makanan-kucing', [App\Http\Controllers\ProdukController::class, 'kategori'])->defaults('nama_kategori', 'makanan-kucing');

// buat ke page Makanan Anjing
Route::get('/makanan-anjing', [App\Http\Controllers\ProdukController::class, 'kategori'])->defaults('nama_kategori', 'makanan-anjing');


Route::delete('/admin/produk/{id}', [AdminProdukController::class, 'destroy']);
Route::get('/admin/produk/{id}/edit', [AdminProdukController::class, 'edit']);
Route::post('/admin/produk/{id}/update', [AdminProdukController::class, 'update']);


