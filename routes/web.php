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

//buat ke page About Us 
Route::get('/about', function () {
    return view('about');
});

// buat melihat Detail produk 
Route::get('/detail', function () {
    return view('detail');
});

// buat ke page Makanan kucing
Route::get('/makanan-kucing', function () {
    return view('makanan_kucing');
});

Route::get('/makanan-kucing2', function () {
    return view('makanan_kucing2');
});

Route::get('/makanan-kucing3', function () {
    return view('makanan_kucing3');
});

// buat ke page Makanan Anjing
Route::get('/makanan-anjing', function () {
    return view('makanan_anjing'); 
});

Route::get('/makanan-anjing2', function () {
    return view('makanan_anjing2'); 
});

Route::get('/makanan-anjing3', function () {
    return view('makanan_anjing3'); 
});

Route::delete('/admin/produk/{id}', [AdminProdukController::class, 'destroy']);
Route::get('/admin/produk/{id}/edit', [AdminProdukController::class, 'edit']);
Route::post('/admin/produk/{id}/update', [AdminProdukController::class, 'update']);


// Route::get('/', [HomeController::class, 'index'])->name('home');

// // USER
// Route::get('/register', [UserController::class, 'create']);
// Route::post('/register', [UserController::class, 'store']);

// // ADMIN LOGIN
// Route::get('/admin/login', [AdminController::class, 'loginForm']);
// Route::post('/admin/login', [AdminController::class, 'loginProcess']);
// Route::get('/admin/logout', [AdminController::class, 'logout']);

// // ADMIN PRODUK
// Route::get('/admin/produk', [AdminController::class, 'produk']);
// Route::post('/admin/produk/store', [AdminProdukController::class, 'store'])
//     ->name('admin.produk.store');

// Route::get('/login', function () {
//     return view('login_user');
// });

// Route::post('/login', [LoginController::class, 'process']);

