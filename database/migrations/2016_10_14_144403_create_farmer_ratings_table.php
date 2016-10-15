<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFarmerRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('farmer_ratings', function(Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('rating_id')->unsigned();
            $table->integer('farmer_id')->unsigned();
            $table->integer('score');
            $table->timestamps();

            $table->foreign('rating_id')->references('id')->on('ratings');
            $table->foreign('farmer_id')->references('id')->on('farmers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('farmer_ratings');
    }
}
