<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiayaPengirimanTable extends Migration
{
    /**
     * Menjalankan migrasi untuk membuat tabel biaya_pengiriman.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biaya_pengiriman', function (Blueprint $table) {
            $table->id();
            $table->string('wilayah', 128)->unique();
            $table->integer('nominal');
            $table->timestamps();
        });
    }

    /**
     * Membatalkan migrasi untuk menghapus tabel biaya_pengiriman.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('biaya_pengiriman');
    }
}
