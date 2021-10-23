<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LokakaryaJawaban extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'lokakarya_id', 'jawaban'
    ];

    public function user() {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function lokakarya() {
        return $this->hasOne(Lokakarya::class, 'id', 'lokakarya_id');
    }
}
