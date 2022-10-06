<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post', function (Blueprint $table) {
            $table->mediumIncrements('postId');
            $table->mediumInteger('userId')->length(8)->unsigned();
            $table->string('title', 30);
            $table->string('image')->nullable();
            $table->string('description', 220);
            $table->integer('like')->default(0);
            $table->integer('comment_count')->default(0);
            $table->timestamps();

            $table->foreign('userId')->references('userId')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post');
    }
}
