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
                'created_at' => '2025-06-03 11:29:10',
                'updated_at' => '2025-06-03 11:29:10',
            ],
            [
                'id' => 2,
                'nom' => 'Haute',
                'description' => 'Impact important sur les opérations',
                'niveau' => 2,
                'couleur' => '#f39c12',
                'created_at' => '2025-06-03 11:29:10',
                'updated_at' => '2025-06-03 11:29:10',
            ],
            [
                'id' => 3,
                'nom' => 'Moyenne',
                'description' => 'Impact modéré',
                'niveau' => 3,
                'couleur' => '#3498db',
                'created_at' => '2025-06-03 11:29:10',
                'updated_at' => '2025-06-03 11:29:10',
            ],
            [
                'id' => 4,
                'nom' => 'Basse',
                'description' => 'Impact mineur',
                'niveau' => 4,
                'couleur' => '#2ecc71',
                'created_at' => '2025-06-03 11:29:10',
                'updated_at' => '2025-06-03 11:29:10',
            ],
        ]);
    }
}