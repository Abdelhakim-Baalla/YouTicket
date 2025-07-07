<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            EtatsTableSeeder::class,
            PrioritesTableSeeder::class,
            FrequencesTableSeeder::class,
            TypeTicketsTableSeeder::class,
            RolesTableSeeder::class,
            HorairesTravailTableSeeder::class,
            ProjetsTableSeeder::class,
            SlasTableSeeder::class,
            EquipesTableSeeder::class,
            AgentsTableSeeder::class,
            TicketsTableSeeder::class,
            CommentairesTableSeeder::class,
            PieceJointesTableSeeder::class,
            NotificationsTableSeeder::class,
        ]);
    }
}