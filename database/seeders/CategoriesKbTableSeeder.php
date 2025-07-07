<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesKbTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('categories_kb')->insert([
            [
                'id' => 1,
                'nom' => 'Général',
                'description' => 'Catégorie générale de la base de connaissances',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
