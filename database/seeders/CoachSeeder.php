<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Type\Integer;

class CoachSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('coaches')->insert([
            'name' => 'Петро',
            'surname' => 'Василенко',
            'phone_number' => '0991234567',
            'one_session_price' => 300,
        ]);
        DB::table('coaches')->insert([
            'name' => 'Василь',
            'surname' => 'Андрійович',
            'phone_number' => '0991834567',
            'one_session_price' => 400,
        ]);
        DB::table('coaches')->insert([
            'name' => 'Марія',
            'surname' => 'Миколаївна',
            'phone_number' => '0991835967',
            'one_session_price' => 500,
        ]);
    }
}
