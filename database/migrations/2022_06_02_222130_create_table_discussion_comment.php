<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableDiscussionComment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discussionComment', function (Blueprint $table) {
            $table->mediumIncrements('discussionCommentId');
            $table->mediumInteger('userId')->length(8)->unsigned();
            $table->mediumInteger('discussionId')->length(8)->unsigned();
            $table->string('text', 220);
            $table->timestamps();

            $table->foreign('userId')->references('userId')->on('users')->onDelete('cascade');
            $table->foreign('discussionId')->references('discussionId')->on('discussion')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('discussionComment');
    }
}
