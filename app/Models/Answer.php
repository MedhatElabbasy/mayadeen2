<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    public $fillable = [
        'content',
        'isCorrect',
        'question_id',
        'wrongText',
        'wrongImage',
    ];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
