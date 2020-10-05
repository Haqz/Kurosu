<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scores', function (Blueprint $table) {
            $table->id();

            $table->integer('beatmap_id')->references('beatmap_id')->on('beatmaps');
            $table->integer('user_id')->references('id')->on('users');
            $table->bigInteger('score');
            $table->integer('max_combo');
            $table->boolean('full_combo');
            $table->string('mods');
            $table->integer('300_count');
            $table->integer('100_count');
            $table->integer('50_count');
            $table->integer('katus_count');
            $table->integer('gekis_count');
            $table->integer('miss_count');
            $table->integer('completed');
            $table->float('accuracy');
            $table->float('pp');

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
        Schema::dropIfExists('scores');
    }
}
