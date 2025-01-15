<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Address;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    protected $model = Address::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'street' => $this->faker->streetAddress,
            'ward' => $this->faker->word,
            'district' => $this->faker->randomElement([
                "Quận 1",
                "Quận 3",
                "Quận 4",
                "Quận 5",
                "Quận 6",
                "Quận 7",
                "Quận 8",
                "Quận 10",
                "Quận 11",
                "Quận 12",
                "Quận Bình Thạnh",
                "Quận Bình Tân",
                "Quận Gò Vấp",
                "Quận Phú Nhuận",
                "Quận Tân Bình",
                "Quận Tân Phú",
                "Thành phố Thủ Đức",
                "Huyện Bình Chánh", "Huyện Hóc Môn", "Huyện Cần Giờ", "Huyện Củ Chi", "Huyện Nhà bè",
            ]),
            'province' => 'TP Hồ Chí Minh',
            'country' => 'Việt Nam',
        ];
    }
}
