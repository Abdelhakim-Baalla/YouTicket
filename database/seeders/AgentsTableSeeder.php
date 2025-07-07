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
                'utilisateur_id' => 25,
                'specialite' => 'Developpement Web',
                'niveau_experience' => 1,
                'disponible' => 1,
                'charge_travail' => 0,
                'created_at' => '2025-06-05 10:03:46',
                'updated_at' => '2025-06-05 10:03:46',
            ],
            [
                'id' => 2,
                'utilisateur_id' => 6,
                'specialite' => 'Marketing',
                'niveau_experience' => 1,
                'disponible' => 0,
                'charge_travail' => 0,
                'created_at' => '2025-06-11 11:56:06',
                'updated_at' => '2025-06-11 11:56:06',
            ],
            [
                'id' => 3,
                'utilisateur_id' => 28,
                'specialite' => 'Design Graphique',
                'niveau_experience' => 1,
                'disponible' => 1,
                'charge_travail' => 0,
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'id' => 4,
                'utilisateur_id' => 15,
                'specialite' => 'devops',
                'niveau_experience' => 1,
                'disponible' => 1,
                'charge_travail' => 0,
                'created_at' => null,
                'updated_at' => null,
            ],
        ]);
    }
}