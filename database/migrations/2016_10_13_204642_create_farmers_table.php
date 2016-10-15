<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFarmersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('farmers', function(Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('farm_name');
            $table->text('farm_desc')->nullable();
            $table->string('farm_img')->nullable();
            $table->string('phone');
            $table->text('address');
            $table->string('sub_district');
            $table->string('district');
            $table->string('province');
            $table->string('zipcode');
            $table->enum('activated', [1, 0])->default(0);
            $table->string('vat_registration')->nullable();
            $table->rememberToken();
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
        Schema::drop('farmers');
    }
}
