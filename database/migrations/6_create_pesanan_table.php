<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesananTable extends Migration
{
    /**
     * Menjalankan migrasi untuk membuat tabel pesanan.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('barang');
            $table->unsignedBigInteger('transaksi');
            $table->timestamps();

            // Menambahkan foreign key constraint untuk barang
            $table->foreign('barang')->references('id')->on('barang')->onDelete('cascade');

            // Menambahkan foreign key constraint untuk transaksi
            $table->foreign('transaksi')->references('id')->on('transaksi')->onDelete('cascade');
        });
    }

    /**
     * Membatalkan migrasi untuk menghapus tabel pesanan.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pesanan');
    }
}
