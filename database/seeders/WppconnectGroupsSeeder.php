<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WppconnectGroupsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('wppconnect_groups')->insert([
            'class_id' => 1,
            'session_id' => 1,
            'serialized_id' => '120363164302452551@g.us'
        ]);
        DB::table('wppconnect_groups')->insert([
            'class_id' => 2,
            'session_id' => 1,
            'serialized_id' => '120363147412309564@g.us'
        ]);
        DB::table('wppconnect_groups')->insert([
            'class_id' => 3,
            'session_id' => 1,
            'serialized_id' => '120363164690998920@g.us'
        ]);
    }
}
