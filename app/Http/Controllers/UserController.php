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

    // Untuk menyimpan user ke database
    public function store(Request $request)
    {
        // Validasi ke database untuk input dari form register 
        $request->validate([
            'nama_user' => 'required|unique:user,nama_user',
            'no_hp' => 'required|unique:user,no_hp',
            'email' => 'required|email|unique:user,email'
        ], [
            'nama_user.unique' => 'Nama ini sudah digunakan, silakan pilih nama lain.',
            'no_hp.unique' => 'Nomor HP ini sudah terdaftar.',
            'email.unique' => 'Email ini sudah terdaftar.'
        ]);

        // Untuk user baru di database dengan password yang di-hash
        User::create([
            'nama_user' => $request->nama_user,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Register berhasil');
    }
}
