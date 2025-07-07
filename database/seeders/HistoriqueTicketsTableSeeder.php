<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HistoriqueTicketsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('historique_tickets')->insert([
            [
                'id' => 1,
                'ticket_id' => 1,
                'utilisateur_id' => 1,
                'action' => 'création',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
