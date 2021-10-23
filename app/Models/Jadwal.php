<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'nama_kegiatan', 'detail_kegiatan', 'tanggal', 'jam', 'is_mendesak'
    ];

    public function user() {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
