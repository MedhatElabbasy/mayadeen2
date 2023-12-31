<?php

namespace App\Models;

use App\Enums\Survey as SurveyEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Survey extends Model
{
    use HasFactory;

    public $fillable = [
        'experience',
        'guidelines',
        'literaryEvents',
        'entertainmentEvents',
        'restaurant',
        'referral',
        'next',
        'suggestion',
        'rating',
        'opinion',
    ];

    protected $casts = [
        'experience'          => SurveyEnum::class,
        'guidelines'          => SurveyEnum::class,
        'literaryEvents'      => SurveyEnum::class,
        'entertainmentEvents' => SurveyEnum::class,
        'organization'        => SurveyEnum::class,
        'restaurant'          => SurveyEnum::class,
        'referral'            => SurveyEnum::class,
        'next'                => SurveyEnum::class,
        'suggestion'          => SurveyEnum::class,
        'rating'              => 'array',
    ];
}
