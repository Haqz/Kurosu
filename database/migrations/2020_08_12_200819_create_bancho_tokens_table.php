<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBanchoTokensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bancho_tokens', function (Blueprint $table) {
            $table->id();
            $table->string('token');
            $table->integer('osu_id');
            $table->integer('latest_message_id');
            $table->integer('latest_private_message_id');
            $table->date('latest_packet_date');
            $table->date('latest_heavy_packet_date');
            $table->string('joined_channels');
            $table->integer('gamemode');
            $table->integer('action');
            $table->string('action_text');
            $table->integer('kicked');
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
        Schema::dropIfExists('bancho_tokens');
    }
}
