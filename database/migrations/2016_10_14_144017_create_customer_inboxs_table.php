<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerInboxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_inboxes', function(Blueprint $table){
            $table->increments('id')->unsigned();
            $table->integer('customer_id')->unsigned();
            $table->integer('admin_id')->unsigned();
            $table->string('topic');
            $table->text('message');
            $table->boolean('read')->default(0);
            $table->boolean('admin')->default(0);
            $table->string('status');
            $table->string('slug');
            $table->timestamps();

            $table->foreign('customer_id')->references('id')->on('customers');
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
        Schema::drop('customer_inboxs');
    }
}
