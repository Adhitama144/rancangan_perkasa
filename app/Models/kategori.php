<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'kategori';

    // Kolom yang dapat diisi (fillable)
    protected $fillable = [
        'nama_kategori',
        'ukuran',
        'satuan',
        'biaya_sales',
    ];

    // Menentukan apakah model ini memiliki timestamp (created_at dan updated_at)
    public $timestamps = false; // karena tabel kategori tidak memiliki kolom timestamps

    // Relasi ke tabel barang
    public function barang()
    {
        return $this->hasMany(Barang::class, 'kategori');
    }
}
