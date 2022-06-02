<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrupBelajar extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'kode_kelas', 'nama_grup', 'kelas'
    ];

    public function user() {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function grup_belajar_siswa() {
        return $this->hasMany(GrupBelajarSiswa::class, 'grup_belajar_id', 'id');
    }

    public function grup_belajar_pengumuman() {
        return $this->hasMany(GrupBelajarPengumuman::class, 'grup_belajar_id', 'id')->with(['komentar']);
    }
}
