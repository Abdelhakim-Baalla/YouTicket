<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('permissions')->insert([
            [
                'id' => 1,
                'nom' => 'voir_tickets',
                'description' => 'Peut voir les tickets',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'nom' => 'creer_tickets',
                'description' => 'Peut créer des tickets',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
