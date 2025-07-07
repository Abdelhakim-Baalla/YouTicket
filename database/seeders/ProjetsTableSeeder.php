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
                'nom' => 'Site Web',
                'description' => 'Développement du site web corporate',
                'responsable_id' => 3,
                'date_debut' => '2025-01-01',
                'date_fin' => '2025-12-31',
                'statut' => 'annule',
                'created_at' => '2025-06-03 11:29:39',
                'updated_at' => '2025-06-03 11:29:39',
            ],
            [
                'id' => 2,
                'nom' => 'Application Mobile',
                'description' => 'Développement de l\'application mobile',
                'responsable_id' => 3,
                'date_debut' => '2025-03-01',
                'date_fin' => '2025-11-30',
                'statut' => 'en_cours',
                'created_at' => '2025-06-03 11:29:39',
                'updated_at' => '2025-06-03 11:29:39',
            ],
        ]);
    }
}