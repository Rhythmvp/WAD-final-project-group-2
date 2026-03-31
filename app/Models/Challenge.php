<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    protected $fillable = [
        'name',
        'description',
        'goal',
        'duration_days',
        'difficulty',
        'image_path',
    ];
}
