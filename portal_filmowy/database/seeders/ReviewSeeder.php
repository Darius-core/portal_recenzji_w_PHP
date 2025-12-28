<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Review;
use App\Models\Movie;
use App\Models\User;

class ReviewSeeder extends Seeder{
    public function run():void{
        Review::truncate();

        $users = User::all();

        Movie::all()->each(function ($movie) use ($users) {
            Review::factory(rand(3,10))->create([
                'movie_id' => $movie->id,
                'user_id' => $users->random()->id,
            ]);
        });
    }
}
