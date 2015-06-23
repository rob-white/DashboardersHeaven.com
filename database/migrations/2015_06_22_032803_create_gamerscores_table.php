<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGamerscoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gamerscores', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('gamer_id')->unsigned();
            $table->integer('score')->unsigned();
            $table->timestamps();

            $table->foreign('gamer_id')->references('id')->on('gamers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('gamerscores');
    }
}
