<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\UserAddress;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserAddress>
 */
class UserAddressFactory extends Factory
{
    protected $model = UserAddress::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'addressID' => Address::factory(),
            'userID' => fake()->numberBetween(3, 17), // User::factory(),
            'isDefault' => $this->faker->boolean(),
        ];
    }
}
