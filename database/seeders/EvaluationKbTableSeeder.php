<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EvaluationKbTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('evaluations_kb')->insert([
            [
                'id' => 1,
                'base_connaissance_id' => 1,
                'utilisateur_id' => 1,
                'note' => 5,
                'commentaire' => 'Très utile !',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
