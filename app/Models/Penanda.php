<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penanda extends Model
{
    protected $table = 'penanda';
    protected $fillable = ['user_id', 'postingan_id'];

    public function postingan()
    {
        return $this->belongsTo(Posting::class, 'postingan_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}