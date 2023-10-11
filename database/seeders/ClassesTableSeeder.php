<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'Kinder 1',
            'Kinder 2',
            'Starter',
            'Kids 1',
            'Kids 2',
            'Kids 3',
            'Teens 1',
            'Teens 2',
            'Teens 3',
            'Basic 1',
            'Basic 2',
            'Intermediate 1',
            'Intermediate 2',
            'High Intermediate 1',
            'High Intermediate 2',
            'Advanced 1',
            'Advanced 2',
            'High Advanced 1',
            'High Advanced 2',
        ];

        $classIds = [
            '2',
            '3',
            '4',
            '5',
            '6',
            '7',
            '8',
            '9',
            '12',
            '11',
            '12',
            '13',
            '14',
            '15',
            '16',
            '17',
            '18',
            '19',
            null
        ];

        // Inserir novos registros
        foreach ($data as $index => $row) {
            DB::table('classes')->insert([
                'name' => $row,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        foreach ($classIds as $index => $classId) {
            $classIndex = $index + 1;

            DB::table('classes')
                ->where('id', $classIndex)
                ->update([
                    'next_class_id' => $classId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
        }

    }
}
