<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class SyncSeeder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:sync-seeder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Menyalin data dari database (User & Admin) ke file DatabaseSeeder.php secara otomatis';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Sedang membaca data dari database...');

        // 1. Ambil Data Admin
        // Exclude ID dan Timestamps agar bersih
        $admins = DB::table('admin')->get()->map(function ($item) {
            $data = (array) $item;
            unset($data['id']); // Sesuaikan dengan PK admin jika id
            unset($data['id_admin']);
            unset($data['created_at']);
            unset($data['updated_at']);
            return $data;
        })->toArray();

        // 2. Ambil Data User
        $users = DB::table('user')->get()->map(function ($item) {
            $data = (array) $item;
            unset($data['id_user']);
            unset($data['created_at']);
            unset($data['updated_at']);
            return $data;
        })->toArray();

        // Format ke string PHP Array
        $adminDataString = $this->prettyPrintArray($admins);
        $userDataString = $this->prettyPrintArray($users);

        // Template File Seeder
        $content = <<<PHP
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
        \$admins = $adminDataString;

        foreach (\$admins as \$admin) {
            Admin::firstOrCreate(
                ['username' => \$admin['username']], // Kunci pengecekan agar tdk duplikat
                \$admin
            );
        }

        // 2. Sync User Data
        \$users = $userDataString;

        foreach (\$users as \$user) {
            User::firstOrCreate(
                ['email' => \$user['email']], // Kunci pengecekan agar tdk duplikat
                \$user
            );
        }
    }
}
PHP;

        // Tulis ulang file
        File::put(database_path('seeders/DatabaseSeeder.php'), $content);

        $this->info('BERHASIL! DatabaseSeeder.php sudah diupdate dengan data terbaru dari database lokalmu.');
        $this->info('Sekarang jalankan: git add . && git commit -m "update data" && git push');
    }

    /**
     * Helper untuk membuat array print yang rapi (pengganti var_export)
     */
    private function prettyPrintArray(array $data)
    {
        if (empty($data))
            return '[]';

        $export = var_export($data, true);

        // Sedikit styling agar syntaxnya [] bukan array()
        $export = str_replace(['array (', ')'], ['[', ']'], $export);
        // Hapus index integer (0 => ...) agar lebih ringkas
        $export = preg_replace('/^\s*\d+\s*=>\s*/m', '', $export);

        return $export;
    }
}
