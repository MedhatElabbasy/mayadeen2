<?php

namespace App\Models;

use App\Models\SurveyCompetition;
use App\Models\SurveyCompetitionVote;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SurveyCompetitionRound extends Model
{
    protected $fillable = ['name', 'surveycompetition_id'];
    protected $table='surveycompetitions_rounds';


    public function survey()
    {
        return $this->belongsTo(SurveyCompetition::class);
    }

    public function votes()
    {
        return $this->hasMany(SurveyCompetitionVote::class);
    }
}