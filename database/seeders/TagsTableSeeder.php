<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('tags')->insert([
            [
                'id' => 1,
                'nom' => 'Urgent',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'nom' => 'Bug',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
