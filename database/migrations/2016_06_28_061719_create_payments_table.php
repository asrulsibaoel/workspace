<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
          $table->engine = 'MyISAM';
            
          $table->increments('id');
          $table->integer('customer_id')->length(11)->nullable();
          $table->foreign('customer_id')->references('id')->on('users')->onDelete('cascade');
          $table->string('check_number', 50)->nullable();
          $table->date('payment_date')->nullable();
          $table->decimal('amout', 10, 2);
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
        Schema::drop('payments');
    }
}
