<?php // Controller buat register USER

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // untuk tampilan form register
    public function create()
    {
        return view('register');
    }

    // untuk menyimpan user ke database
    public function store(Request $request)
    {
        $request->validate([
            'nama_user' => 'required',
            'no_hp' => 'required',
            'email' => 'required|email'
        ]);

        User::create([
            'nama_user' => $request->nama_user,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->back()->with('success', 'Register berhasil');
    }
}
