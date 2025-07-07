<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TicketsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('tickets')->insert([
            [
                'id' => 1,
                'numero' => 'TICK-2024-000001',
                'titre' => 'Premier ticket',
                'description' => 'Ticket de test initial.',
                'demandeur_id' => 1,
                'assigne_a_id' => 1,
                'etat_id' => 1,
                'priorite_id' => 1,
                'type_ticket_id' => 1,
                'projet_id' => 1,
                'sla_id' => 1,
                'frequence_id' => 1,
                'date_echeance' => null,
                'date_premiere_reponse' => null,
                'date_resolution' => null,
                'temps_passe_minutes' => 0,
                'cout_estime' => null,
                'solution' => null,
                'champs_personnalises' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
