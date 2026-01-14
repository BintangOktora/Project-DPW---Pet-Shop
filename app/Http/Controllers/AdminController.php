<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Produk;

class AdminController extends Controller
{
    //buat menampilkan form login admin
    public function loginForm()
    {
        return view('login_admin');
    }

    //proses login
    public function loginProcess(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $admin = Admin::where('username', $request->username)
            ->where('password', $request->password)
            ->first();

        if ($admin) {
            session([
                'admin_login' => true,
                'admin_username' => $admin->username
            ]);

            return redirect('/admin/produk');
        }

        return back()->with('error', 'Username atau Password salah');
    }

   //logout
    public function logout()
    {
        session()->forget('admin_login');
        session()->forget('admin_username');

        return redirect('/admin/login');
    }

   
    // buat kelola data produk
    public function produk()
    {
        if (!session('admin_login')) {
            return redirect('/admin/login');
        }

        $produk = Produk::all();
        return view('admin.produk', compact('produk'));
    }
}
