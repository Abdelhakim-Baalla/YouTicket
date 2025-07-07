<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EtatsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('etats')->insert([
            [
                'id' => 1,
                'nom' => 'Nouveau',
                'description' => 'Ticket nouvellement créé',
                'couleur' => '#3498db',
                'actif' => 1,
                'created_at' => '2025-06-03 11:29:01',
                'updated_at' => '2025-06-03 11:29:01',
            ],
            [
                'id' => 2,
                'nom' => 'En cours',
                'description' => 'Ticket en cours de traitement',
                'couleur' => '#f39c12',
                'actif' => 1,
                'created_at' => '2025-06-03 11:29:01',
                'updated_at' => '2025-06-03 11:29:01',
            ],
            [
                'id' => 3,
                'nom' => 'En attente',
                'description' => 'En attente d\'informations',
                'couleur' => '#e74c3c',
                'actif' => 1,
                'created_at' => '2025-06-03 11:29:01',
                'updated_at' => '2025-06-03 11:29:01',
            ],
            [
                'id' => 4,
                'nom' => 'Résolu',
                'description' => 'Ticket résolu',
                'couleur' => '#2ecc71',
                'actif' => 1,
                'created_at' => '2025-06-03 11:29:01',
                'updated_at' => '2025-06-03 11:29:01',
            ],
            [
                'id' => 5,
                'nom' => 'Fermé',
                'description' => 'Ticket fermé',
                'couleur' => '#95a5a6',
                'actif' => 1,
                'created_at' => '2025-06-03 11:29:01',
                'updated_at' => '2025-06-03 11:29:01',
            ],
        ]);
    }
}