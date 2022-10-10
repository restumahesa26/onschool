<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OnschoolTraining extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'jenis', 'bukti_pembayaran', 'no_hp', 'status'
    ];

    public function user() {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
