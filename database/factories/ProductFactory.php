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
            'name' => $this->faker->sentence(2),
            'description' => $this->faker->paragraph,
            'size' => $this->faker->randomElement(['L', 'SM', 'XL']),
            'price' => $this->faker->randomFloat(2, 0, 1000), // Generate a random price between 0 and 1000
            'quantity' => $this->faker->randomNumber(2), // Generate a random quantity with 2 digits
            'type' => $this->faker->randomElement(['type1', 'type2', 'type3']), // Randomly choose from the given types
        ];

    }
}
