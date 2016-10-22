<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFarmerNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('farmer_notifications', function(Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('farmer_id')->unsigned();
            $table->text('text');
            $table->string('icon');
            $table->timestamps();

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
        Schema::drop('farmer_notifications');
    }
}
