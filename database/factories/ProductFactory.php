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
    public function definition()
    {
        return [
            "name"=> fake()->name(),
            "description" => fake()->realText(),
            "category_id" => fake()->numberBetween(1,10),
            "brand_id" => fake()->numberBetween(1,10),
            "sale" => 0,
            "price" => fake()->numberBetween(1,100),
            "sizes" => "",
            "colors" => "",
            "lenses" => ""
        ];
    }
}
