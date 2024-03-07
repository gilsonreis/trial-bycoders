<?php

namespace Database\Factories;

use App\Models\Sale;
use Illuminate\Database\Eloquent\Factories\Factory;

class SaleFactory extends Factory
{
    protected $model = Sale::class;

    public function definition(): array
    {
        return [
            'seller_id' => $this->faker->numberBetween(2, 11),
            'customer_id' => $this->faker->numberBetween(12, 90),
            'car_detail_id' => $this->faker->numberBetween(1, 30),
            'commission' => $this->faker->randomFloat(2, 1000, 2000),
            'sale_value' => $this->faker->randomFloat(2, 45000, 53000),
            'status' => $this->faker->randomElement(['in_progress', 'canceled', 'completed']),
            'created_at' => $this->faker->dateTimeBetween('-1 year')
        ];
    }
}
