<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminProdukController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserLoginController;


Route::get('/', [HomeController::class, 'index'])->name('home');

//buat register user
Route::get('/register', [UserController::class, 'create']);
Route::post('/register', [UserController::class, 'store']);

//login admin & user
Route::get('/login', [AdminController::class, 'loginForm']);
Route::post('/login', [AdminController::class, 'loginProcess']);

// ADMIN PRODUK
Route::get('/admin/produk', [AdminProdukController::class, 'index']);
Route::post('/admin/produk/store', [AdminProdukController::class, 'store'])
    ->name('admin.produk.store');


//login admin
Route::get('/admin/login', [AdminController::class, 'loginForm']);
Route::post('/admin/login', [AdminController::class, 'loginProcess']);
Route::get('/admin/produk', [AdminController::class, 'produk']);

//LOGIN USER
Route::get('/login', [UserLoginController::class, 'loginForm']);
Route::post('/login', [UserLoginController::class, 'loginProcess']);
Route::get('/logout', [UserLoginController::class, 'logout']);


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

