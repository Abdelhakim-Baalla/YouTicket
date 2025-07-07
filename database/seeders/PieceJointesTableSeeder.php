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
                'id' => 1,
                'ticket_id' => 1,
                'utilisateur_id' => 1,
                'nom_original' => 'demo.pdf',
                'nom_fichier' => 'demo_1_1.pdf',
                'chemin' => 'uploads/tickets/1/demo_1_1.pdf',
                'type_mime' => 'application/pdf',
                'taille' => 12345,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
