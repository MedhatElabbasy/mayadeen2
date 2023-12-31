<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SettingsSeeder extends Seeder
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
            'key' => 'questionsCount',
        ], [
            'label' => 'عدد أسئلة التحديات',
            'value' => 6,
            'type' => 'number',
        ]);

        Setting::firstOrCreate([
            'key' => 'shareYourPoemQrCode',
        ], [
            'label' => 'رمز الاستجابة السريعة لمشاركة قصيدتك',
            'value' => null,
            'type' => 'image',
        ]);
    }
}