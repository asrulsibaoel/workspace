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
        Schema::table('orderdetails', function (Blueprint $table) {
            //
          $table->engine = 'MyISAM';
          $table->increments('id');
          $table->integer('order_id', 11);
          $table->integer('product_id', 15);
          $table->integer('quantity_ordered', 11);
          $table->decimal('price_each', 10, 2);
          $table->smallInteger('order_line_number', 6);
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
