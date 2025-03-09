<?php

namespace Database\Factories;

use App\Models\Tournament;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Round>
 */
class RoundFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement(['Round 1', 'Round 2', 'Round 3', 'Round 4', 'Round 5', 'Quarter-finals', 'Semi-finals', 'Finals']),
            'tournament_id' => Tournament::factory()
        ];
    }
}
