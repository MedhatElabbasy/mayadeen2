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
                "key"   => "day",
                "value" => null,
                "type"  => "date",
                'label' => 'يوم المنافسة',
            ],
            [
                "key"   => "round_1_start_time",
                "value" => null,
                "type"  => "time",
                'label' => 'وقت بدء الجولة الأولى',
            ],
            [
                "key"   => "round_1_end_time",
                "value" => null,
                "type"  => "time",
                'label' => 'وقت انتهاء الجولة الأولى',
            ],
            [
                "key"   => "round_2_start_time",
                "value" => null,
                "type"  => "time",
                'label' => 'وقت بدء الجولة الثانية',

            ],
            [
                "key"   => "round_2_end_time",
                "value" => null,
                "type"  => "time",
                'label' => 'وقت انتهاء الجولة الثانية',

            ],
            [
                "key"   => "round_3_start_time",
                "value" => null,
                "type"  => "time",
                'label' => 'وقت بدء الجولة الثالثة',
            ],
            [
                "key"   => "round_3_end_time",
                "value" => null,
                "type"  => "time",
                'label' => 'وقت انتهاء الجولة الثالثة',
            ],
        ] as $row) {
            Competition::create([
                'key'   => $row['key'],
                'value' => $row['value'],
                'type'  => $row['type'],
                'label'  => $row['label']
            ]);
        }
    }
}
