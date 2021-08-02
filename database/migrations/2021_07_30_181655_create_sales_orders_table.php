<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_orders', function (Blueprint $table) {
            $table->id('so_id');

            $table->string('so_no')->nullable();
            
            $table->unsignedBigInteger('rep_id')->nullable();
            $table->foreign('rep_id')->references('u_id')->on('users');

            $table->unsignedBigInteger('cus_id')->nullable();
            $table->foreign('cus_id')->references('cus_id')->on('customers');

            $table->timestamp('date')->nullable();

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
        Schema::dropIfExists('sales_orders');
    }
}
