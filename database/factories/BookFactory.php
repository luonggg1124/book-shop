<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'price' => rand(90000,100000),
            'promotional_price' => rand(0,90000),
            'publisher' => fake()->firstName(),
            'quantity' => rand(10,100),
            'image' => Str::random(10),
            'category_id' => rand(1,3),
            'view' => rand(1,100)
            
        ];
    }
}
