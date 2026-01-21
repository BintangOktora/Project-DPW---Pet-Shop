<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Checkout;

class CheckoutController extends Controller
{
    // menampilkan keranjang user
    public function index()
    {
        $checkout = Checkout::all();
        return view('checkout.index', compact('checkout'));
    }

    // tambah barang ke keranjang
    public function store(Request $request)
    {
        $total = $request->jumlah * $request->harga;

        Checkout::create([
            'id_user' => $request->id_user,
            'nama_produk' => $request->nama_produk,
            'jumlah' => $request->jumlah,
            'harga' => $request->harga,
            'total' => $total,
            'tgl_transaksi' => now()
        ]);

        return redirect()->back()->with('success', 'Produk ditambahkan ke keranjang');
    }

    // hapus item dari keranjang
    public function destroy($id)
    {
        Checkout::destroy($id);
        return redirect()->back()->with('success', 'Item dihapus dari keranjang');
    }
}
