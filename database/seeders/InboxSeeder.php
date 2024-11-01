<?php

namespace Database\Seeders;

use App\Models\Inbox;
use App\Models\Sim;
use Illuminate\Database\Seeder;

class InboxSeeder extends Seeder
{
    public function run(): void
    {
        $sim = Sim::inRandomOrder()->first();
        Inbox::create([
            'sim_id' => $sim->id,
        ]);
    }
}
