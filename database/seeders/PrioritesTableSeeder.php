<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrioritesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('priorites')->insert([
            [
                'id' => 1,
                'nom' => 'Critique',
                'description' => 'Impact majeur sur le business',
                'niveau' => 1,
                'couleur' => '#e74c3c',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'nom' => 'Haute',
                'description' => 'Impact important sur les opérations',
                'niveau' => 2,
                'couleur' => '#f39c12',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'nom' => 'Moyenne',
                'description' => 'Impact modéré',
                'niveau' => 3,
                'couleur' => '#3498db',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'nom' => 'Basse',
                'description' => 'Impact faible',
                'niveau' => 4,
                'couleur' => '#2ecc71',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
