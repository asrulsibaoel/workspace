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
        Schema::table('orders', function (Blueprint $table) {
            //
          $table->engine = 'MyISAM';
          
          $table->increments('id');
          $table->date('order_date');
          $table->date('required_date')->nullable();
          $table->date('shipped_date')->nullable();
          $table->string('status', 15);
          $table->text('comments')->nullable();
          $table->integer('customer_id', 11)->nullable();
          
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
