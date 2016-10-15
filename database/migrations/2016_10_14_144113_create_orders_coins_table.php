<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersCoinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_coins', function(Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('coin_package_id')->unsigned();
            $table->integer('customer_id')->unsigned();
            $table->string('status');
            $table->string('payment_slip')->nullable();
            $table->timestamps();

            $table->foreign('coin_package_id')->references('id')->on('coin_packages');
            $table->foreign('customer_id')->references('id')->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('order_coins');
    }
}
