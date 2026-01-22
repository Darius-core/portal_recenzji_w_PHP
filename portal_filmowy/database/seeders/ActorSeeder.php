<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Actor;

class ActorSeeder extends Seeder
{
    public function run(): void
    {

        Actor::factory(500)->create();
    }
}