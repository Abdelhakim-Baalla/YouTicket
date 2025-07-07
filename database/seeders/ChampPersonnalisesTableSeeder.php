<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChampPersonnalisesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('champ_personnalises')->insert([
            [
                'id' => 1,
                'nom' => 'Numéro de série',
                'type' => 'texte',
                'obligatoire' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
