<?php

namespace Database\Seeders;

use App\Models\SurveyCompetition;
use App\Models\SurveyCompetitionRound;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SurveyCompetitionsRoundsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $surveys = SurveyCompetition::all();

        foreach ($surveys as $survey) {
            SurveyCompetitionRound::factory()->create([
                'surveycompetition_id' => $survey->id,
            ]);
        }
    }
}