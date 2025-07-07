<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PieceJointesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('piece_jointes')->insert([
            [
                'ticket_id' => 76,
                'utilisateur_id' => 1,
                'nom_original' => 'capture.png',
                'nom_fichier' => 'capture_76_1.png',
                'chemin' => 'uploads/tickets/76/capture_76_1.png',
                'type_mime' => 'image/png',
                'taille' => 204800,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
