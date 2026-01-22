<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Movie;
use Illuminate\Support\Facades\Schema;

class MovieSeeder extends Seeder{
    public function run():void{
        Schema::disableForeignKeyConstraints();
        Schema::enableForeignKeyConstraints();
        Movie::Factory(100)->create();
    }
}