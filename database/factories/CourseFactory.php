<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'slug' => fake()->slug(),
            'hour_price' => fake()->randomFloat(2, 100, 10000),
            'no_hours' => fake()->randomNumber(2),
            'type' => fake()->randomElement(),
        ];
    }
}
