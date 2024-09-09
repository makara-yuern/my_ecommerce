<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\OrderDetail;
use Faker\Factory as Faker;

class OrderDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 50) as $index) {
            OrderDetail::create([
                'order_id' => $faker->numberBetween(1, 20), 
                'product_id' => $faker->numberBetween(1, 50), 
                'quantity' => $faker->numberBetween(1, 5),
                'price' => $faker->randomFloat(2, 5, 100),
            ]);
        }
    }
}
