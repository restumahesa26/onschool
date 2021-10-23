<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubKategori extends Model
{
    use HasFactory;

    protected $fillable = [
        'kategori_id', 'nama_sub_kategori'
    ];

    public function kategori() {
        return $this->hasOne(Kategori::class, 'id', 'kategori_id');
    }
}
