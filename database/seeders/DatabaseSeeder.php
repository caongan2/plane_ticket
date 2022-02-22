<?php

namespace Database\Seeders;

use App\Models\MailAdmin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//         \App\Models\Ticket::factory(20)->create();
        MailAdmin::factory()->create();
    }
}
