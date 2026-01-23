<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;


class UserLoginController extends Controller
{

    // buat menampilkan form login
    public function loginForm()
    {
        return view('login');
    }



    // buat proses login
    public function loginProcess(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('nama_user', $request->username)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            session([
                'user_login' => true,
                'user_id' => $user->id_user,
                'user_nama' => $user->nama_user
            ]);


            return redirect('/')->with('success', 'login berhasil');
        }

        //proses login admin
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

    // LOGOUT
    public function logout()
    {
        session()->forget('user_login');
        session()->forget('user_id');
        session()->forget('user_nama');

        return redirect('/');//logout balik ke home
    }
}
