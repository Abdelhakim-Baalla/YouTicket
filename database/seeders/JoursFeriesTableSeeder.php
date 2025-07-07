<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JoursFeriesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('jours_feries')->insert([
            [
                'id' => 1,
                'date' => '2025-01-01',
                'nom' => 'Jour de l\'An',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
