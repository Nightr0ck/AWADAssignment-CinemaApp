<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("tickets")->insert([
            "username" => "leequan",
            "movie_id" => 1,
            "date" => "2022-04-02",
            "time" => "20:00:00",
            "seat" => "G-07",
            "hall_id" => 1,
        ]);
        DB::table("tickets")->insert([
            "username" => "leequan",
            "movie_id" => 2,
            "date" => "2022-04-08",
            "time" => "13:30:00",
            "seat" => "F-05",
            "hall_id" => 2,
        ]);


        DB::table("tickets")->insert([
            "username" => "kangyee",
            "movie_id" => 1,
            "date" => "2022-03-18",
            "time" => "18:45:00",
            "seat" => "H-12",
            "hall_id" => 3,
        ]);
        DB::table("tickets")->insert([
            "username" => "kangyee",
            "movie_id" => 2,
            "date" => "2022-03-19",
            "time" => "10:20:00",
            "seat" => "D-04",
            "hall_id" => 1,
        ]);


        DB::table("tickets")->insert([
            "username" => "adrian",
            "movie_id" => 3,
            "date" => "2022-03-23",
            "time" => "11:40:00",
            "seat" => "E-08",
            "hall_id" => 4,
        ]);
        DB::table("tickets")->insert([
            "username" => "adrian",
            "movie_id" => 4,
            "date" => "2022-03-24",
            "time" => "22:30:00",
            "seat" => "B-11",
            "hall_id" => 3,
        ]);
        DB::table("tickets")->insert([
            "username" => "adrian",
            "movie_id" => 5,
            "date" => "2022-03-25",
            "time" => "14:00:00",
            "seat" => "F-12",
            "hall_id" => 1,
        ]);

        DB::table("tickets")->insert([
            "username" => "lianghan",
            "movie_id" => 6,
            "date" => "2022-04-03",
            "time" => "15:20:00",
            "seat" => "C-09",
            "hall_id" => 2,
        ]);
        DB::table("tickets")->insert([
            "username" => "lianghan",
            "movie_id" => 7,
            "date" => "2022-04-12",
            "time" => "17:50:00",
            "seat" => "G-03",
            "hall_id" => 4,
        ]);
    }
}
