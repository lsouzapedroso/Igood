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
            'id' => 1,
            'name' => 'admin',
            'email' => 'luiz@ccbeuguarapuava.com.br',
            'password' => Hash::make('1234'),
            'admin' => true,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('users')->insert([
            'id' => 2,
            'name' => 'Maria',
            'email' => 'maria@example.com',
            'password' => Hash::make('abcdef'),
            'admin' => false,
        ]);
    }
}
