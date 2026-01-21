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
            $usersForMovie = $users->random(rand(3, min(10, $users->count())));

            foreach($usersForMovie as $user){
                Review::factory()->create([
                    'movie_id' => $movie->id,
                    'user_id' => $user->id,
                ]);
            }
        });
    }
}
