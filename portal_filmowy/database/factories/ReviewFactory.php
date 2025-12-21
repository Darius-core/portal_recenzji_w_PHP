<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Facory{
    public function definition():array{
        return [
            'rating' => fake()->numberBetween(1,10),
            'content' => fake()->paragraphs(2,true),
        ];
    }
}