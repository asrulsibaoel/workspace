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
        Schema::create('products', function (Blueprint $table) {
          $table->engine = 'MyISAM';

          $table->increments('id');
          $table->string('product_name', 70);
          $table->integer('product_line_id')->length(11)->nullable();
          $table->foreign('product_line_id')->references('id')->on('productlines')->onDelete('cascade');
          $table->string('product_scale', 10);
          $table->string('product_vendor', 50);
          $table->text('image');
          $table->text('product_description');
          $table->smallInteger('quantity_in_stock')->length(6);
          $table->decimal('price', 5, 2);
          $table->decimal('msrp', 5, 2);
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
        Schema::drop('products');
    }
}
