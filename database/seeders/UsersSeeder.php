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
        $superAdmin = [
            'name' => 'Super Admin',
            'email' => 'superadmin@email.com',
            'password' => 'superAdmin',
            'email_verified_at' => now(),
        ];

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

        $visitorsSupervisor = [
            'name' => 'visitorsSupervisor',
            'email' => 'visitorssupervisor@email.com',
            'password' => 'visitorsSupervisor',
            'email_verified_at' => now(),
        ];

        $superAdmin = User::create($superAdmin);
        $superAdmin->assignRole('superAdmin');

        $admin = User::create($admin);
        $admin->assignRole('admin');

        $supervisor = User::create($supervisor);
        $supervisor->assignRole('supervisor');

        
        $visitorsSupervisor = User::create($visitorsSupervisor);
        $visitorsSupervisor->assignRole('visitorsSupervisor');
    }
}
