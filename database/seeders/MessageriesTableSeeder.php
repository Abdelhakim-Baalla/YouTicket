<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MessageriesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('messageries')->insert([
            [
                'id' => 1,
                'expediteur_id' => 1,
                'destinataire_id' => 1,
                'sujet' => 'Bienvenue',
                'message' => 'Bienvenue sur YouTicket !',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
