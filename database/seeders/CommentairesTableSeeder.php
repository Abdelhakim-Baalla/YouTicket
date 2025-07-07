<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentairesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('commentaires')->insert([
            [
                'ticket_id' => 76,
                'utilisateur_id' => 1,
                'contenu' => 'Premier commentaire sur le ticket 76.',
                'interne' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
