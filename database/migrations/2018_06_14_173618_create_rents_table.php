<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rents', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('renter')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->dateTime('from');
            $table->dateTime('to');	
            $table->foreign('renter')->references('id')->on('users')->onDelete('restrict');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('restrict');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rents', function (Blueprint $table) {
          $table->dropForeign(['renter'], ['product_id']);
        });
        Schema::dropIfExists('rents');
    }
}
