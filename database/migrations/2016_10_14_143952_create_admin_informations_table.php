<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_informations', function(Blueprint $table){
            $table->increments('id')->unsigned();
            $table->integer('admin_id')->unsigned();
            $table->string('topic');
            $table->text('text');
            $table->timestamps();

            $table->foreign('admin_id')->references('id')->on('admins');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('admin_informations');
    }
}
