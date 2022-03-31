<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HallMovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("hall_movie")->insert([
            "hall_id" => 1,
            "movie_id" => 1,
        ]);
        DB::table("hall_movie")->insert([
            "hall_id" => 3,
            "movie_id" => 1,
        ]);
        DB::table("hall_movie")->insert([
            "hall_id" => 4,
            "movie_id" => 1,
        ]);


        DB::table("hall_movie")->insert([
            "hall_id" => 1,
            "movie_id" => 2,
        ]);
        DB::table("hall_movie")->insert([
            "hall_id" => 2,
            "movie_id" => 2,
        ]);


        DB::table("hall_movie")->insert([
            "hall_id" => 2,
            "movie_id" => 3,
        ]);
        DB::table("hall_movie")->insert([
            "hall_id" => 4,
            "movie_id" => 3,
        ]);
        DB::table("hall_movie")->insert([
            "hall_id" => 5,
            "movie_id" => 3,
        ]);


        DB::table("hall_movie")->insert([
            "hall_id" => 3,
            "movie_id" => 4,
        ]);
        DB::table("hall_movie")->insert([
            "hall_id" => 4,
            "movie_id" => 4,
        ]);


        DB::table("hall_movie")->insert([
            "hall_id" => 1,
            "movie_id" => 5,
        ]);
        DB::table("hall_movie")->insert([
            "hall_id" => 4,
            "movie_id" => 5,
        ]);


        DB::table("hall_movie")->insert([
            "hall_id" => 1,
            "movie_id" => 6,
        ]);
        DB::table("hall_movie")->insert([
            "hall_id" => 2,
            "movie_id" => 6,
        ]);
        DB::table("hall_movie")->insert([
            "hall_id" => 3,
            "movie_id" => 6,
        ]);


        DB::table("hall_movie")->insert([
            "hall_id" => 1,
            "movie_id" => 7,
        ]);
        DB::table("hall_movie")->insert([
            "hall_id" => 4,
            "movie_id" => 7,
        ]);
    }
}
