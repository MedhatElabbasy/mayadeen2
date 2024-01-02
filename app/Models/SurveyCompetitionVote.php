<?php

namespace App\Models;

use App\Models\Team;
use App\Models\SurveyCompetitionRound;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SurveyCompetitionVote extends Model
{
    use HasFactory;

    protected $fillable = ['team_id', 'surveycompetition_round_id'];
    protected $table='surveycompetition_votes';

    public function round()
    {
        return $this->belongsTo(SurveyCompetitionRound::class, 'surveycompetition_round_id');
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}