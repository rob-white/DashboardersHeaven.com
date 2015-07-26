<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class UpdateClipsTableChangeToText extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clips', function (Blueprint $table) {
            $table->text('thumbnail_small')->change();
            $table->text('thumbnail_large')->change();
            $table->text('url')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clips', function (Blueprint $table) {
            $table->string('thumbnail_small')->change();
            $table->string('thumbnail_large')->change();
            $table->string('url')->change();
        });
    }
}
