<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title_en' => fake()->word(),
            'title_ar' => fake()->word(),
            'logo' =>  str_replace('public/uploads/cats', '', fake()->image('public/uploads/cats', $width = 1200, $height = 1486, 'clothes')),
        ];
    }
}
