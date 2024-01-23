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
        foreach ([
            ['name' => 'superAdmin'],
            ['name' => 'admin'],
            ['name' => 'supervisor'],
            ['name' => 'employee'],
            ['name' => 'visitorsSupervisor'],
        ] as $role) {
            Role::create($role);
        }
    }
}
