<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransitionsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('transitions')->insert([
            [
                'id' => 1,
                'workflow_id' => 1,
                'etat_source_id' => 1,
                'etat_destination_id' => 2,
                'nom' => 'Passer en cours',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
