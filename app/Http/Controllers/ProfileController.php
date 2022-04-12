<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    function viewProfilePage(Request $req)
    {
        return view("profile", ["user" => Auth::user()]);
    }

    function viewUpdatePasswordPage(Request $req)
    {
        return view("updatePassword");
    }

    function updatePassword(Request $req)
    {

        $out = new \Symfony\Component\Console\Output\ConsoleOutput();
        $hashedPassword = DB::select("SELECT password FROM users WHERE username=?", [Auth::user()["username"]])[0]->password;
        $out->writeln($hashedPassword);

        $req->validate([
            "currentPassword" => "required",
            "newPassword" => ["required", "regex:/[A-Z]/", "regex:/[a-z]/", "regex:/[0-9]/", "regex:/\W/"],
            "confirmPassword" => "same:newPassword"
        ]);

        if (Hash::check($req["currentPassword"], DB::select("SELECT password FROM users WHERE username=?", [Auth::user()["username"]])[0]->password))
        {
            DB::update("UPDATE users SET password=? WHERE username=?", [Hash::make($req["newPassword"]), Auth::user()["username"]]);
            return redirect("/profile");
        }
        else
        {
            return redirect("/profile/update/password")->withErrors(["currentPassword" => "Entered current password is incorrect"]);
        }
    }
}
