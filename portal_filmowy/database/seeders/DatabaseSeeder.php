<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder{
    public function run():void{
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            MovieSeeder::class,
            ActorSeeder::class,
            DirectorSeeder::class,
            MovieRelationSeeder::class,
            ReviewSeeder::class,
        ]);
    }
}