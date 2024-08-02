<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'email'    => 'admin@tracking.fc2.com',
            'is_admin' => true,
        ]);

        User::factory()->create([
            'email' => 'user01@tracking.fc2.com',
        ]);

        User::factory()->create([
            'email' => 'user02@tracking.fc2.com',
        ]);
    }
}
