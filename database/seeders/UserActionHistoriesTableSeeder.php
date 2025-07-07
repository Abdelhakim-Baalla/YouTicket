<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserActionHistoriesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('user_action_histories')->insert([
            [
                'id' => 1,
                'user_id' => 1,
                'action' => 'create',
                'model_type' => 'App\\Models\\Utilisateur',
                'model_id' => 1,
                'old_values' => null,
                'new_values' => json_encode(['id' => 1, 'nom' => 'Admin']),
                'description' => 'Création de l\'utilisateur admin',
                'ip_address' => '127.0.0.1',
                'user_agent' => 'Seeder',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
