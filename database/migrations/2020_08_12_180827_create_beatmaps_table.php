<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeatmapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beatmaps', function (Blueprint $table) {
            $table->id();
            $table->integer('beatmap_id')->unique();
            $table->integer('beatmapset_id')->unique();
            $table->string('beatmap_hash')->unique();
            $table->string('song_name');
            $table->float('ar');
            $table->float('od');
            $table->float('difficulty');
            $table->integer('max_combo');
            $table->integer('hit_length');
            $table->integer('ranked');
            $table->date('last_update');
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
        Schema::dropIfExists('beatmaps');
    }
}
