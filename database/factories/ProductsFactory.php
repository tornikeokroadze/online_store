<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Products>
 */
class ProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "title_ka" => $this->faker->word,
            "title_en" => $this->faker->sentence, 
            "price" => $this->faker->randomFloat(2, 5, 100),
            "category_id" => "1" 
        ];
    }
}
