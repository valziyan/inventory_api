<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Superadmin User
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('Yreielle0610!'),
            'role_id' => 1, // Role ID for superadmin
        ]);

        // Admin User
        User::create([
            'name' => 'Ryan',
            'email' => 'ryan@example.com',
            'password' => Hash::make('Yreielle0610!'),
            'role_id' => 2, // Role ID for admin
        ]);

        // Generate Additional Users
        User::factory(10)->create(); // 10 random users
    }
}
