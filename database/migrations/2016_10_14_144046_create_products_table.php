<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function(Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('farm_product_id')->unsigned();
            $table->integer('quantity');
            $table->enum('activated', [1,0])->default(0);
            $table->integer('price')->nullable();
            $table->integer('discount_price')->nullable();
            $table->timestamps();

            $table->foreign('farm_product_id')->references('id')->on('farm_products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('products');
    }
}
