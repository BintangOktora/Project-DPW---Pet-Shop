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
     * DATE: 2026-01-14 07:23:01
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
            Admin::firstOrCreate(
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
    'password' => '$2y$12$nKpvuFq518LYs76IPGm7Zu0BQYCuCVMm8mpGINypNfsOmCY5Feas.',
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
];

        foreach ($users as $item) {
            User::firstOrCreate(
                ['email' => $item['email']],
                $item
            );
        }

        // --- Sync Table: produk ---
        $produks = [
            [
                'id_produk' => 1,
                'nama_produk' => 'Whiskas Ocean Fish Canned 400gr',
                'gambar' => '/images/whiskas.png',
                'kategori' => 'Kucing',
                'harga_produk' => 26500,
                'stok' => 15,
            ],
            [
                'id_produk' => 2,
                'nama_produk' => 'Royal Canin Kitten 2KG Dry Food',
                'gambar' => '/images/RoyalCanin.png',
                'kategori' => 'Kucing',
                'harga_produk' => 210000,
                'stok' => 10,
            ],
            [
                'id_produk' => 3,
                'nama_produk' => 'Me-O Creamy Treats Salmon 1 Pack',
                'gambar' => '/images/Me-o.png',
                'kategori' => 'Kucing',
                'harga_produk' => 18000,
                'stok' => 20,
            ],
            [
                'id_produk' => 4,
                'nama_produk' => 'Friskies Seafood Sensations 1.2KG',
                'gambar' => '/images/Friskies.png',
                'kategori' => 'Kucing',
                'harga_produk' => 65000,
                'stok' => 12,
            ],
            [
                'id_produk' => 5,
                'nama_produk' => 'Bolt Tuna Cat Food 1KG (Donut)',
                'gambar' => '/images/bolt.png',
                'kategori' => 'Kucing',
                'harga_produk' => 22000,
                'stok' => 25,
            ],
            [
                'id_produk' => 6,
                'nama_produk' => 'Pedigree Adult Beef 1.5KG',
                'gambar' => '/images/Pedigree.png',
                'kategori' => 'Anjing',
                'harga_produk' => 68000,
                'stok' => 10,
            ],
            [
                'id_produk' => 7,
                'nama_produk' => 'Royal Canin Maxi Adult 4KG',
                'gambar' => '/images/RoyalMaxi.png',
                'kategori' => 'Anjing',
                'harga_produk' => 420000,
                'stok' => 5,
            ],
            [
                'id_produk' => 8,
                'nama_produk' => 'Bolt Dog Food Lamb 1KG',
                'gambar' => '/images/BoltDog.png',
                'kategori' => 'Anjing',
                'harga_produk' => 22000,
                'stok' => 15,
            ],
            [
                'id_produk' => 9,
                'nama_produk' => 'Purina Pro Plan Puppy 2.5KG',
                'gambar' => '/images/Purina.png',
                'kategori' => 'Anjing',
                'harga_produk' => 185000,
                'stok' => 8,
            ],
        ];

        foreach ($produks as $item) {
            Produk::firstOrCreate(
                ['id_produk' => $item['id_produk']],
                $item
            );
        }

    }
}