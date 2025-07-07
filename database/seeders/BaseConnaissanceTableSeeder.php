<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BaseConnaissanceTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('base_connaissances')->insert([
            [
                'id' => 1,
                'titre' => 'Bienvenue sur la base de connaissances',
                'contenu' => 'Ceci est un article de démonstration.',
                'categorie_kb_id' => 1,
                'auteur_id' => 1,
                'statut' => 'publie',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
