<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\TicketDetailsController;
use App\Http\Controllers\AdminController;
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

Route::get("/", [HomeController::class, "viewHomePage"]);
Route::get("login", [LoginController::class, "viewLoginPage"])->middleware("isNotLoggedIn");
Route::post("login", [LoginController::class, "attemptLogin"])->middleware("isNotLoggedIn");
Route::get("signup", [SignUpController::class, "viewSignUpPage"])->middleware("isNotLoggedIn");
Route::post("signup", [SignUpController::class, "signUpNewUser"])->middleware("isNotLoggedIn");

Route::get("logout", [LoginController::class, "logout"])->middleware("isLoggedIn");

// !!!! CREATE CONTROLLERS AND CHANGE TO GET METHODS LATER !!!!
Route::view("movie/{movieID}", "movieDetails");
Route::view("book/{movieID}", "bookTicket")->middleware("isLoggedIn");
Route::view("profile", "profile")->middleware("isLoggedIn");
Route::view("updateprofile", "updateProfile")->middleware("isLoggedIn");
Route::get("ticket/{ticketID}", [TicketDetailsController::class, "viewTicketDetails"])->middleware("isLoggedIn");
Route::get("admin", [AdminController::class, "viewAdminDashboard"])->middleware(["isLoggedIn", "isAdmin"]);
Route::get("admin/movie/create", [AdminController::class, "viewCreateMoviePage"])->middleware(["isLoggedIn", "isAdmin"]);
Route::post("admin/movie/create", [AdminController::class, "createMovie"])->middleware(["isLoggedIn", "isAdmin"]);
Route::get("admin/movie/edit/{movieID}", [AdminController::class, "viewEditMoviePage"])->middleware(["isLoggedIn", "isAdmin"]);
Route::post("admin/movie/edit/{movieID}", [AdminController::class, "editMovie"])->middleware(["isLoggedIn", "isAdmin"]);
Route::get("admin/movie/delete/{movieID}", [AdminController::class, "deleteMovie"])->middleware(["isLoggedIn", "isAdmin"]);
Route::view("noaccess", "noAccess");




// to print stuff into the console:

// $out = new \Symfony\Component\Console\Output\ConsoleOutput();
// $out->writeln("in controller");