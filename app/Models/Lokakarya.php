<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lokakarya extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'sub_kategori_id', 'pertanyaan'
    ];

    public function user() {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function sub_kategori() {
        return $this->hasOne(SubKategori::class, 'id', 'sub_kategori_id');
    }
}
