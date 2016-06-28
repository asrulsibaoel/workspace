<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
          $table->engine = 'MyISAM';

          $table->increments('id');
          $table->stirng('product_name', 70);
          $table->string('product_line_id', 15)->nullable();
          $table->foreign('product_line_id')->references('id')->on('productlines');
          $table->string('product_scale', 10);
          $table->string('product_vendor', 50);
          $table->text('product_description');
          $table->smallInteger('quantity_in_stock', 6);
          $table->decimal('price', 5, 2);
          $table->decimal('msrp', 5, 2);
          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('products');
    }
}
