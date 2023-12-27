<?php

namespace App\Models;

use App\Enums\Survey as SurveyEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Survey extends Model
{
    use HasFactory;

    public $fillable = [
        'name',
        'email',
        'phone',
        'facilities',
        'organization',
        'events',
        'access',
        'rating',
        'opinion',
    ];

    protected $casts = [
        'facilities' => SurveyEnum::class,
        'organization' => SurveyEnum::class,
        'events' => SurveyEnum::class,
        'access' => SurveyEnum::class,
    ];
}
