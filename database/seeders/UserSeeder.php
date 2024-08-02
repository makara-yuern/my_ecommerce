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
            'email'    => 'admin@ecommerce.com',
            'is_admin' => true,
        ]);

        User::factory()->create([
            'email' => 'user01@ecommerce.com',
        ]);

        User::factory()->create([
            'email' => 'user02@ecommerce.com',
        ]);
    }
}
