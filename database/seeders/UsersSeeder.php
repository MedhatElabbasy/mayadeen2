<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = [
            'name' => 'Admin',
            'email' => 'admin@email.com',
            'password' => 'admin',
            'email_verified_at' => now(),
        ];

        $supervisor = [
            'name' => 'Supervisor',
            'email' => 'supervisor@email.com',
            'password' => 'supervisor',
            'email_verified_at' => now(),
        ];

        $admin = User::create($admin);
        $supervisor = User::create($supervisor);
        $admin->assignRole('superAdmin');
        $supervisor->assignRole('supervisor');
        
    }
}
