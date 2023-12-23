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
        $user = User::firstOrCreate([
                    'email' => 'admin@email.com',
                ], [
                    'name' => 'Admin',
                    'password' => 'admin',
                    'email_verified_at' => now(),
                ]);

        $user->syncRoles(['superAdmin']);
    }
}
