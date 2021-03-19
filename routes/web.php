<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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

Route::get("/", [Controllers\HomeController::class, "home"])->name("home");
Route::get("/soft/{soft}", [Controllers\AdminController::class, "home"])->name("home");
Route::middleware("auth")->group(function (){
    Route::get("/admin", [Controllers\AdminController::class, "index"])->name("admin.index");
});

Route::get("/login", [Controllers\LoginController::class, "login"])->middleware("guest")->name("login");
Route::post("/login", [Controllers\LoginController::class, "login_check"])->middleware("guest")->name("login.check");
