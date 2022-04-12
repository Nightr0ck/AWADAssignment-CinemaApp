<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Hall;
use App\Models\Ticket;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class BookTicketController extends Controller
{
    function viewBookTicketPage(Request $req, $movieID)
    {
        $hallID = array();
        foreach (DB::select("SELECT hall_id FROM hall_movie WHERE movie_id=$movieID") as $hall)
        {
            array_push($hallID, $hall->hall_id);
        }

        return view("bookTicket", ["movie" => Movie::find($movieID), "halls" => Hall::find($hallID)]);
    }

    function bookTicket(Request $req, $movieID)
    {
        $req["time"] = $req['time'] . ":00";
        $req["seat"] = $req['seatRow'] . "-" . $req['seatNum'];

        $hallID = array();
        foreach (DB::select("SELECT hall_id FROM hall_movie WHERE movie_id=$movieID") as $hall)
        {
            array_push($hallID, $hall->hall_id);
        }

        $req->validate([
            "date" => ["required", "date", "after:today"],
            "time" => ["required", "regex:/^(1\d|2[0-3]):[0-5](0|5):00$/"],
            "hall" => ["required", "numeric", Rule::in($hallID)],
            "seatRow" => ["required", "regex:/^[A-H]$/"],
            "seatNum" => ["required", "regex:/^(0[1-9]|1[0-4])$/"],
            "seat" => [Rule::unique("tickets")->where(function ($query) use ($movieID, $req) {
                return $query->where("movie_id", $movieID)->where("date", $req["date"])->where("time", $req["time"])->where("hall_id", $req["hall"]);
            })]
        ]);

        Ticket::create(["username" => Auth::user()["username"], "movie_id" => $movieID, "date" => $req["date"], "time" => $req["time"], "seat" => $req["seat"], "hall_id" => $req["hall"]]);
        return redirect("/");
    }
}
