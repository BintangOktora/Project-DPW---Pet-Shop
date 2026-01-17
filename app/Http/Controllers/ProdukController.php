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

    // form edit produk
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

    /**
     * Tampilkan produk berdasarkan kategori
     */
    public function kategori(Request $request, $nama_kategori)
    {
        // Sesuaikan nama kategori dari slug ke database
        $kategori = ($nama_kategori == 'makanan-kucing') ? 'Kucing' : 'Anjing';
        
        $query = Produk::where('kategori', $kategori);

        // Filter sorting
        $sort = $request->query('sort');
        switch ($sort) {
            case 'terbaru':
                $query->orderBy('created_at', 'desc');
                break;
            case 'harga-rendah':
                $query->orderBy('harga_produk', 'asc');
                break;
            case 'harga-tinggi':
                $query->orderBy('harga_produk', 'desc');
                break;
            case 'terpopuler':
                // Gunakan stok terendah sebagai simulasi produk paling laku
                $query->orderBy('stok', 'asc');
                break;
            default:
                $query->orderBy('id_produk', 'desc');
                break;
        }
        
        $produk = $query->paginate(8)->withQueryString();
        
        $view = ($nama_kategori == 'makanan-kucing') ? 'makanan_kucing' : 'makanan_anjing';
        
        return view($view, compact('produk', 'sort'));
    }

    /**
     * Tampilkan detail produk
     */
    public function show($id)
    {
        $produk = Produk::findOrFail($id);
        return view('detail', compact('produk'));
    }
}
