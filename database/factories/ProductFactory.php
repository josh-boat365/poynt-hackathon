<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use Illuminate\Support\Facades\Http;
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
            'image' => $this->retriveURL(),
            'price' => $this->faker->randomNumber(4, false),
            'description' => $this->faker->sentence(),
            'category_id' => Category::factory(),
        ];
    }

    public function fetchImage() {

        $files = Storage::disk('public')->files('images'); 

        // dd($files);

        $randomFile = $files[array_rand($files)];

        // dd(str_replace('images/','',$randomFile));/


        return file_get_contents(storage_path('app\public\images\\'.str_replace('images/','',$randomFile)));
        // return $randomFile;
        
    }

    public function retriveURL() {
       //encode image in base64
       $result = Http::withBody(
            base64_encode($this->fetchImage()), 'image/jpeg'
        )->post('https://914c-154-160-27-206.ngrok-free.app/image/upload');

        logger()->info($result->json());

       return $result->json('imagePath');

    }
}
