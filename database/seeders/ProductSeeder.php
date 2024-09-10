<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        
        foreach (range(1, 50) as $index) {
            Product::create([
                'name' => $faker->word,
                'description' => $faker->text,
                'price' => $faker->randomFloat(2, 5, 100),
                'stock' => $faker->numberBetween(1, 100),
                'category_id' => $faker->numberBetween(1, 10),
            ]);
        }
    }
}
