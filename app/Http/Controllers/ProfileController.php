<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Keranjang;
use App\Models\Checkout;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        // Cek session login
        if (!session('user_login')) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu');
        }

        // Tampilkan halaman profil dengan data user
        $user = User::findOrFail(session('user_id'));
        return view('profile', compact('user'));
    }

    public function update(Request $request)
    {
        if (!session('user_login')) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu');
        }

        // Validasi input update profil
        $request->validate([
            'nama_user' => 'required|string|max:255',
            'no_hp' => 'required|string|max:20',
            'email' => 'required|email|max:255|unique:user,email,' . session('user_id') . ',id_user',
        ]);

        // Update data ke database
        $user = User::findOrFail(session('user_id'));
        $user->update([
            'nama_user' => $request->nama_user,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
        ]);

        // Perbarui nama di session
        session(['user_nama' => $user->nama_user]);

        return back()->with('success', 'Profil berhasil diperbarui');
    }

    public function changePassword(Request $request)
    {
        if (!session('user_login')) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu');
        }

        // Validasi input password
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ]);

        $user = User::findOrFail(session('user_id'));

        // Cek kesesuaian password lama
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Password saat ini salah']);
        }

        // Update password baru (di-hash)
        $user->update([
            'password' => Hash::make($request->new_password),
        ]);

        return back()->with('success', 'Password berhasil diubah');
    }
    public function destroy(Request $request)
    {
        if (!session('user_login')) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu');
        }

        $user = User::findOrFail(session('user_id'));

        // Hapus data terkait (Keranjang & Checkout) sebelum hapus akun
        Keranjang::where('id_user', $user->id_user)->delete();
        Checkout::where('id_user', $user->id_user)->delete();

        // Hapus akun user
        $user->delete();

        // Bersihkan session (logout)
        session()->flush();

        return redirect('/')->with('success', 'Akun Anda telah berhasil dihapus.');
    }
}
