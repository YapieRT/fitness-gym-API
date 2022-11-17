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
            'description_title'=>'Група 1',
            'multiplier' => 0.9
        ]);

        DB::table('discounts')->insert([
            'name' => 'beta',
            'description_title'=>'Група 2',
            'multiplier' => 0.85
        ]);

        DB::table('discounts')->insert([
            'name' => 'gamma',
            'description_title'=>'Група 3',
            'multiplier' => 0.8
        ]);
        //////////////////////////////////////////////
    }
}
