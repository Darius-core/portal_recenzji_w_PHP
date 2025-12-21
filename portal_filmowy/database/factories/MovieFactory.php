<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MovieFactory extends Factory{
    public function definition():array{
        return [
            'title' => fake()->sentence(3),
            'description' => fake()->paragraphs(3,true),
            'release_year' => fake()->numberBetween(1970,2024),
            'poster_path' =>null,
        ];
    }
}