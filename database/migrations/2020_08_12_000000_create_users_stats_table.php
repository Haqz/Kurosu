<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersStatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_stats', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->references('id')->on('users');
            $table->string('username_alt');
            $table->string('user_color');
            $table->string('user_style');

            $table->bigInteger('ranked_score_std');
            $table->bigInteger('ranked_score_taiko');
            $table->bigInteger('ranked_score_ctb');
            $table->bigInteger('ranked_score_mania');

            $table->bigInteger('total_score_std');
            $table->bigInteger('total_score_taiko');
            $table->bigInteger('total_score_ctb');
            $table->bigInteger('total_score_mania');

            $table->integer('playcount_std');
            $table->integer('playcount_taiko');
            $table->integer('playcount_ctb');
            $table->integer('playcount_mania');

            $table->integer('replays_watched_std')->unsigned();
            $table->integer('replays_watched_taiko')->unsigned();
            $table->integer('replays_watched_ctb')->unsigned();
            $table->integer('replays_watched_mania')->unsigned();

            $table->integer('total_hits_std');
            $table->integer('total_hits_taiko');
            $table->integer('total_hits_ctb');
            $table->integer('total_hits_mania');

            $table->string('country');
            $table->integer('show_country');

            $table->integer('level_std');
            $table->integer('level_taiko');
            $table->integer('level_ctb');
            $table->integer('level_mania');

            $table->float('avg_accuracy_std');
            $table->float('avg_accuracy_taiko');
            $table->float('avg_accuracy_ctb');
            $table->float('avg_accuracy_mania');

            $table->float('pp_std');
            $table->float('pp_taiko');
            $table->float('pp_ctb');
            $table->float('pp_mania');

            $table->string('badges_shown');
            $table->integer('safe_title');
            $table->string('userpage_content');
            $table->integer('play_style');
            $table->integer('favourite_mode');


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
        Schema::dropIfExists('users');
    }
}
