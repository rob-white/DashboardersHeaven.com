<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGamersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gamers', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('xuid')->unsigned();
            $table->string('gamertag', 15);
            $table->integer('gamerscore')->unsigned();
            $table->string('gamerpic_small')->nullable();
            $table->string('gamerpic_large')->nullable();
            $table->string('display_pic')->nullable();
            $table->text('bio')->nullable();
            $table->binary('avatar_manifest')->nullable();
            $table->integer('level')->unsigned()->nullable();
            $table->timestamps();

            $table->index('xuid');
            $table->index('gamertag');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('gamers');
    }
}
