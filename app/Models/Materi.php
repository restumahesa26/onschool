<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;

    protected $fillable = [
        'kategori_id', 'sub_kategori_id', 'judul', 'kelas', 'thumbnail', 'deskripsi', 'isi_materi', 'file'
    ];

    public function kategori() {
        return $this->hasOne(Kategori::class, 'id', 'kategori_id');
    }

    public function sub_kategori() {
        return $this->hasOne(SubKategori::class, 'id', 'sub_kategori_id');
    }
}
