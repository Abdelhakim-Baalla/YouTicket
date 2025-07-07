<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RapportsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('rapports')->insert([
            [
                'id' => 1,
                'titre' => 'Rapport de test',
                'contenu' => 'Ceci est un rapport de test.',
                'createur_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
