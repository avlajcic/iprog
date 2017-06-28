<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('sender');
            $table->integer('receiver');
            $table->integer('product_id');
            $table->boolean('per_hour');
            $table->boolean('per_day');
            $table->integer('amount');
            $table->foreign('sender')->references('id')->on('users')->onDelete('restrict');
            $table->foreign('receiver')->references('id')->on('users')->onDelete('restrict');
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
        Schema::table('messages', function (Blueprint $table) {
          $table->dropForeign(['sender'], ['receiver'], ['product_id']);
        });
        Schema::dropIfExists('messages');
    }
}
