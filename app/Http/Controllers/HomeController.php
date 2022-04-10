<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class HomeController extends Controller
{
    function viewHomePage(Request $req)
    {
        return view("home", ["movies" => Movie::all()]);
    }
}
