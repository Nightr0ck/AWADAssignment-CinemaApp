<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    function viewLoginPage()
    {
        return view("login");
    }

    function attemptLogin(Request $req)
    {
        $out = new \Symfony\Component\Console\Output\ConsoleOutput();
        $out->writeln($req["remember"] ? true : false );

        if (Auth::guard("user")->attempt(["username" => $req->username, "password" => $req->password], $req["remember"] ? true : false))
        {
            return redirect()->intended("/");
        }
        else
        {
            return back()->withInput($req->only("username", "remember"))->withErrors(["invalid" => "Invalid login credentials"]);
        }
    }

    function logout(Request $req)
    {
        Auth::logout();
        $req->session()->invalidate();
        $req->session()->regenerateToken();
        return redirect("/");
    }
}
