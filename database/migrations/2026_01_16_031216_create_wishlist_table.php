<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('wishlist', function (Blueprint $table) {
            $table->id('id_wishlist');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_produk');
            $table->string('nama_produk', 100);
            $table->string('gambar_produk', 255)->nullable();
            $table->integer('harga');
            $table->timestamps();

            // Relasi ke tabel user
            $table->foreign('id_user')
                ->references('id_user')
                ->on('user')
                ->onDelete('cascade');

            // Relasi ke tabel produk
            $table->foreign('id_produk')
                ->references('id_produk')
                ->on('produk')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wishlist');
    }
};
