<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika tidak mengikuti konvensi Laravel
    protected $table = 'pesanan';

    // Tentukan kolom yang dapat diisi (mass assignable)
    protected $fillable = ['barang', 'transaksi'];

    // Tentukan hubungan dengan model Barang
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang');
    }

    // Tentukan hubungan dengan model Transaksi
    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'transaksi');
    }
}
