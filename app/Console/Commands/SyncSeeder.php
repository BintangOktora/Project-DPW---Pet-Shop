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

        // KONFIGURASI TABEL YANG AKAN DI-SYNC
        // Tambahkan tabel lain di sini jika ingin disinkronkan juga.
        $syncConfig = [
            [
                'table' => 'admin',
                'model' => 'App\Models\Admin',
                'unique_key' => 'username',
                'pk_list' => ['id', 'id_admin'], // List kolom primary key/timestamp yang mau dihapus
            ],
            [
                'table' => 'user',
                'model' => 'App\Models\User',
                'unique_key' => 'email',
                'pk_list' => ['id_user'],
            ],
            [
                'table' => 'produk',
                'model' => 'App\Models\Produk',
                'unique_key' => 'id_produk', // Gunakan ID saja jika nama produk bisa kembar, atau nama_produk jika unik
                'pk_list' => [], // KITA JANGAN HAPUS ID_PRODUK, biar ID-nya konsisten antar laptop (relasi aman)
            ]
        ];

        // 1. Generate Data String & Import Statements
        $dataStrings = [];
        $imports = [];
        $seederLogic = "";

        foreach ($syncConfig as $config) {
            $tableName = $config['table'];
            $modelClass = $config['model'];
            $uniqueKey = $config['unique_key'];
            $pksToRemove = array_merge($config['pk_list'] ?? [], ['created_at', 'updated_at']);

            // Tambahkan use statement
            $imports[] = "use $modelClass;";

            // Ambil data dari DB
            $rawData = DB::table($tableName)->get()->map(function ($item) use ($pksToRemove) {
                $data = (array) $item;
                foreach ($pksToRemove as $pk) {
                    unset($data[$pk]);
                }
                return $data;
            })->toArray();

            $varName = '$' . $tableName . 's'; // misal $users
            $dataStrings[$tableName] = $this->prettyPrintArray($rawData);

            // Buat logic foreach untuk seeder
            $seederLogic .= "\n        // --- Sync Table: $tableName ---\n";
            $seederLogic .= "        $varName = " . $dataStrings[$tableName] . ";\n\n";
            $seederLogic .= "        foreach ($varName as \$item) {\n";
            $seederLogic .= "            $modelClass::firstOrCreate(\n";
            $seederLogic .= "                ['$uniqueKey' => \$item['$uniqueKey']],\n";
            $seederLogic .= "                \$item\n";
            $seederLogic .= "            );\n";
            $seederLogic .= "        }\n";
        }

        $importsString = implode("\n", array_unique($imports));

        // Template File Seeder
        $content = <<<PHP
<?php

namespace Database\Seeders;

$importsString
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     *
     * GENERATED AUTOMATICALLY BY: php artisan db:sync-seeder
     * DATE: {{DATE}}
     */
    public function run(): void
    {
$seederLogic
    }
}
PHP;

        $content = str_replace('{{DATE}}', date('Y-m-d H:i:s'), $content);

        // Tulis ulang file
        File::put(database_path('seeders/DatabaseSeeder.php'), $content);

        $this->info('BERHASIL! DatabaseSeeder.php sudah diupdate untuk tabel: ' . implode(', ', array_column($syncConfig, 'table')));
        $this->info('Sekarang jalankan: git add . && git commit -m "update seeder data" && git push');
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
