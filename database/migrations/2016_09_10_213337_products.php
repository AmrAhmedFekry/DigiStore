<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Products extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('producs' , function(Blueprint $table ){
            $table->increments('id');
            $table->string('product_name');
            $table->integer('product_price');
            $table->string('product_image');
            $table->string('product_maincat_name');
            $table->integer('product_maincat_id');
            $table->string('product_subcat_name');
            $table->integer('product_subcat_id');
            $table->string('product_details');
            $table->string('product_tags');

            






        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
