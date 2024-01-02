<?php

namespace Database\Seeders;

use App\Models\Game;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GamesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Game::create(['competition_id' => 1, 'name' => 'Game 1']);
        Game::create(['competition_id' => 1, 'name' => 'Game 2']);
        Game::create(['competition_id' => 2, 'name' => 'Game 1']);
    }
}