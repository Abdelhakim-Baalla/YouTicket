<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorkflowsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('workflows')->insert([
            [
                'id' => 1,
                'nom' => 'Workflow principal',
                'description' => 'Workflow de base pour les tickets',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
