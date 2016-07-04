<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductlinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productlines', function (Blueprint $table) {
            //
          $table->engine = 'MyISAM';
          $table->increments('id');
          $table->string('product_line_name', 40);
          $table->text('description');
          $table->text('html_description');
          $table->text('image');
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
        Schema::drop('productlines');
    }
}
