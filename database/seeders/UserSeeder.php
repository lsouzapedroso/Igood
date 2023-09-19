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
            'name' => 'Luiz Carlos',
            'email' => 'luiz@ccbeuguarapuava.com.br',
            'password' => Hash::make('Olaamigo18!'),
            'access_level' => 0,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
