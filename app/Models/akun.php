<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Akun extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika berbeda dengan plural form dari nama model
    protected $table = 'akun';

    // Tentukan primary key
    protected $primaryKey = 'id';

    // Tentukan apakah primary key adalah tipe UUID
    protected $keyType = 'string';

    // Tentukan apakah primary key adalah auto increment
    public $incrementing = false;

    // Tentukan field yang dapat diisi massal
    protected $fillable = [
        'id',
        'email',
        'no_wa',
        'password',
        'nama',
        'jenis_kelamin',
        'alamat',
        'jenis_akun_id'
    ];

    // Tentukan field yang tidak dapat diisi massal
    protected $guarded = [];

    // Tentukan tipe field
    protected $casts = [
        'email' => 'string',
        'no_wa' => 'integer',
        'password' => 'string',
        'nama' => 'string',
        'jenis_kelamin' => 'string',
        'alamat' => 'string',
        'jenis_akun_id' => 'string',
    ];

    // Relasi dengan tabel refferal (sebagai pengajak)
    public function pengajak()
    {
        return $this->hasMany(Refferal::class, 'pengajak');
    }

    // Relasi dengan tabel refferal (sebagai diajak)
    public function diajak()
    {
        return $this->hasMany(Refferal::class, 'diajak');
    }

    // Relasi dengan tabel transaksi (sebagai pembeli)
    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'akun_pembeli');
    }

    // Relasi dengan tabel pengiriman (sebagai pengirim)
    public function pengirimanSebagaiPengirim()
    {
        return $this->hasMany(Pengiriman::class, 'akun_pengirim');
    }

    // Relasi dengan tabel pengiriman (sebagai pembeli)
    public function pengirimanSebagaiPembeli()
    {
        return $this->hasMany(Pengiriman::class, 'akun_pembeli');
    }
}
