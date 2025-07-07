<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EquipeMembresTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('equipe_membres')->insert([
            [
                'id' => 1,
                'equipe_id' => 1,
                'agent' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
