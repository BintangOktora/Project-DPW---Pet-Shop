<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;

    // Nama tabel (karena bukan default "admins")
    protected $table = 'admin';

    // Primary Key
    protected $primaryKey = 'id_admin';

    // buat olom yang bisa diisi
    protected $fillable = [
        'nama_admin',
        'email',
        'password'
    ];

    // buat kolom yang disembunyikan
    protected $hidden = [
        'password'
    ];

    // Timestamp
    public $timestamps = true;
}
