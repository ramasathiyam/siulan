<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posting extends Model
{
    use HasFactory;

    protected $table = 'postingan';

    protected $fillable = [
        'id_paket',
        'user_id',
        'JudulKegiatan',
        'Deskripsi',
        'JenisKegiatan',
        'Kategori',
        'TanggalKegiatan',
        'Peserta',
        'Lokasi',
        'TautanPendaftaran',
        'LinkGrup',
        'Harga',
        'KontakInstagram',
        'KontakWebsite',
        'KontakYoutube',
        'Poster',
        'Snap_token',
        'status',
    ];

    // Relasi ke Paket
    public function paket()
    {
        return $this->belongsTo(Paket::class, 'id_paket');
    }

    public function pendaftar()
    {
        return $this->hasMany(Pendaftar::class, 'id_postingan');
    }
}
