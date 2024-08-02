<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SizeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sizes')->insert([
            ['size' => 'S', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['size' => 'M', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['size' => 'L', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['size' => 'X-L', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['size' => 'XX-L', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

        ]);
    }
}
