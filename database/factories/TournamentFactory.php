<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tournament>
 */
class TournamentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement(['Tournament Name 1', 'Tournament Name 2', 'Tournament Name 3', 'Tournament Name 4']),
            'game' => fake()->randomElement(['chess', 'football', 'basketball', 'tennis', 'ping-pong']),
            'date' => fake()->dateTime(),
            'country' => fake()->country(),
            'address' => fake()->address(),
            'description' => fake()->sentences()
        ];
    }
}
