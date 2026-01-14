<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('checkout', function (Blueprint $table) {
            $table->id('id_transaksi');
            $table->unsignedBigInteger('id_user');
            $table->string('nama_produk', 50);
            $table->integer('jumlah');
            $table->integer('harga');
            $table->integer('total');
            $table->date('tgl_transaksi');
            $table->timestamps();

            // Relasi ke tabel user
            $table->foreign('id_user')
                ->references('id_user')
                ->on('user')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checkout');
    }
};
