<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pre_orders', function(Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('customer_id')->unsigned();
            $table->string('order_number');
            $table->string('email');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('phone');
            $table->text('address');
            $table->string('sub_district');
            $table->string('district');
            $table->string('province');
            $table->string('zipcode');
            $table->string('order_status');
            $table->timestamps();

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
        Schema::drop('pre_orders');
    }
}
