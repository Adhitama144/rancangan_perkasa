<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    // Tentukan nama tabel
    protected $table = 'transaksi';

    // Tentukan kolom yang dapat diisi
    protected $fillable = [
        'akun_pembeli',
        'waktu',
        'jumlah_pengiriman',
        'biaya_pengiriman',
        'status',
        'struk',
    ];

    // Tentukan tipe data untuk kolom timestamp
    protected $casts = [
        'waktu' => 'datetime',
    ];

    // Relasi dengan model Akun (akun_pembeli)
    public function akun()
    {
        return $this->belongsTo(Akun::class, 'akun_pembeli', 'id');
    }

    // Relasi dengan model BiayaPengiriman (biaya_pengiriman)
    public function biayaPengiriman()
    {
        return $this->belongsTo(BiayaPengiriman::class, 'biaya_pengiriman', 'id');
    }

    // Relasi dengan model Pesanan
    public function pesanan()
    {
        return $this->hasMany(Pesanan::class, 'transaksi', 'id');
    }

    // Relasi dengan model Pengiriman
    public function pengiriman()
    {
        return $this->hasOne(Pengiriman::class, 'transaksi', 'id');
    }
}
