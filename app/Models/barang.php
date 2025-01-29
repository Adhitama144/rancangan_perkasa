<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'barang';

    // Kolom yang boleh diisi (fillable)
    protected $fillable = [
        'nama_barang',
        'kategori_id',
        'harga',
        'stok',
        'foto',
    ];

    // Definisikan relasi ke model Kategori (bisa menggunakan kategori() jika ada model Kategori)
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    // Definisikan relasi ke model Pesanan
    public function pesanan()
    {
        return $this->hasMany(Pesanan::class, 'barang');
    }
}
