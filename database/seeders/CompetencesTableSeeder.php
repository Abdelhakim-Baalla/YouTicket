<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompetencesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('competences')->insert([
            [
                'id' => 1,
                'nom' => 'Support Technique',
                'description' => 'Compétence de support technique',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
