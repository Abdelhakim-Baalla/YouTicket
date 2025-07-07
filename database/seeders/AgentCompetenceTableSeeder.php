<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AgentCompetenceTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('agent_competence')->insert([
            [
                'agent_id' => 1,
                'competence_id' => 1,
            ],
        ]);
    }
}
