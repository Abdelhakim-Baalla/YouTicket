<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EquipesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('equipes')->insert([
            [
                'id' => 1,
                'nom' => 'Equipe Démo',
                'description' => 'Equipe principale de démonstration',
                'responsable' => 1,
                'email' => 'equipe@youticket.local',
                'telephone' => '+33123456789',
                'specialite' => 'Support',
                'active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
