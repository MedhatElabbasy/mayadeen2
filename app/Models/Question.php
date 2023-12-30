<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Question extends Model
{
    use HasFactory;

    public $fillable = [
        'content',
        'answers',
    ];

    protected $casts = [
        'answers' => 'array',
    ];
}
