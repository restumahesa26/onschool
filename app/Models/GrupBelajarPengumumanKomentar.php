<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrupBelajarPengumumanKomentar extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'grup_belajar_id', 'pengumuman_id', 'komentar'
    ];

    public function user() {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function grup_belajar() {
        return $this->hasOne(GrupBelajar::class, 'grup_belajar_id', 'id');
    }

    public function pengumuman() {
        return $this->hasOne(GrupBelajarPengumuman::class, 'pengumuman_id', 'id');
    }
}
