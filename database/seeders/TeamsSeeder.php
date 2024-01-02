<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TeamsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Team::create(['name' => 'Team A','competition_id'=>'1']);
        Team::create(['name' => 'Team B','competition_id'=>'2']);
    }
}