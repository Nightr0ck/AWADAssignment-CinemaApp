<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SignUpController extends Controller
{
    function viewSignUpPage()
    {
        return view("signUp");
    }

    function signUpNewUser(Request $req)
    {
        $req->validate([
            "username" => ["required", "unique:users,username"],
            "password" => ["required", "regex:/[A-Z]/", "regex:/[a-z]/", "regex:/[0-9]/", "regex:/\W/"],
            "confirmPassword" => "same:password"
        ]);

        User::create(["username" => $req->username, "password" => Hash::make($req->password), "isAdmin" => false]);

        return redirect("/");
    }
}
