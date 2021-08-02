<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\SalesOrder;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class SalesOrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SalesOrder::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $rep_id = User::get()->random()->u_id;
        $cus_id = Customer::get()->random()->cus_id;

        $so_count = SalesOrder::withTrashed()->where('rep_id',$rep_id)->get()->count();
        if($so_count) {
            $so_no = 'SO/'.str_pad($rep_id,3,0,STR_PAD_LEFT).'/'.str_pad($so_count+1,6,0,STR_PAD_LEFT);
        }
        else {
            $so_no = 'SO/'.str_pad($rep_id,3,0,STR_PAD_LEFT).'/000001';
        }

        return [
            'so_no' => $so_no,
            'rep_id' => $rep_id,
            'cus_id' => $cus_id,
            'date' => Carbon::now(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];
    }
}
