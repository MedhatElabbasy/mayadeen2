<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::firstOrCreate([
            'key' => 'siteName',
        ], [
            'label' => 'إسم الموقع',
            'value' => 'ميادين',
            'type' => 'text',
        ]);

        Setting::firstOrCreate([
            'key' => 'questionsNumber',
        ], [
            'label' => 'عدد الأسئلة',
            'value' => 1,
            'type' => 'number',
        ]);
    }
}