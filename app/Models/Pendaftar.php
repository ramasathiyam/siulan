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
        'institusi',
        'keterangan',
        'id_postingan',
        'snap_token',
    ];

     public function postingan()
    {
        return $this->belongsTo(Posting::class, 'id_postingan');
    }
}