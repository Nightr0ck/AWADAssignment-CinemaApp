<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Hall;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    function viewAdminDashboard(Request $req)
    {
        return view("adminDashboard", ["movies" => Movie::all(), "halls" => Hall::all()]);
    }

    function viewCreateMoviePage(Request $req)
    {
        return view("adminCreateMovie", ["halls" => Hall::all()]);
    }

    function createMovie(Request $req)
    {
        $req->validate([
            "name" => ["required", "max:100"],
            "duration" => ["required", "numeric"],
            "synopsis" => ["required"],
            "genre" => ["required", "max:30"],
            "halls" => ["required"]
        ]);

        $newMovie = Movie::create(["name" => $req["name"], "duration" => $req["duration"], "synopsis" => $req["synopsis"], "genre" => $req["genre"]]);
        foreach($req["halls"] as $hall)
        {
            DB::table("hall_movie")->insert([
                "hall_id" => $hall,
                "movie_id" => $newMovie["id"],
            ]);
        }

        return redirect("admin");
    }

    function viewEditMoviePage(Request $req, $movieID)
    {
        $checkedHalls = array();
        foreach (DB::select("SELECT hall_id FROM hall_movie WHERE movie_id=$movieID") as $hallMovie) {
            array_push($checkedHalls, $hallMovie->hall_id);
        }

        return view("adminEditMovie", ["movie" => Movie::find($movieID), "halls" => Hall::all(), "checkedHalls" => $checkedHalls]);
    }

    function editMovie(Request $req, $movieID)
    {
        $req->validate([
            "name" => ["required", "max:100"],
            "duration" => ["required", "numeric"],
            "synopsis" => ["required"],
            "genre" => ["required", "max:30"],
            "halls" => ["required"]
        ]);

        $movie = Movie::find($movieID);
        $movie["name"] = $req["name"];
        $movie["duration"] = $req["duration"];
        $movie["synopsis"] = $req["synopsis"];
        $movie["genre"] = $req["genre"];
        $movie->save();
        
        DB::delete("DELETE FROM hall_movie WHERE movie_id=$movieID");
        foreach($req["halls"] as $hall)
        {
            DB::table("hall_movie")->insert([
                "hall_id" => $hall,
                "movie_id" => $movieID,
            ]);
        }

        return redirect("admin");
    }

    function deleteMovie(Request $req, $movieID)
    {
        Movie::find($movieID)->delete();
        return redirect("admin");
    }
}
