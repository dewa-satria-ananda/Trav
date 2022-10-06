<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatTextTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat_text', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->mediumInteger('user_from')->length(8)->unsigned();
            $table->mediumInteger('user_to')->length(8)->unsigned();
            $table->mediumInteger('chatId')->length(8)->unsigned();
            $table->string('text', 220);

            $table->foreign('user_from')->references('userId')->on('users')->onDelete('cascade');
            $table->foreign('chatId')->references('chatId')->on('chat')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chat_text');
    }
}
