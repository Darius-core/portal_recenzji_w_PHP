<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Review;
use App\Models\Movie;
use App\Models\User;

class ReviewSeeder extends Seeder
{
    public function run(): void
    {

        $users = User::all();

        Movie::all()->each(function ($movie) use ($users) {
            // Zabezpieczenie na wypadek małej liczby użytkowników
            $count = min(rand(3, 10), $users->count());
            $usersForMovie = $users->random($count);

            foreach($usersForMovie as $user){
                Review::factory()->create([
                    'movie_id' => $movie->id,
                    'user_id' => $user->id,
                ]);
            }
        });
    }
}