<?php

namespace Database\Seeders;

use App\Models\SalesOrderProduct;
use Illuminate\Database\Seeder;

class SalesOrderProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SalesOrderProduct::factory()->count(25)->create();
    }
}
