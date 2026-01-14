<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class ProdukController extends Controller
{
    // tampilan semua produk
    public function index()
    {
        $produk = Produk::all();
        return view('produk.index', compact('produk'));
    }

    // form untuk tambah produk
    public function create()
    {
        return view('produk.create');
    }

    // simpan produk
    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric'
        ]);

        Produk::create($request->all());

        return redirect('/produk')->with('success', 'Produk berhasil ditambahkan');
    }

    // form edit
    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        return view('produk.edit', compact('produk'));
    }

    // update produk
    public function update(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);
        $produk->update($request->all());

        return redirect('/produk')->with('success', 'Produk berhasil diupdate');
    }

    // hapus produk
    public function destroy($id)
    {
        Produk::destroy($id);
        return redirect('/produk')->with('success', 'Produk berhasil dihapus');
    }
}
