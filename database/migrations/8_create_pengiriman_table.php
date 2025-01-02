<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengirimanTable extends Migration
{
    /**
     * Menjalankan migrasi untuk membuat tabel pengiriman.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengiriman', function (Blueprint $table) {
            $table->id();
            $table->char('akun_pengirim', 36);
            $table->char('akun_pembeli', 36);
            $table->unsignedBigInteger('transaksi');
            $table->text('catatan');
            $table->timestamp('waktu_dikirim');
            $table->timestamp('waktu_diterima');
            $table->enum('status', ['Dikemas', 'Dikirim', 'Diterima']);
            $table->timestamps();

            $table->foreign('akun_pengirim')->references('id')->on('akun')->onDelete('cascade');

            $table->foreign('akun_pembeli')->references('id')->on('akun')->onDelete('cascade');

            $table->foreign('transaksi')->references('id')->on('transaksi')->onDelete('cascade');
        });
    }

    /**
     * Membatalkan migrasi untuk menghapus tabel pengiriman.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengiriman');
    }
}
