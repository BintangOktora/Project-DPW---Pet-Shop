<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        if (!session('user_login')) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu');
        }

        $user = User::findOrFail(session('user_id'));
        return view('profile', compact('user'));
    }

    public function update(Request $request)
    {
        if (!session('user_login')) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu');
        }

        $request->validate([
            'nama_user' => 'required|string|max:255',
            'no_hp' => 'required|string|max:20',
            'email' => 'required|email|max:255|unique:user,email,' . session('user_id') . ',id_user',
        ]);

        $user = User::findOrFail(session('user_id'));
        $user->update([
            'nama_user' => $request->nama_user,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
        ]);

        // Update session name if changed
        session(['user_nama' => $user->nama_user]);

        return back()->with('success', 'Profil berhasil diperbarui');
    }

    public function changePassword(Request $request)
    {
        if (!session('user_login')) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu');
        }

        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ]);

        $user = User::findOrFail(session('user_id'));

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Password saat ini salah']);
        }

        $user->update([
            'password' => Hash::make($request->new_password),
        ]);

        return back()->with('success', 'Password berhasil diubah');
    }
}
