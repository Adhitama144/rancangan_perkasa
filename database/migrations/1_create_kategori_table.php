<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKategoriTable extends Migration
{
    /**
     * Menjalankan migrasi untuk membuat tabel kategori.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kategori', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kategori', 128)->unique();
            $table->integer('ukuran');
            $table->string('satuan', 16);
            $table->integer('biaya_sales');
            $table->timestamps();
        });
    }

    /**
     * Membatalkan migrasi untuk menghapus tabel kategori.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kategori');
    }
}
