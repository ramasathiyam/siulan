<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posting extends Model
{
    use HasFactory;

    protected $table = 'postingan'; // Nama tabel di database

    public $timestamps = true; // Jika kamu menggunakan created_at dan updated_at

    protected $fillable = [
        'id_paket',
        'JudulKegiatan',
        'Deskripsi',
        'JenisKegiatan',
        'Kategori',
        'Lokasi',
        'TautanPendaftaran',
        'KontakInstagram',
        'KontakWebsite',
        'KontakYoutube',
        'Poster',
        'status'
    ];
}
