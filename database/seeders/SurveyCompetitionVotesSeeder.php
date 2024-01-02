<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Seeder;
use App\Models\SurveyCompetitionRound;
use App\Models\SurveyCompetitionVote;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SurveyCompetitionVotesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rounds = SurveyCompetitionRound::all();
        $teams = Team::all();

        foreach ($rounds as $round) {
            foreach ($teams as $team) {
                SurveyCompetitionVote::factory()->create([
                    'surveycompetition_round_id' => $round->id,
                    'team_id' => $team->id,
                ]);
            }
        }
    }
}