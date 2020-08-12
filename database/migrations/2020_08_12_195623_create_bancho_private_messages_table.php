<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBanchoPrivateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bancho_private_messages', function (Blueprint $table) {
            $table->id();
            $table->integer('sender_id')->references('id')->on('users');
            $table->integer('reciever_id')->references('id')->on('users');
            $table->string('message');
            $table->date('sent_date');
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
        Schema::dropIfExists('bancho_private_messages');
    }
}
