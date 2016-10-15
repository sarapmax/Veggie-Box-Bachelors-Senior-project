<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromotionProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotion_products', function(Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('promotion_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->datetime('expire_date');
            $table->timestamps();

            $table->foreign('promotion_id')->references('id')->on('promotions');
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
        Schema::drop('promotion_products');
    }
}
