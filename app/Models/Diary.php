<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diary extends Model
{
    use HasFactory;

    protected $fillable = [
        'entry',
        'mood',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
