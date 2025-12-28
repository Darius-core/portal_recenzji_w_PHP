<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Modles\Movie;
use App\Modles\Actor;
use App\Modles\Director;

class MovieRelationSeeder extends Seeder{
    public function run():void{
        $actors = Actor::all();
        $directors = Director::all();

        Movie::all()->each(function ($movie) use ($actors, $directors) {
            $movie->actors()->attach(
                $actors->random(rand(2,5))->pluck('id')->toArray()
            );

            $movie->directors()->attach(
                $directors->random(rand(1,2))->pluck('id')->toArray()
            );
        });
    }
}