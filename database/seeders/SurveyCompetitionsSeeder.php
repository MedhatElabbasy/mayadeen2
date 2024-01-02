<?php

namespace Database\Seeders;

use App\Models\Competition;
use App\Models\SurveyCompetition;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SurveyCompetitionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $competitions = Competition::all();

        foreach ($competitions as $competition) {
            SurveyCompetition   ::factory()->create([
                'competition_id' => $competition->id,
            ]);
        }
    }
}