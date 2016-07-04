<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orderdetails', function (Blueprint $table) {
            //
          $table->engine = 'MyISAM';
          $table->increments('id');
          $table->integer('order_id')->length(11);
          $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
          $table->integer('product_id')->length(15);
          $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
          $table->integer('quantity_ordered')->length(11);
          $table->decimal('price_each', 10, 2);
          $table->smallInteger('order_line_number')->length(6);
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
      /**
      * TODO drop the tables;
      *
      */
        Schema::drop('orderdetails');
      
    }
}
