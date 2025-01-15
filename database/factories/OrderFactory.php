<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Address;
use App\Models\Order;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    protected $model = Order::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'uid' => fake()->numberBetween(3, 17), // User::factory(),
            'shippingAddressId' => Address::factory(),
            'status' => $this->faker->randomElement(['Pending', 'Completed', 'Cancelled']),
            'totalPrice' => $this->faker->randomFloat(2, 50, 500),
        ];
    }
}
