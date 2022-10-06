<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTravTogetherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travTogether', function (Blueprint $table) {
            $table->mediumIncrements('travTogetherId');
            $table->mediumInteger('userId')->length(8)->unsigned();
            $table->string('title', 30);
            $table->string('destination', 30);
            $table->string('phone');
            $table->string('budget', 30);
            $table->string('description', 220);
            $table->string('people');
            $table->string('joinedPeople')->default(1);;
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
        Schema::dropIfExists('travTogether');
    }
}
