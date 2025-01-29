<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BiayaPengiriman extends Model
{
    use HasFactory;

    protected $table = 'biaya_pengiriman'; // Nama tabel
    protected $primaryKey = 'id'; // Kunci utama
    public $timestamps = false; // Jika tabel tidak menggunakan kolom created_at dan updated_at

    protected $fillable = [
        'wilayah',
        'nominal',
    ];

    // Relasi dengan model Transaksi
    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'biaya_pengiriman');
    }
}
