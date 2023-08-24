<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Slider>
 */
class SliderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'small_title_ar' => fake()->word(),
            'small_title_en' => fake()->word(),
            'big_title_ar' => fake()->word(),
            'big_title_en' => fake()->word(),
            'image' =>  str_replace('public/uploads/sliders', '', fake()->image('public/uploads/sliders', $width = 1200, $height = 1486, 'sliders')),
        ];
    }
}
