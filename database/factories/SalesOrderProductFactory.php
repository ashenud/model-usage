<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\SalesOrder;
use App\Models\SalesOrderProduct;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class SalesOrderProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SalesOrderProduct::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        $so_id = SalesOrder::get()->random()->so_id;
        $pro_id = Product::get()->random()->pro_id;

        return [
            'so_id' => $so_id,
            'pro_id' => $pro_id,
            'pro_price' => Product::find($pro_id)->pro_price,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];
    }
}
