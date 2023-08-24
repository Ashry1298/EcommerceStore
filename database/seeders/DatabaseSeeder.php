<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Tag;
use App\Models\Product;
use App\Models\Category;
use App\Models\Slider;
use Database\Factories\SliderFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Slider::factory()
            ->count(3)
            ->create();
        Category::factory()
            ->count(10)
            ->create();
        Tag::factory()
            ->count(10)
            ->create();
        // Product::factory()
        //     ->count(10)
        //     ->create();
    }
}
