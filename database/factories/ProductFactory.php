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
            'title' => fake()->words(3, true),
            'description' => fake()->sentence(10),
            'price' => fake()->randomFloat(2, 10, 1000),
            'discount_percentage' => fake()->randomFloat(2, 0, 50),
            'rating' => fake()->randomFloat(2, 1, 5),
            'stock' => fake()->numberBetween(0, 100),
            'brand' => fake()->company(),
            'category' => fake()->randomElement(['Smartphones', 'Laptops', 'Fragrances', 'Skincare', 'Groceries', 'Home Decoration']),
            'thumbnail' => 'https://placehold.co/200',
            'images' => [
                'https://placehold.co/200',
                'https://placehold.co/200',
                'https://placehold.co/200',
            ],
        ];
    }
}
