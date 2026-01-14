<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     *
     * GENERATED AUTOMATICALLY BY: php artisan db:sync-seeder
     * JANGAN EDIT MANUAL FILE INI JIKA INGIN DATA DINAMIS DARI DATABASE.
     * CUKUP JALANKAN COMMAND LAGI SETELAH UPDATE DATA DI WEBSITE.
     */
    public function run(): void
    {
        // 1. Sync Admin Data
        $admins = [
[
    'username' => 'admin',
    'password' => 'admin123',
  ],
];

        foreach ($admins as $admin) {
            Admin::firstOrCreate(
                ['username' => $admin['username']], // Kunci pengecekan agar tdk duplikat
                $admin
            );
        }

        // 2. Sync User Data
        $users = [
[
    'nama_user' => 'Oktora',
    'no_hp' => '08138423777',
    'email' => 'bintangoktora40@gmail.com',
    'password' => '$2y$12$WBPuhOoa6Tr8rXUlb71BuuLD8rUW1bOx9cJm8tFK7Vaj0IQUSCVOi',
  ],
[
    'nama_user' => 'YARSI',
    'no_hp' => '0214206674',
    'email' => 'yarsi@gmail.com',
    'password' => '$2y$12$nKpvuFq518LYs76IPGm7Zu0BQYCuCVMm8mpGINypNfsOmCY5Feas.',
  ],
[
    'nama_user' => 'YARSI2',
    'no_hp' => '666666666666',
    'email' => 'yarsitv@gmail.com',
    'password' => '$2y$12$r6NdzicUQWoOiV56qBVSIOruRUsBMIlBGwIqAAVxb3rH84If8zNP.',
  ],
];

        foreach ($users as $user) {
            User::firstOrCreate(
                ['email' => $user['email']], // Kunci pengecekan agar tdk duplikat
                $user
            );
        }
    }
}