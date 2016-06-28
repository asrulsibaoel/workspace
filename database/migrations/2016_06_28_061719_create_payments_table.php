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
        Schema::table('payments', function (Blueprint $table) {
            
          $table->increments('id');
          $table->integer('customer_id', 11)->nullable();
          $table->string('check_number', 50)->nullable();
          $table->date('payment_date')->nullable();
          $table->decimal('amout', 10, 2);
          
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
