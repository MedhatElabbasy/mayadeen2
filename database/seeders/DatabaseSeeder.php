<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Seeders\CompetitionsSeeder;
use Database\Seeders\TeamsSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RolesSeeder::class,
            UsersSeeder::class,
            SettingsSeeder::class,
            CompetitionsSeeder::class,
            TeamsSeeder::class,
            // SurveyCompetitionsSeeder::class,
            // SurveyCompetitionsRoundsSeeder::class,
            // SurveyCompetitionVotesSeeder::class,
        ]);
    }
}