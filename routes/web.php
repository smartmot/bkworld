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
Route::get("/abc", function (){
    $name = "http://bkworld.proj/photo/cache/post_1.jpg";
    $file = \Intervention\Image\Facades\Image::make($name);
    return $file->response();
});
Route::get("/soft/{soft}", [Controllers\SoftController::class, "index"])->name("soft");
Route::middleware("auth")
    ->group(function ()
{
    Route::get("/admin", [Controllers\AdminController::class, "index"])->name("admin.index");
    Route::resource("/admin/user", Controllers\UserController::class);
    Route::resource("/admin/post", Controllers\PostController::class);
    Route::resource("/admin/page", Controllers\PageController::class);
    Route::resource("/admin/member", Controllers\MemberController::class);
    Route::resource("/admin/partner", Controllers\PartnerController::class);
    Route::resource("/admin/setting", Controllers\SettingController::class);
    Route::resource("/admin/event", Controllers\EventController::class);
    Route::resource("/admin/message", Controllers\MessageController::class);
    Route::post("/admin/post/thumb", [Controllers\PostController::class,"thumbnail"])->name("post.thumb");
});

Route::get("/login", [Controllers\LoginController::class, "login"])
    ->middleware("guest")
    ->name("login");
Route::post("/login", [Controllers\LoginController::class, "login_check"])
    ->middleware("guest")
    ->name("login.check");
