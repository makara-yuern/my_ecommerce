<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order;
use Faker\Factory as Faker;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 20) as $index) {
            Order::create([
                'user_id' => $faker->numberBetween(1, 10), // Adjust based on number of users
                'total_amount' => $faker->randomFloat(2, 20, 500),
                'status' => $faker->randomElement(['pending', 'completed', 'shipped']),
            ]);
        }
    }
}
