<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CoachSeeder::class,
            DiscountSeeder::class,
            TicketSeeder::class,
            UserSeeder::class]);
    }
}
