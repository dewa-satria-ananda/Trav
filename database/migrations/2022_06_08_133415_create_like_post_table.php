<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLikePostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('likePost', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
         
            $table->mediumInteger('userId')->length(8)->unsigned();
            $table->mediumInteger('postId')->length(8)->unsigned();

            $table->foreign('userId')->references('userId')->on('users')->onDelete('cascade');
            $table->foreign('postId')->references('postId')->on('post')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('likePost');
    }
}
