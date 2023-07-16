<?php

namespace Database\Factories;

use App\Models\Rating;
use App\Models\Show;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rating>
 */
class RatingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'show_id' => Show::inRandomOrder()->first()->id,
            'rating' => fake()->numberBetween(1, 10)
        ];
    }
}
