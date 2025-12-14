<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizQuestion extends Model
{
    use HasFactory;

    protected $fillable = ['question', 'order', 'is_active'];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}