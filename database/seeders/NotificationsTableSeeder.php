<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NotificationsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('notifications')->insert([
            [
                'utilisateur_id' => 1,
                'ticket_id' => 1,
                'type' => 'nouveau_ticket',
                'titre' => 'Nouveau ticket créé',
                'message' => 'Un nouveau ticket a été créé.',
                'lu' => false,
                'date_envoi' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
