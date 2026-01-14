<?php

namespace App\Http\Controllers;

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
        Produk::create($request->all());
        return redirect()->back();
    }

    public function destroy($id) //delete
    {
        Produk::where('id_produk', $id)->delete();
        return redirect()->back();
    }

    public function edit($id) //edit 
    {
        $produk = Produk::where('id_produk', $id)->first();
        return view('admin.edit_produk', compact('produk'));
    }

    public function update(Request $request, $id) //simpan perubahan produk
    {
        Produk::where('id_produk', $id)->update([
            'nama_produk' => $request->nama_produk,
            'kategori' => $request->kategori,
            'harga_produk' => $request->harga,
            'stok' => $request->stok,
        ]);

        return redirect('/admin/produk');
    }



}