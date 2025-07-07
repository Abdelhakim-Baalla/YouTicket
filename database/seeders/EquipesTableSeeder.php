<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EquipesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('equipes')->insert([
            [
                'id' => 1,
                'nom' => 'Equipe 1',
                'description' => 'This is Equipe 1',
                'responsable' => 1,
                'email' => 'equipe1@gmail.com',
                'telephone' => '+212545157867',
                'specialite' => 'Back-end',
                'active' => 0,
                'created_at' => '2025-06-04 13:33:50',
                'updated_at' => '2025-06-24 13:11:50',
            ],
            [
                'id' => 2,
                'nom' => 'Equipe 2',
                'description' => 'This is Equipe 2',
                'responsable' => 3,
                'email' => 'equipe2@gmail.com',
                'telephone' => '+212785269548',
                'specialite' => 'UX/UI',
                'active' => 1,
                'created_at' => '2025-06-04 13:44:50',
                'updated_at' => '2025-07-03 10:19:07',
            ],
            [
                'id' => 7,
                'nom' => 'Equipe 7',
                'description' => 'This is Equipe 7',
                'responsable' => 2,
                'email' => 'equipe7@gmail.com',
                'telephone' => '+212635975128',
                'specialite' => 'Réseaux',
                'active' => 1,
                'created_at' => '2025-06-10 12:56:53',
                'updated_at' => '2025-06-20 09:47:16',
            ],
        ]);
    }
}