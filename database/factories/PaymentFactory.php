<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    protected $model = Payment::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'orderId' => Order::factory(),
            'paymentMethod' => $this->faker->randomElement(['Credit Card', 'MoMo', 'Cash on Delivery']),
            'paymentStatus' => $this->faker->randomElement(['Paid', 'Pending', 'Failed']),
            'amount' => $this->faker->randomFloat(2, 50, 500),
        ];
    }
}
