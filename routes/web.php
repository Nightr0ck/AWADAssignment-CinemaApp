<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\TicketDetailsController;
use GuzzleHttp\Middleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::view("/", "home");
Route::get("login", [LoginController::class, "viewLoginPage"])->middleware("isNotLoggedIn");
Route::post("login", [LoginController::class, "attemptLogin"])->middleware("isNotLoggedIn");
Route::get("signup", [SignUpController::class, "viewSignUpPage"])->middleware("isNotLoggedIn");
Route::post("signup", [SignUpController::class, "signUpNewUser"])->middleware("isNotLoggedIn");

// !!!! CREATE CONTROLLERS AND CHANGE TO GET METHODS LATER !!!!
Route::view("book/{movieID}", "bookTicket")->middleware("isLoggedIn");
Route::view("profile", "profile")->middleware("isLoggedIn");
Route::view("updateprofile", "updateProfile")->middleware("isLoggedIn");
Route::get("ticket/{ticketID}", [TicketDetailsController::class, "viewTicketDetails"])->middleware("isLoggedIn");




// to print stuff into the console:

// $out = new \Symfony\Component\Console\Output\ConsoleOutput();
// $out->writeln("in controller");