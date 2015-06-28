<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGamesGamersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game_gamer', function (Blueprint $table) {
            $table->integer('game_id')->unsigned();
            $table->integer('gamer_id')->unsigned();
            $table->integer('earned_achievements')->unsigned();
            $table->integer('current_gamerscore')->unsigned();
            $table->integer('max_gamerscore')->unsigned();
            $table->timestamp('last_unlock');
            $table->timestamps();

            $table->foreign('game_id')->references('id')->on('games');
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
        Schema::drop('game_gamer');
    }
}
