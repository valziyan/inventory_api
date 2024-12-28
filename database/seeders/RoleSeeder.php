<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'superadmin']); // Role ID 1
        Role::create(['name' => 'admin']);      // Role ID 2
        Role::create(['name' => 'manager']);    // Role ID 3
        Role::create(['name' => 'staff']);      // Role ID 4
    }
}
