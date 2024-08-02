<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class UserTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user_types')->insert([
            ['type' => 'Customer', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['type' => 'Seller', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['type' => 'Admin', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}
