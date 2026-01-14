<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    use HasFactory;

    protected $table = 'checkout';
    protected $primaryKey = 'id_transaksi';

    protected $fillable = [
        'id_user',
        'nama_produk',
        'jumlah',
        'harga',
        'total',
        'tgl_transaksi'
    ];
}
