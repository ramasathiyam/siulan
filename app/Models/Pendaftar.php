<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftar extends Model
{
    use HasFactory;

    protected $table = 'pendaftar';

    protected $fillable = [
        'nama',
        'email',
        'telepon',
        'kategori',
        'institusi',
        'keterangan',
        'id_postingan',
    ];

     public function postingan()
    {
        return $this->belongsTo(Posting::class, 'id_postingan');
    }
}