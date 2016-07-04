<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfficesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offices', function (Blueprint $table) {
            //
          $table->increments('id');
          $table->string('city',50)->nullable();
          $table->string('phone',50)->nullable();
          $table->string('address_line1',50)->nullable();
          $table->string('address_line2',50)->nullable();
          $table->string('state',50)->nullable();
          $table->string('country',50)->nullable();
          $table->string('postal_code',15)->nullable();
          $table->string('territory',10)->nullable();
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
        Schema::drop('offices');
    }
}
