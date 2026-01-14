<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;

    // Nama tabel (karena bukan default "admins")
    protected $table = 'admin';

    // Primary Key default 'id' - tidak perlu didefinisikan jika menggunakan 'id'
    // protected $primaryKey = 'id';

    // buat kolom yang bisa diisi
    protected $fillable = [
        'username',
        'password'
    ];

    // buat kolom yang disembunyikan
    protected $hidden = [
        'password'
    ];

    // Timestamp
    public $timestamps = true;
}
