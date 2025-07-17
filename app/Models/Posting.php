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
    'Penyelenggara',
    'TautanPendaftaran',
    'LinkGrup',
    'Harga',
    'PaketDiskon',
    'KontakInstagram',
    'KontakWebsite',
    'KontakYoutube',
    'Poster',
    'snap_token',
    'status',
    'tanggal_aktif',
    'tanggal_expired',
    'rejection_note', // ✅ Tambahkan ini
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
