<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FrequencesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('frequences')->insert([
            [
                'id' => 1,
                'nom' => 'Unique',
                'description' => 'Problème survenu une seule fois',
                'duree_en_minutes' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'nom' => 'Occasionnelle',
                'description' => 'Problème survenu plusieurs fois',
                'duree_en_minutes' => 1440,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'nom' => 'Fréquente',
                'description' => 'Problème récurrent',
                'duree_en_minutes' => 720,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'nom' => 'Permanente',
                'description' => 'Problème constant',
                'duree_en_minutes' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
