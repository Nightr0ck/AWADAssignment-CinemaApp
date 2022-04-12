<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\BookTicketController;
use App\Http\Controllers\ProfileController;
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

// ================= Home Page =================
Route::get("/", [HomeController::class, "viewHomePage"]);



// ================= Login/Logout & Signup Pages =================
Route::get("login", [LoginController::class, "viewLoginPage"])->middleware("isNotLoggedIn");
Route::post("login", [LoginController::class, "attemptLogin"])->middleware("isNotLoggedIn");
Route::get("signup", [SignUpController::class, "viewSignUpPage"])->middleware("isNotLoggedIn");
Route::post("signup", [SignUpController::class, "signUpNewUser"])->middleware("isNotLoggedIn");
Route::get("logout", [LoginController::class, "logout"])->middleware("isLoggedIn");




// ================= Movie Details & Ticket Booking Pages =================
Route::get("movie/{movieID}", [MovieController::class, "viewMovieDetails"]);
Route::get("book/{movieID}", [BookTicketController::class, "viewBookTicketPage"])->middleware("isLoggedIn");
Route::post("book/{movieID}", [BookTicketController::class, "bookTicket"])->middleware("isLoggedIn");




// ================= Profile & Ticket Detail Pages =================
Route::get("profile", [ProfileController::class, "viewProfilePage"])->middleware("isLoggedIn");
Route::get("profile/update/password", [ProfileController::class, "viewUpdatePasswordPage"])->middleware("isLoggedIn");
Route::post("profile/update/password", [ProfileController::class, "updatePassword"])->middleware("isLoggedIn");
Route::get("ticket/view/{ticketID}", [TicketDetailsController::class, "viewTicketDetailsPage"])->middleware("isLoggedIn");
Route::get("ticket/edit/{ticketID}", [TicketDetailsController::class, "viewEditTicketPage"])->middleware("isLoggedIn");
Route::post("ticket/edit/{ticketID}", [TicketDetailsController::class, "editTicket"])->middleware("isLoggedIn");
Route::get("ticket/cancel/{ticketID}", [TicketDetailsController::class, "cancelTicket"])->middleware("isLoggedIn");




// ================= Admin Pages =================
Route::get("admin", [AdminController::class, "viewAdminDashboard"])->middleware(["isLoggedIn", "isAdmin"]);

Route::get("admin/movie/create", [AdminController::class, "viewCreateMoviePage"])->middleware(["isLoggedIn", "isAdmin"]);
Route::post("admin/movie/create", [AdminController::class, "createMovie"])->middleware(["isLoggedIn", "isAdmin"]);
Route::get("admin/movie/edit/{movieID}", [AdminController::class, "viewEditMoviePage"])->middleware(["isLoggedIn", "isAdmin"]);
Route::post("admin/movie/edit/{movieID}", [AdminController::class, "editMovie"])->middleware(["isLoggedIn", "isAdmin"]);
Route::get("admin/movie/delete/{movieID}", [AdminController::class, "deleteMovie"])->middleware(["isLoggedIn", "isAdmin"]);

Route::get("admin/hall/create", [AdminController::class, "viewCreateHallPage"])->middleware(["isLoggedIn", "isAdmin"]);
Route::post("admin/hall/create", [AdminController::class, "createHall"])->middleware(["isLoggedIn", "isAdmin"]);
Route::get("admin/hall/edit/{hallID}", [AdminController::class, "viewEditHallPage"])->middleware(["isLoggedIn", "isAdmin"]);
Route::post("admin/hall/edit/{hallID}", [AdminController::class, "editHall"])->middleware(["isLoggedIn", "isAdmin"]);
Route::get("admin/hall/delete/{hallID}", [AdminController::class, "deleteHall"])->middleware(["isLoggedIn", "isAdmin"]);




// ================= Not Authorised Page =================
Route::view("noaccess", "noAccess");




// to print stuff into the console:

// $out = new \Symfony\Component\Console\Output\ConsoleOutput();
// $out->writeln("in controller");