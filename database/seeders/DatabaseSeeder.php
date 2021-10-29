<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Product;
use App\Models\SalesOrder;
use App\Models\SalesOrderProduct;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
        ]);
        Customer::factory()->count(20)->create();
        Product::factory()->count(10)->create();
        SalesOrder::factory()->count(5)->create();
        SalesOrderProduct::factory()->count(25)->create();
    }
}
