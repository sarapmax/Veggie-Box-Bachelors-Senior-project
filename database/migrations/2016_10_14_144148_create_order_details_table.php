<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function(Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('order_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->integer('sub_total');
            $table->integer('quantity');
            $table->timestamps();

            $table->foreign('order_id')->references('id')->on('orders');
            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('order_details');
    }
}
