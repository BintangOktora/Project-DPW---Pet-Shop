<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create default admin user
        User::create([
            'nama_user' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('admin123'),
            'no_hp' => '',
        ]);
    }
}
