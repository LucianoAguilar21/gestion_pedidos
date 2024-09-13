<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id'=>1,
            'customer_id'=>1,
            'status'=>'new',
            'delivery'=>true,
            'delivery_address'=>'Odiard 1535',
            'delivery_cost'=>fake()->randomFloat(1,20,30),
            'total'=>fake()->randomFloat(1,40,60)
        ];
    }
}
