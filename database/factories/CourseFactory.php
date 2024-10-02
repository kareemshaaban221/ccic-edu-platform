<?php

namespace Database\Factories;

use App\Enum\CourseTypeEnum;
use App\Models\Teacher;
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
        $slug = fake()->slug();
        return [
            'name' => ucwords(str_replace('-', ' ', $slug)),
            'slug' => $slug,
            'hour_price' => fake()->randomFloat(2, 100, 500),
            'no_hours' => fake()->randomNumber(2),
            'type' => fake()->randomElement(CourseTypeEnum::getValues()),
            'teacher_id' => Teacher::inRandomOrder()->first()->id,
        ];
    }
}
