<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Enums\UserRoleEnum;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->withPersonalTeam()->create([
            'name' => 'Super Admin',
            'email' => 'admin@admin.com',
            'username' => 'admin',
            'role' => UserRoleEnum::SUPERADMIN,
        ]);
    }
}
