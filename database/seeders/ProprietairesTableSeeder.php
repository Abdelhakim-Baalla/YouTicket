<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProprietairesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('proprietaires')->insert([
            [
                'id' => 1,
                'ticket_id' => 1,
                'utilisateur_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
