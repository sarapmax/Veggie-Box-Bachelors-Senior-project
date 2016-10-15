<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feeds', function(Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('admin_id')->unsigned();
            $table->string('topic');
            $table->text('detail');
            $table->enum('activated', [1,0])->default(0);
            $table->string('slug');
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
        Schema::drop('feeds');
    }
}
