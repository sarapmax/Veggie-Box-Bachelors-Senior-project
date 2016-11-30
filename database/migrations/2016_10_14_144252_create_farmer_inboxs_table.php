<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFarmerInboxsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('farmer_inboxes', function(Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('admin_id')->nullable();
            $table->integer('farmer_id')->unsigned();
            $table->integer('admin_information_id')->nullable();
            $table->string('topic');
            $table->text('message');
            $table->string('status');
            $table->string('slug');
            $table->timestamps();

            $table->foreign('admin_id')->references('id')->on('admins');
            $table->foreign('farmer_id')->references('id')->on('farmers');
            $table->foreign('admin_information_id')->references('id')->on('admin_informations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('farmer_inboxs');
    }
}
