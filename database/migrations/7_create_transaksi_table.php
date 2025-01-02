<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiTable extends Migration
{
    /**
     * Menjalankan migrasi untuk membuat tabel transaksi.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->char('akun_pembeli', 36);
            $table->timestamp('waktu');
            $table->integer('jumlah_pengiriman')->nullable();
            $table->integer('biaya_pengiriman');
            $table->enum('status', ['Belum dibayar', 'Sudah dibayar', 'Dibatalkan']);
            $table->char('struk', 32)->unique()->nullable();
            $table->timestamps();


            $table->foreign('akun_pembeli')->references('id')->on('akun')->onDelete('cascade');

            $table->foreign('biaya_pengiriman')->references('id')->on('biaya_pengiriman')->onDelete('cascade');
        });
    }

    /**
     * Membatalkan migrasi untuk menghapus tabel transaksi.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
}
