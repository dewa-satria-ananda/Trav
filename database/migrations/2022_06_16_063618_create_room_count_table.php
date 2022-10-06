<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomCountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roomCount', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
         
            $table->mediumInteger('userId')->length(8)->unsigned();
            $table->mediumInteger('travTogetherId')->length(8)->unsigned();

            $table->foreign('userId')->references('userId')->on('users')->onDelete('cascade');
            $table->foreign('travTogetherId')->references('travTogetherId')->on('travTogether')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roomCount');
    }
}
