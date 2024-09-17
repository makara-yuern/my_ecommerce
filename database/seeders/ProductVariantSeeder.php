<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProductVariantSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $products = Product::all();

        foreach ($products as $product) {
            ProductVariant::create([
                'product_id' => $product->id,
                'variant_name' => 'Small',
                'size' => 'small',
                'variant_color' => 'Red',
                'price' => $product->price - 5,
                'stock' => 10,
                'image' => 'path_to_variant_image_1.jpg',
                'description' => $faker->text,
            ]);

            ProductVariant::create([
                'product_id' => $product->id,
                'variant_name' => 'Medium',
                'size' => 'Medium',
                'variant_color' => 'Blue',
                'price' => $product->price - 3,
                'stock' => 8,
                'image' => 'path_to_variant_image_2.jpg',
                'description' => $faker->text,
            ]);

            ProductVariant::create([
                'product_id' => $product->id,
                'variant_name' => 'Large',
                'size' => 'Large',
                'variant_color' => 'Green',
                'price' => $product->price,
                'stock' => 5,
                'image' => 'path_to_variant_image_3.jpg',
                'description' => $faker->text,
            ]);
        }
    }
}
