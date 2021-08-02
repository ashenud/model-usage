<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'pro_name' => $this->faker->unique()->company(),        
            'pro_code' => $this->faker->unique()->numberBetween($min = 100000, $max = 999999),
            'pro_price' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 1500),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];
    }
}
