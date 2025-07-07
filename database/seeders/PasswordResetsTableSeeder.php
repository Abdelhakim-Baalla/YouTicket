<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PasswordResetsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('password_resets')->insert([
            [
                'email' => 'admin@youticket.local',
                'token' => bcrypt('password'),
                'created_at' => now(),
            ],
        ]);
    }
}
