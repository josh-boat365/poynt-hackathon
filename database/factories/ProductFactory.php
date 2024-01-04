<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

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
            'name' => $this->faker->randomElement([
                "Laptop",
                "Shoe",
                "Bag",
                "Bottle",
                "Destkop",
                "Shirt",
                "Plate",
                "Phone",
                "Headset",
                "Fan",
            ]),
            'image' => $this->fetchImage(),
            'price' => $this->faker->integer(),
            'description' => $this->faker->sentence(),
            'category_id' => Category::factory(),
        ];
    }

    public function fetchImage(): string {
        
    }
}
