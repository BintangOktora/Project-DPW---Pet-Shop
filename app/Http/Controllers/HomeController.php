<?php

namespace App\Http\Controllers;

use App\Models\Produk;

class HomeController extends Controller
{
    public function index()
    {
        // ambil produk terbaru (misalnya 6)
        $produk = Produk::latest()->take(6)->get();

        return view('home', compact('produk'));

        //paksa login
        if (!session('user_login')) {
            return redirect('/login');
        }

        return view('home');
    }

}
