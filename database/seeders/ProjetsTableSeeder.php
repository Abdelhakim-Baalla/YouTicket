<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjetsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('projets')->insert([
            [
                'id' => 1,
                'nom' => 'Projet Démo',
                'description' => 'Projet de démonstration initial.',
                'responsable_id' => 1,
                'date_debut' => now()->toDateString(),
                'date_fin' => null,
                'statut' => 'en_cours',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
