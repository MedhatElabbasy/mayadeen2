<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\GamesSeeder;
use Database\Seeders\TeamsSeeder;
use Database\Seeders\CompetitionsSeeder;

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
            GamesSeeder::class,
            TeamsSeeder::class,
        ]);
    }
}