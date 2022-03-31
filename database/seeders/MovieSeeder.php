<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("movies")->insert([
            "name" => "Jujutsu Kaisen 0",
            "duration" => 105,
            "synopsis" => "Prequel to Jujutsu Kaisen",
            "genre" => "Animation, Action",
        ]);
        DB::table("movies")->insert([
            "name" => "Detective Conan: The Scarlet Bullet",
            "duration" => 80,
            "synopsis" => "Sherlock Holmes if he was Japanese",
            "genre" => "Animation, Mystery",
        ]);
        DB::table("movies")->insert([
            "name" => "Uncharted",
            "duration" => 115,
            "synopsis" => "Tomb Raider but with Spiderman",
            "genre" => "Action, Adventure",
        ]);
        DB::table("movies")->insert([
            "name" => "Spiderman: No Way Home",
            "duration" => 150,
            "synopsis" => "Spiderman pointing at Spiderman pointing at Spiderman",
            "genre" => "Action, Superhero",
        ]);
        DB::table("movies")->insert([
            "name" => "Morbius",
            "duration" => 110,
            "synopsis" => "I'm sorry, who's this?",
            "genre" => "Action, Superhero",
        ]);
        DB::table("movies")->insert([
            "name" => "The King's Man",
            "duration" => 130,
            "synopsis" => "Are you waiters or Englishmen?",
            "genre" => "Action, Historical",
        ]);
        DB::table("movies")->insert([
            "name" => "The Matrix: Resurrections",
            "duration" => 140,
            "synopsis" => "It's nice if you enjoyed the trilogy",
            "genre" => "Action, Sci-fi",
        ]);
    }
}
