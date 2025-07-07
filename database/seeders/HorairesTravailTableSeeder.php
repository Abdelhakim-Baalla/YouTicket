<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HorairesTravailTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('horaires_travail')->insert([
            [
                'id' => 1,
                'nom' => 'Standard',
                'horaires' => json_encode([
                    "lundi" => ["debut" => "09:00", "fin" => "18:00"],
                    "mardi" => ["debut" => "09:00", "fin" => "18:00"],
                    "mercredi" => ["debut" => "09:00", "fin" => "18:00"],
                    "jeudi" => ["debut" => "09:00", "fin" => "18:00"],
                    "vendredi" => ["debut" => "09:00", "fin" => "18:00"]
                ]),
                'fuseau_horaire' => 'Europe/Paris',
                'par_defaut' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
