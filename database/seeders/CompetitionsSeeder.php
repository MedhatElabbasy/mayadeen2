<?php

namespace Database\Seeders;

use App\Models\Team;
use App\Models\Competition;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CompetitionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Competition::create(['name' => 'Competition 1']);
         Competition::create(['name' => 'Competition 2']);

    }
}