<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use App\Models\Produk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     *
     * GENERATED AUTOMATICALLY BY: php artisan db:sync-seeder
     * DATE: 2026-01-14 14:44:13
     */
    public function run(): void
    {

        // --- Sync Table: admin ---
        $admins = [
            [
                'username' => 'admin',
                'password' => 'admin123',
            ],
        ];

        foreach ($admins as $item) {
            App\Models\Admin::firstOrCreate(
                ['username' => $item['username']],
                $item
            );
        }

        // --- Sync Table: user ---
        $users = [
            [
                'nama_user' => 'Oktora',
                'no_hp' => '08138423777',
                'email' => 'bintangoktora40@gmail.com',
                'password' => '$2y$12$WBPuhOoa6Tr8rXUlb71BuuLD8rUW1bOx9cJm8tFK7Vaj0IQUSCVOi',
            ],
            [
                'nama_user' => 'YARSI66',
                'no_hp' => '0214206674',
                'email' => 'yarsi@gmail.com',
                'password' => '$2y$12$uu.ivpNq0Sp11LYJt6BRiuasx0OurbIE70fDZpPMGRE7E.d5qRAb2',
            ],
            [
                'nama_user' => 'YARSI2',
                'no_hp' => '666666666666',
                'email' => 'yarsitv@gmail.com',
                'password' => '$2y$12$r6NdzicUQWoOiV56qBVSIOruRUsBMIlBGwIqAAVxb3rH84If8zNP.',
            ],
            [
                'nama_user' => 'Erere',
                'no_hp' => '081892121',
                'email' => 'erere@gmail.com',
                'password' => '$2y$12$nlbZF.s1AlnAqDWv6/0HD.j8Df2/ZSuoHHiVz8MRrvUM3oKYAMO8e',
            ],
            [
                'nama_user' => 'aku',
                'no_hp' => '6536',
                'email' => 'aku1@gmail.com',
                'password' => '$2y$12$ngWp5gXmP2QTpp9r2gM7Q.zdUIcmQswnShZZVHPZ9B4pO8vNJpLQa',
            ],
            [
                'nama_user' => 'arta1',
                'no_hp' => '0333333333',
                'email' => 'arta1@gmail.com',
                'password' => '$2y$12$UAX5sbv2Z4j//xOeRgamiuCUVrOqq.svCUiqa9ugjuCpYjM9uYZwW',
            ],
            [
                'nama_user' => 'bintang',
                'no_hp' => '081389432602',
                'email' => 'trenzzzz1890@gmail.com',
                'password' => '$2y$12$uwQjSMTOPuoX.Y340hZ4T.SNsmpJGNaxCfX3Ma6lkNesY2ClQ4X8a',
            ],
        ];

        foreach ($users as $item) {
            App\Models\User::firstOrCreate(
                ['email' => $item['email']],
                $item
            );
        }

        // --- Sync Table: produk ---
        $produks = [
            [
                'id_produk' => 5,
                'nama_produk' => 'Wet Food Whiskas',
                'kategori' => 'Kucing',
                'harga_produk' => 100000,
                'stok' => 10,
            ],
            [
                'id_produk' => 6,
                'nama_produk' => 'Royal Canin Poodle',
                'kategori' => 'Anjing',
                'harga_produk' => 209000,
                'stok' => 5,
            ],
            [
                'id_produk' => 7,
                'nama_produk' => 'Royal Medium Poodle',
                'kategori' => 'Anjing',
                'harga_produk' => 400000,
                'stok' => 3,
            ],
            [
                'id_produk' => 8,
                'nama_produk' => 'Blue Buffalo Wilderness Chicken Dry Cat Food',
                'kategori' => 'Kucing',
                'harga_produk' => 966000,
                'stok' => 6,
            ],
            [
                'id_produk' => 9,
                'nama_produk' => 'Whiskas Ocean Fish 1.2kg',
                'kategori' => 'Kucing',
                'harga_produk' => 70000,
                'stok' => 6,
            ],
            [
                'id_produk' => 10,
                'nama_produk' => 'Dog Menu Wet Dog Food',
                'kategori' => 'Anjing',
                'harga_produk' => 18000,
                'stok' => 4,
            ],
        ];

        foreach ($produks as $item) {
            App\Models\Produk::firstOrCreate(
                ['id_produk' => $item['id_produk']],
                $item
            );
        }

    }
}