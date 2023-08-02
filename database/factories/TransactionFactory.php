<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => fake()->numberBetween(1,2),
            'product_id' => fake()->numberBetween(7,9),
            'tqty' => fake()->numberBetween(1,20),
            'tprice' => fake()->numberBetween(10000,20000),
            'payment_id' => fake()->numberBetween(1,2),
            'status_id' => fake()->numberBetween(1,2),
        ];
    }
}
