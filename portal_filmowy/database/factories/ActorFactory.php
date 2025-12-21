<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ActorFactory extends Factory{
    public function definition():array{
        return [
            'name' => fake()->name(),
            'surname' => fake()->surname(),
            'bio' => fake()->paragraph(),
            'birthday' => fake()->date('Y-m-d', '2000-01-01'),
        ];
    }
}