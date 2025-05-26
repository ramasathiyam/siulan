<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    use HasFactory;

    protected $table = 'paket'; // nama tabel

    protected $primaryKey = 'id_paket'; // nama kolom primary key

    public $timestamps = true; // karena kamu pakai $table->timestamps() di migrasi

    protected $fillable = [
        'nama',
        'jumlah_hari',
        'deskripsi',
        'harga',
    ];
}