<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiscountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public static function run()
    {
        // Seed Discounts with Data
        /////////////////////////////////////////////
        DB::table('discounts')->insert([
            'name' => 'alpha',
            'multiplier' => 0.9
        ]);

        DB::table('discounts')->insert([
            'name' => 'beta',
            'multiplier' => 0.85
        ]);

        DB::table('discounts')->insert([
            'name' => 'gamma',
            'multiplier' => 0.8
        ]);
        //////////////////////////////////////////////
    }
}
