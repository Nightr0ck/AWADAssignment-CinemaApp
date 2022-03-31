<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string("username", 50);
            $table->foreign("username")->references("username")->on("users");
            $table->integer("movie_id");
            $table->foreign("movie_id")->references("id")->on("movies");
            $table->date("date");
            $table->time("time");
            $table->string("seat", 4);
            $table->integer("hall_id");
            $table->foreign("hall_id")->references("id")->on("halls");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
