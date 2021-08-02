<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesOrderProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_order_products', function (Blueprint $table) {
            $table->id('sop_id');

            $table->unsignedBigInteger('so_id')->nullable();
            $table->foreign('so_id')->references('so_id')->on('sales_orders');

            $table->unsignedBigInteger('pro_id')->nullable();
            $table->foreign('pro_id')->references('pro_id')->on('products');

            $table->decimal('pro_price', 20, 2)->nullable();
            
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales_order_products');
    }
}
