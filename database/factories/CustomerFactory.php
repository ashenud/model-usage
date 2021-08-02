<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Customer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $ceated_at = $this->faker->dateTimeThisDecade($max = 'now', $timezone = null);

        return [
            'cus_name' => $this->faker->unique()->company(),        
            'cus_code' => $this->faker->unique()->numberBetween($min = 100000, $max = 999999),
            'created_at' => $ceated_at,
            'updated_at' => $ceated_at
        ];
    }
}
