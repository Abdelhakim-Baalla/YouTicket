<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeTicketsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('type_tickets')->insert([
            [
                'id' => 1,
                'nom' => 'Incident',
                'description' => 'Problème technique à résoudre',
                'icone' => 'bug_report',
                'actif' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'nom' => 'Demande',
                'description' => 'Demande de service ou fonctionnalité',
                'icone' => 'help_outline',
                'actif' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'nom' => 'Problème',
                'description' => 'Problème nécessitant une investigation',
                'icone' => 'warning',
                'actif' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'nom' => 'Question',
                'description' => 'Question ou demande d\'information',
                'icone' => 'help',
                'actif' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
