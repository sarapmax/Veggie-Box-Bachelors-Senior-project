<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function(Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('firstname');
            $table->string('lastname');
            $table->integer('coins');
            $table->string('phone');
            $table->text('address');
            $table->string('sub_district');
            $table->string('district');
            $table->string('province');
            $table->string('zipcode');
            $table->enum('activated', [1, 0])->default(0);
            $table->string('token')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('customers');
    }
}
