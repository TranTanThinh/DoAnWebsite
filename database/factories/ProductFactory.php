<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Product;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->words(2, true);
        $slug = Str::slug($name);

        return [
            'productId' => $this->faker->unique()->numberBetween(18, 28),
            'categoryId' => $this->faker->numberBetween(1, 2), 
            'name' => $name,
            'image' => $this->faker->image('public/Template/images', 640, 480, null, false),
            'description' => $this->faker->sentence(10),
            'price' => $this->faker->randomFloat(2, 10, 1000),
            'slug' => $slug, 
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null
        ];
    }
}
