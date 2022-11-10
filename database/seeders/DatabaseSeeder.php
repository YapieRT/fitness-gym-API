<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Seed Tickets with Data
        /////////////////////////////////////////////
        DB::table('season_ticket_overview')->insert([
            'name' => 'basic',
            'sessions_amount' => 8,
            'price' => 400
        ]);

        DB::table('season_ticket_overview')->insert([
            'name' => 'basic_plus',
            'sessions_amount' => 12,
            'price' => 500
        ]);

        DB::table('season_ticket_overview')->insert([
            'name' => 'unlimited',
            'sessions_amount' => 999,
            'price' => 600
        ]);
        //////////////////////////////////////////////
    }
}
