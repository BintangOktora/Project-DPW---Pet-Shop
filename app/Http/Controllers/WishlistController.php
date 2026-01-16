<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    /**
     * Tampilkan halaman wishlist
     */
    public function index()
    {
        if (!session('user_login')) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu');
        }

        $userId = session('user_id');
        $items = Wishlist::where('id_user', $userId)->get();

        return view('wishlist', [
            'items' => $items,
            'count' => $items->count()
        ]);
    }

    /**
     * Tambah item ke wishlist
     */
    public function store(Request $request)
    {
        if (!session('user_login')) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu untuk menyimpan ke wishlist');
        }

        $userId = session('user_id');

        // Cek apakah produk sudah ada di wishlist
        $existingItem = Wishlist::where('id_user', $userId)
            ->where('id_produk', $request->id_produk)
            ->first();

        if (!$existingItem) {
            Wishlist::create([
                'id_user' => $userId,
                'id_produk' => $request->id_produk,
                'nama_produk' => $request->nama_produk,
                'gambar_produk' => $request->gambar_produk,
                'harga' => $request->harga
            ]);
        }

        return redirect('/wishlist')->with('success', 'Produk berhasil ditambahkan ke wishlist!');
    }

    /**
     * Hapus item dari wishlist
     */
    public function destroy($id)
    {
        if (!session('user_login')) {
            return redirect('/login');
        }

        $userId = session('user_id');
        $item = Wishlist::where('id_wishlist', $id)
            ->where('id_user', $userId)
            ->first();

        if ($item) {
            $item->delete();
        }

        return redirect('/wishlist')->with('success', 'Produk dihapus dari wishlist');
    }
}
