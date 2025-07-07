<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TicketTagTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('ticket_tag')->insert([
            [
                'ticket_id' => 1,
                'tag_id' => 1,
            ],
        ]);
    }
}
