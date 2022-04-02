<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    function viewLoginPage()
    {
        return view("login");
    }

    function attemptLogin(Request $req)
    {
        if (Auth::guard("user")->attempt(["username" => $req->username, "password" => $req->password], $req->remember))
        {
            return redirect()->intended("/");
        }
        else
        {
            return back()->withInput($req->only("username", "remember"))->withErrors(["invalid" => "Invalid login credentials"]);
        }
    }
}
