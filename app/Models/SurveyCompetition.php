<?php

namespace App\Models;

use App\Models\Competition;
use App\Models\SurveyCompetitionRound;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SurveyCompetition extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'competition_id'];
    protected $table='surveycompetitions';


    public function competition()
    {
        return $this->belongsTo(Competition::class);
    }

    public function rounds()
    {
        return $this->hasMany(SurveyCompetitionRound::class);
    }
}