<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UtilisateursTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('utilisateurs')->insert([
            [
                'nom' => 'Admin',
                'prenom' => 'Super',
                'email' => 'admin@youticket.local',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'telephone' => '0102030405',
                'poste' => 'Administrateur',
                'departement' => 'IT',
                'role_id' => 1,
                'equipe_id' => 1,
                'actif' => true,
                'derniere_connexion' => null,
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
