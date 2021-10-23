<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrupBelajarSiswa extends Model
{
    use HasFactory;

    public $table = 'grup_belajar_siswas';

    protected $fillable = [
        'user_id', 'grup_belajar_id'
    ];

    public function user() {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function grup_belajar() {
        return $this->hasMany(GrupBelajar::class, 'grup_belajar_id', 'id');
    }
}
