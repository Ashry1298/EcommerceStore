<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id' => fake()->numberBetween(1, 10),
            'name_en' => fake()->word(),
            'name_ar' => fake()->word(),
            'price' => fake()->randomFloat(2, 1, 3),
            'main_image' =>  str_replace('public/uploads/products', '', fake()->image('public/uploads/products', $width = 1200, $height = 1486, 'products')),
            'desc_en' => fake()->text(),
            'desc_ar' => fake()->text(),
        ];
    }
}
