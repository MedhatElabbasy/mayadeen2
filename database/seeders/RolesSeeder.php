<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = [
            'name' => 'superAdmin',
        ];

        $supervisor = [
            'name' => 'supervisor',
        ];

        Role::create($admin);
        Role::create($supervisor);
    }
}
