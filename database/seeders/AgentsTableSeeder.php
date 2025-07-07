<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AgentsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('agents')->insert([
            [
                'id' => 1,
                'utilisateur_id' => 1,
                'specialite' => 'Support',
                'niveau_experience' => 1,
                'disponible' => 1,
                'charge_travail' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
