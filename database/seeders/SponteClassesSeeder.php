<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SponteClassesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sponte_classes')->insert([
            'class_id' => 1,
            'name' => 'teste',
            'professor_id' => '1',
            'professor_name' => 'teste',
            'capacity' => '12',
            'semester' => "2/23",
            'time' => 't/q 19H'
        ]);
        DB::table('sponte_classes')->insert([
            'class_id' => 2,
            'name' => 'teste2',
            'professor_id' => '1',
            'professor_name' => 'teste',
            'capacity' => '12',
            'semester' => "2/23",
            'time' => 't/q 19H'
        ]);
        DB::table('sponte_classes')->insert([
            'class_id' => 3,
            'name' => 'teste3',
            'professor_id' => '1',
            'professor_name' => 'teste',
            'capacity' => '12',
            'semester' => "2/23",
            'time' => 't/q 19H'
        ]);
    }
}
