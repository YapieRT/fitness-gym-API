<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Андрій',
            'surname' => 'Андрійович',
            'phone_number' => '0991234123',
            'password' => Hash::make('password'),
        ]);
        DB::table('users')->insert([
            'name' => 'Олександр',
            'surname' => 'Олександрович',
            'phone_number' => '0661294987',
            'password' => Hash::make('password'),
        ]);
        DB::table('users')->insert([
            'name' => 'Петро',
            'surname' => 'Петрович',
            'phone_number' => '0508894987',
            'password' => Hash::make('password'),
        ]);
    }
}
