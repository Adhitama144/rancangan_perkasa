<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangTable extends Migration
{
    /**
     * Menjalankan migrasi untuk membuat tabel barang.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang', 128);
            $table->unsignedBigInteger('kategori');
            $table->integer('harga');
            $table->integer('stok');
            $table->char('foto', 32)->unique();
            $table->timestamps();

            $table->foreign('kategori')->references('id')->on('kategori')->onDelete('cascade');
        });
    }

    /**
     * Membatalkan migrasi untuk menghapus tabel barang.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barang');
    }
}
