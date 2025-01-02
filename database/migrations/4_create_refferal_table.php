<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRefferalTable extends Migration
{
    /**
     * Menjalankan migrasi untuk membuat tabel refferal.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('refferal', function (Blueprint $table) {
            $table->id();
            $table->char('pengajak', 36);
            $table->char('diajak', 36);
            $table->timestamps();

            // Menambahkan foreign key constraint untuk pengajak
            $table->foreign('pengajak')->references('id')->on('akun')->onDelete('cascade');

            // Menambahkan foreign key constraint untuk diajak
            $table->foreign('diajak')->references('id')->on('akun')->onDelete('cascade');
        });
    }

    /**
     * Membatalkan migrasi untuk menghapus tabel refferal.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('refferal');
    }
}
