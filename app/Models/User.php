<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Nama tabel 
    protected $table = 'user';

    // Primary key custom
    protected $primaryKey = 'id_user';

    // Auto increment PK
    public $incrementing = true;

    // Tipe PK
    protected $keyType = 'int';

    /**
     * Kolom yang boleh diisi (mass assignment)
     */
    protected $fillable = [
        'nama_user',
        'no_hp',
        'email',
        'password'
    ];


    /**
     * Kolom yang disembunyikan
     */
    protected $hidden = [];

    /**
     * Casting atribut
     */
    protected $casts = [];
}
