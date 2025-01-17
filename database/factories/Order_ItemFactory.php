<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Order_Item;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order_Item>
 */
class Order_ItemFactory extends Factory
{
    protected $model = Order_Item::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'productId' => $this->faker->numberBetween(1, 17),
            'orderId' => Order::factory(),
            'quantity' => $this->faker->numberBetween(1, 10),
            'price' => $this->faker->randomFloat(2, 10, 100),

        ];
    }
}
