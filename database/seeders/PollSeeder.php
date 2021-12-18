<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Poll;

class PollSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Poll::factory()
            ->count(10)
            ->create();
    }
}
