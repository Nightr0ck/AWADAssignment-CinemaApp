<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHallMovieTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hall_movie', function (Blueprint $table) {
            $table->id();
            $table->integer("hall_id");
            $table->foreign("hall_id")->references("id")->on("halls");
            $table->integer("movie_id");
            $table->foreign("movie_id")->references("id")->on("movies");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hall_movie');
    }
}
