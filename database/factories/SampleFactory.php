<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sample>
 */
class SampleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->word(),
            'price' => fake()->randomNumber(4),
            'memo' => fake()->text(),
            'seq' => fake()->randomNumber(4),
            'created_at' => fake()->dateTimeBetween("-1 month", "-1 minutes"),
            'updated_at' => fake()->dateTimeBetween("-1 month", "-1 minutes"),
        ];
    }
}
