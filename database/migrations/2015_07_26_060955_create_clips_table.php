<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clips', function (Blueprint $table) {
            $table->increments('id');
            $table->char('clip_id', 36);
            $table->bigInteger('title_id');
            $table->bigInteger('xuid');
            $table->string('name')->nullable();
            $table->string('thumbnail_small')->nullable();
            $table->string('thumbnail_large')->nullable();
            $table->string('url');
            $table->boolean('saved')->default(false);
            $table->timestamp('recorded_at');
            $table->timestamps();

            $table->index('title_id');
            $table->index('xuid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('clips');
    }
}
