<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
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
                'user_nama' => $user->nama_user
            ]);

            return redirect('/');
        }

        if ($user) {
            session([
                'user_login' => true,
                'user_nama' => $user->nama_user
            ]);

            return redirect('/');
        }

        return back()->with('error', 'Username atau Password salah');
    }

    // LOGOUT
    public function logout()
    {
        session()->forget('user_login');
        session()->forget('user_nama');

        return redirect('/');//logout balik ke home
    }
}
