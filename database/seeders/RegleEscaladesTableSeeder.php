<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegleEscaladesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('regle_escalades')->insert([
            [
                'id' => 1,
                'nom' => 'Escalade critique',
                'utilisateur_escalade_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
