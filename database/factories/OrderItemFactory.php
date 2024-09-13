<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderItem>
 */
class OrderItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
          'order_id'=>1,
          'product_id'=>fake()->numberBetween(1,9),
          'quantity'=>fake()->numberBetween(1,9),
            'sub_total'=> fake()->randomFloat(1,40,60)

        ];
    }
}
