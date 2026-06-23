<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Cat extends Model
{
    protected $fillable = [
        'user_id',
        'nama',
        'umur',
        'jenis_kelamin',
        'ras',
        'warna',
        'lokasi',
        'foto',
        'deskripsi',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}