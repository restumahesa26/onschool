<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrupBelajarPengumuman extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'grup_belajar_id', 'isi_pengumuman'
    ];

    public function user() {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function grup_belajar() {
        return $this->hasOne(GrupBelajar::class, 'grup_belajar_id', 'id');
    }

    public function komentar() {
        return $this->hasMany(GrupBelajarPengumumanKomentar::class, 'pengumuman_id', 'id');
    }
}
