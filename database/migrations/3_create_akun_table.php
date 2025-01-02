<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAkunTable extends Migration
{
    /**
     * Menjalankan migrasi untuk membuat tabel akun.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('akun', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->string('email', 364)->unique();
            $table->char('no_wa', 13)->unique();
            $table->char('password', 32);
            $table->string('nama', 128);
            $table->enum('jenis_kelamin', ['Laki - Laki', 'Perempuan']);
            $table->text('alamat');
            $table->enum('jenis_akun_id', ['owner', 'kurir', 'sales', 'umum'])->default('umum');
            $table->timestamps();
        });
    }

    /**
     * Membatalkan migrasi untuk menghapus tabel akun.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('akun');
    }
}
