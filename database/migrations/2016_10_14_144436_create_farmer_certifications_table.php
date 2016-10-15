<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFarmerCertificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('farmer_certifications', function(Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('farmer_id')->unsigned();
            $table->string('name');
            $table->string('certification_file');

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
        Schema::drop('farmer_certifications');
    }
}
