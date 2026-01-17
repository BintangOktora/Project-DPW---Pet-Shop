<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use App\Models\Checkout;
use Illuminate\Http\Request;
use Carbon\Carbon;

class KeranjangController extends Controller
{
    /**
     * Tampilkan halaman keranjang
     */
    public function index()
    {
        // Cek user sudah login
        if (!session('user_login')) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu');
        }

        $userId = session('user_id');
        $items = Keranjang::where('id_user', $userId)->get();

        $total = $items->sum(function ($item) {
            return $item->harga * $item->jumlah;
        });

        return view('keranjang', [
            'items' => $items,
            'total' => $total,
            'count' => $items->sum('jumlah')
        ]);
    }

    /**
     * Tambah item ke keranjang
     */
    public function store(Request $request)
    {
        // Cek user sudah login
        if (!session('user_login')) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu untuk menambahkan ke keranjang');
        }

        $userId = session('user_id');
        $produk = \App\Models\Produk::find($request->id_produk);

        if (!$produk) {
            return redirect()->back()->with('error', 'Produk tidak ditemukan');
        }

        $jumlahBaru = $request->jumlah ?? 1;

        // Cek apakah produk sudah ada di keranjang
        $existingItem = Keranjang::where('id_user', $userId)
            ->where('id_produk', $request->id_produk)
            ->first();

        if ($existingItem) {
            $totalJumlah = $existingItem->jumlah + $jumlahBaru;
            // Cek stok
            if ($totalJumlah > $produk->stok) {
                return redirect()->back()->with('error', 'Stok tidak mencukupi. Stok tersedia: ' . $produk->stok);
            }
            // Jika sudah ada, tambahkan jumlahnya
            $existingItem->jumlah = $totalJumlah;
            $existingItem->save();
        } else {
            // Cek stok
            if ($jumlahBaru > $produk->stok) {
                return redirect()->back()->with('error', 'Stok tidak mencukupi. Stok tersedia: ' . $produk->stok);
            }
            // Jika belum ada, tambahkan item baru
            Keranjang::create([
                'id_user' => $userId,
                'id_produk' => $request->id_produk,
                'nama_produk' => $request->nama_produk,
                'gambar_produk' => $request->gambar_produk,
                'harga' => $request->harga,
                'jumlah' => $jumlahBaru
            ]);
        }

        return redirect('/keranjang')->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }

    /**
     * Update jumlah item di keranjang (tambah)
     */
    public function tambah($id)
    {
        if (!session('user_login')) {
            return redirect('/login');
        }

        $userId = session('user_id');
        $item = Keranjang::where('id_keranjang', $id)
            ->where('id_user', $userId)
            ->first();

        if ($item) {
            $produk = \App\Models\Produk::find($item->id_produk);
            if ($produk && $item->jumlah + 1 > $produk->stok) {
                return redirect('/keranjang')->with('error', 'Stok tidak mencukupi');
            }
            $item->jumlah += 1;
            $item->save();
        }

        return redirect('/keranjang');
    }

    /**
     * Update jumlah item di keranjang (kurang)
     */
    public function kurang($id)
    {
        if (!session('user_login')) {
            return redirect('/login');
        }

        $userId = session('user_id');
        $item = Keranjang::where('id_keranjang', $id)
            ->where('id_user', $userId)
            ->first();

        if ($item) {
            if ($item->jumlah > 1) {
                $item->jumlah -= 1;
                $item->save();
            }
        }

        return redirect('/keranjang');
    }

    /**
     * Hapus item dari keranjang
     */
    public function destroy($id)
    {
        if (!session('user_login')) {
            return redirect('/login');
        }

        $userId = session('user_id');
        $item = Keranjang::where('id_keranjang', $id)
            ->where('id_user', $userId)
            ->first();

        if ($item) {
            $item->delete();
        }

        return redirect('/keranjang')->with('success', 'Produk dihapus dari keranjang');
    }

    /**
     * Checkout - pindahkan item dari keranjang ke tabel checkout
     */
    public function checkout()
    {
        if (!session('user_login')) {
            return redirect('/login');
        }

        $userId = session('user_id');
        $items = Keranjang::where('id_user', $userId)->get();

        if ($items->isEmpty()) {
            return redirect('/keranjang')->with('error', 'Keranjang kosong');
        }

        $totalAll = 0;
        $today = Carbon::now()->format('Y-m-d');

        // Validasi stok untuk semua item terlebih dahulu
        foreach ($items as $item) {
            $produk = \App\Models\Produk::find($item->id_produk);
            if (!$produk || $item->jumlah > $produk->stok) {
                return redirect('/keranjang')->with('error', 'Stok produk "' . $item->nama_produk . '" tidak mencukupi. Sisa stok: ' . ($produk ? $produk->stok : 0));
            }
        }

        // Jika semua stok tersedia, akan melakukan transaksi
        foreach ($items as $item) {
            $total = $item->harga * $item->jumlah;
            $totalAll += $total;

            Checkout::create([
                'id_user' => $userId,
                'nama_produk' => $item->nama_produk,
                'jumlah' => $item->jumlah,
                'harga' => $item->harga,
                'total' => $total,
                'tgl_transaksi' => $today
            ]);

            // mengurangi stok produk
            $produk = \App\Models\Produk::find($item->id_produk);
            $produk->stok -= $item->jumlah;
            $produk->save();
        }

        // untuk hapus semua item dari keranjang setelah checkout
        Keranjang::where('id_user', $userId)->delete();

        return redirect('/')->with('success', 'Checkout berhasil! Stok produk telah diperbarui. Total pembayaran: Rp ' . number_format($totalAll, 0, ',', '.'));
    }

    /**
     * Hapus semua item dari keranjang
     */
    public function clear()
    {
        if (!session('user_login')) {
            return redirect('/login');
        }

        $userId = session('user_id');
        Keranjang::where('id_user', $userId)->delete();

        return redirect('/keranjang')->with('success', 'Keranjang dikosongkan');
    }
}
