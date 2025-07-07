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
                'nom' => 'agent',
                'description' => 'this is agent role',
                'created_at' => '2025-06-04 10:44:19',
                'updated_at' => '2025-06-04 10:44:19',
            ],
            [
                'id' => 2,
                'nom' => 'admin',
                'description' => 'this is admin role',
                'created_at' => '2025-06-04 10:44:49',
                'updated_at' => '2025-06-04 10:44:49',
            ],
            [
                'id' => 3,
                'nom' => 'utilisateur',
                'description' => 'this is user or client role',
                'created_at' => '2025-06-04 10:45:09',
                'updated_at' => '2025-06-04 10:45:09',
            ],
        ]);
    }
}