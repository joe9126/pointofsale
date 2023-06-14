<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('products', function(Blueprint $table){
            $table->id();
            $table->string('productname');
            $table->string('category');
            $table->double('costprice',8,2);
            $table->double('saleprice',8,2);
            $table->tinyInteger('stockalarm');
            $table->tinyInteger('status')->default('1');
            $table->string("createdby");
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
        Schema::dropIfExists('products');
    }
}
