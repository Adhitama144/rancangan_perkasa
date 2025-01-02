<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengiriman extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika tidak mengikuti konvensi
    protected $table = 'pengiriman';

    // Tentukan primary key
    protected $primaryKey = 'id';

    // Tentukan kolom yang bisa diisi massal
    protected $fillable = [
        'akun_pengirim',
        'akun_pembeli',
        'transaksi',
        'catatan',
        'waktu_dikirim',
        'waktu_diterima',
        'status',
    ];

    // Tentukan kolom yang harus dianggap sebagai timestamp
    public $timestamps = false;

    // Relasi dengan tabel akun (akun_pengirim)
    public function pengirim()
    {
        return $this->belongsTo(Akun::class, 'akun_pengirim', 'id');
    }

    // Relasi dengan tabel akun (akun_pembeli)
    public function pembeli()
    {
        return $this->belongsTo(Akun::class, 'akun_pembeli', 'id');
    }

    // Relasi dengan tabel transaksi
    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'transaksi', 'id');
    }
}
