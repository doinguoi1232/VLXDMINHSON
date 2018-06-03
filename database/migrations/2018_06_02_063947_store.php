<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Store extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('userd_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->integer('providers_id')->unsigned();
            $table->foreign('userd_id')->references('id')->on('users')->ondetele('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->ondetele('cascade');
            $table->foreign('providers_id')->references('id')->on('provider')->ondetele('cascade');
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
        //
    }
}
