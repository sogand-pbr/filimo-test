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
        $price = rand(1000 , 9000) * 1000;
        $offer = rand(0 , 20);
        $final_price = $price - ($price * ($offer /100));
        return [
            'qty' => rand(0 , 50),
            'title' => $this->faker->realText(80),
            'price' => $price,
            'offer' => $offer,
            'final_price' => $final_price,
        ];
    }
}
