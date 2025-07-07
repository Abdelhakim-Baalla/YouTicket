<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('admins')->insert([
            [
                'nom' => 'Admin',
                'prenom' => 'Super',
                'email' => 'admin@youticket.local',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
