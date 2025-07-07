<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TemplatesTicketsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('templates_tickets')->insert([
            [
                'id' => 1,
                'nom' => 'Modèle de ticket standard',
                'contenu' => 'Contenu du modèle de ticket.',
                'createur_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
