<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('roles')->insert([
            [
                'id' => 1,
                'nom' => 'admin',
                'description' => 'Rôle administrateur',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'nom' => 'agent',
                'description' => 'Rôle agent',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'nom' => 'utilisateur',
                'description' => 'Rôle utilisateur',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
