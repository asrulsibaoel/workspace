<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            //
          $table->engine = 'MyISAM';
          
          $table->increments('id');
          $table->date('order_date');
          $table->date('required_date')->nullable();
          $table->date('shipped_date')->nullable();
          $table->string('status', 15);
          $table->text('comments')->nullable();
          $table->integer('customer_id')->length(11)->nullable();
          $table->foreign('customer_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::drop('orders');
    }
}
