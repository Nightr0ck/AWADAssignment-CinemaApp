<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{
    function viewMovieDetails(Request $req, $movieID)
    {
        return view("movieDetails", ["movie" => Movie::find($movieID)]);
    }
}
