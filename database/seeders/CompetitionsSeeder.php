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
        foreach ([
            [
                "key"   => "is_end",
                "value" => false,
                "type"  => "bool"
            ],
            [
                "key"   => "round_1_day",
                "value" => null,
                "type"  => "date"
            ],
            [
                "key"   => "round_1_start_time",
                "value" => null,
                "type"  => "time"
            ],
            [
                "key"   => "round_1_start_end",
                "value" => null,
                "type"  => "time"
            ],
            [
                "key"   => "round_2_day",
                "value" => null,
                "type"  => "date"
            ],
            [
                "key"   => "round_2_start_time",
                "value" => null,
                "type"  => "time"
            ],
            [
                "key"   => "round_2_start_end",
                "value" => null,
                "type"  => "time"
            ],
        ] as $row) {
            Competition::create([
                'key'   => $row['key'],
                'value' => $row['value'],
                'type'  => $row['type']
            ]);
        }
    }
}
