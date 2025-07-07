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
                    "jeudi" => ["fin" => "18:00", "debut" => "09:00"],
                    "lundi" => ["fin" => "18:00", "debut" => "09:00"],
                    "mardi" => ["fin" => "18:00", "debut" => "09:00"],
                    "mercredi" => ["fin" => "18:00", "debut" => "09:00"],
                    "vendredi" => ["fin" => "18:00", "debut" => "09:00"]
                ]),
                'fuseau_horaire' => 'Europe/Paris',
                'par_defaut' => 1,
                'created_at' => '2025-06-03 11:29:49',
                'updated_at' => '2025-06-03 11:29:49',
            ]
        ]);
    }
}