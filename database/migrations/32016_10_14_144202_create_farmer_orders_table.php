<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFarmerOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('farmer_orders', function(Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('farm_product_id')->unsigned();
            $table->integer('order_detail_id')->unsigned();
            $table->string('order_number');
            $table->string('order_status');
            $table->string('payment_slip')->nullable();
            $table->timestamps();

            $table->foreign('farm_product_id')->references('id')->on('farm_products');
            $table->foreign('order_detail_id')->references('id')->on('order_details');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('farmer_orders');
    }
}
