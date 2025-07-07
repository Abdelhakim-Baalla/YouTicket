<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PersonalAccessTokensTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('personal_access_tokens')->insert([
            [
                'id' => 1,
                'tokenable_type' => 'App\\Models\\Utilisateur',
                'tokenable_id' => 1,
                'name' => 'default',
                'token' => hash('sha256', 'token-demo'),
                'abilities' => '["*"]',
                'last_used_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
