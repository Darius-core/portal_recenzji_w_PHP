<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // WYŁĄCZAMY BLOKADY KLUCZY OBCYCH
        Schema::disableForeignKeyConstraints();

        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            MovieSeeder::class,
            ActorSeeder::class,
            DirectorSeeder::class,
            MovieRelationSeeder::class,
            ReviewSeeder::class,
        ]);

        // WŁĄCZAMY BLOKADY Z POWROTEM
        Schema::enableForeignKeyConstraints();
    }
}