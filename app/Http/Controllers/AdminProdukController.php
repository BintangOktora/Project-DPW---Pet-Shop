<?php

namespace App\Http\Controllers; //controller untuk mode admin mengatur produk (CRUD admin)

use App\Models\Produk;
use Illuminate\Http\Request;

class AdminProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::all();
        return view('admin.produk', compact('produk'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required',
            'kategori' => 'required',
            'harga_produk' => 'required|numeric',
            'stok' => 'required|numeric',
            'gambar' => 'nullable'
        ]);

        Produk::create([
            'nama_produk' => $request->nama_produk,
            'kategori' => $request->kategori,
            'harga_produk' => $request->harga_produk,
            'stok' => $request->stok,
            'gambar' => $request->gambar,
        ]);

        return redirect()->back()->with('success', 'Produk berhasil ditambahkan');
    }

    public function destroy($id) //delete
    {
        Produk::where('id_produk', $id)->delete();
        return redirect()->back()->with('success', 'Produk berhasil dihapus');
    }

    public function edit($id) //edit 
    {
        $produk = Produk::where('id_produk', $id)->first();
        return view('admin.edit_produk', compact('produk'));
    }

    public function update(Request $request, $id) //simpan perubahan produk
    {
        $request->validate([
            'nama_produk' => 'required',
            'kategori' => 'required',
            'harga_produk' => 'required|numeric',
            'stok' => 'required|numeric',
            'gambar' => 'nullable'
        ]);

        Produk::where('id_produk', $id)->update([
            'nama_produk' => $request->nama_produk,
            'kategori' => $request->kategori,
            'harga_produk' => $request->harga_produk,
            'stok' => $request->stok,
            'gambar' => $request->gambar,
        ]);

        return redirect('/admin/produk')->with('success', 'Produk berhasil diperbarui');
    }



}