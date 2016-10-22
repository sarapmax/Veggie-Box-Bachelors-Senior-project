<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFarmProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('farm_products', function(Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('farmer_id')->unsigned();
            $table->integer('sub_category_id')->unsigned();
            $table->string('name');
            $table->string('status');
            $table->integer('price');
            $table->integer('discount_price')->nullable();
            $table->integer('quantity');
            $table->integer('grow_estimate');
            $table->date('plant_date');
            $table->string('images')->nullable();
            $table->string('thumb_image');
            $table->text('description')->nullable();
            $table->string('unit');
            $table->string('slug');
            $table->timestamps();

            $table->foreign('farmer_id')->references('id')->on('farmers');
            $table->foreign('sub_category_id')->references('id')->on('sub_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('farm_products');
    }
}
