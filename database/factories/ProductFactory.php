<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

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
            'price' => $this->faker->randomNumber(4, false),
            'description' => $this->faker->sentence(),
            'category_id' => Category::factory(),
        ];
    }

    public function fetchImage() {
        $directory = public_path('images');
        $files = Storage::allFiles($directory); 

        $randomFile = $files[array_rand($files)];

        return $randomFile;
        
    }

    public function retriveURL() {
       //encode image in base64
       $image = "data:image/jpg;base64,".base64_encode( $this->fetchImage());

       return $image;
    }
}
