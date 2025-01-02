<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Refferal extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika berbeda dengan nama model (opsional)
    protected $table = 'refferal';

    // Tentukan kolom yang dapat diisi (mass assignable)
    protected $fillable = [
        'pengajak',
        'diajak',
    ];

    // Tentukan kolom primary key jika tidak menggunakan default 'id'
    protected $primaryKey = 'id';

    // Tentukan tipe kolom primary key jika bukan integer (opsional)
    protected $keyType = 'int';

    // Matikan timestamp jika tabel tidak menggunakan created_at dan updated_at
    public $timestamps = false;

    /**
     * Relasi dengan model Akun (pengajak).
     * Relasi ini menghubungkan kolom pengajak dengan id di tabel akun.
     */
    public function pengajakAkun()
    {
        return $this->belongsTo(Akun::class, 'pengajak', 'id');
    }

    /**
     * Relasi dengan model Akun (diajak).
     * Relasi ini menghubungkan kolom diajak dengan id di tabel akun.
     */
    public function diajakAkun()
    {
        return $this->belongsTo(Akun::class, 'diajak', 'id');
    }
}
