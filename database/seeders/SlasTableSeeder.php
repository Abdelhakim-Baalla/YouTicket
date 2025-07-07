<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SlasTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('slas')->insert([
            [
                'id' => 1,
                'nom' => 'SLA Standard',
                'description' => 'SLA pour les tickets normaux',
                'temps_reponse_heures' => 8,
                'temps_resolution_heures' => 24,
                'priorite_id' => 3,
                'horaire_travail_id' => 1,
                'actif' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'nom' => 'SLA Urgent',
                'description' => 'SLA pour les tickets urgents',
                'temps_reponse_heures' => 2,
                'temps_resolution_heures' => 8,
                'priorite_id' => 2,
                'horaire_travail_id' => 1,
                'actif' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
