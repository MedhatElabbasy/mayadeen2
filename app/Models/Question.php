<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Question extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    public $fillable = [
        'content',
        'answers',
    ];

    protected $casts = [
        'answers' => 'array',
    ];
}
