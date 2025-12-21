<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class UserFactory extends Factory
{
    public function definition():array{
        return[
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'password' => Hash::make('password'),
            'font_size' => fake()->randomFloat(1,1.0,1.5),
            'high_contrast' => fake()->boolean(15),
            'rememder_token' => str()->random(10),
        ];
    }
}
