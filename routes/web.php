<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use Intervention\Image\Facades\Image;

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

Route::middleware("auth")
    ->group(function ()
    {
        Route::get("/executive_committee", [Controllers\HomeController::class, "two"])->name("home.two");
        Route::get("/services", [Controllers\HomeController::class, "services"])->name("services");
        Route::get("/events", [Controllers\HomeController::class, "events"])->name("events");
        Route::get("/news", [Controllers\HomeController::class, "news"])->name("news");
        Route::get("/news/{post}", [Controllers\PostController::class, "news"])->name("news.show");
        Route::post("/post/", [Controllers\PostController::class, "post"])->name("post.load");
        Route::get("/event/{event}", [Controllers\EventController::class, "event"])->name("event.single");
        Route::get("/member/{member}", [Controllers\MemberController::class, "member"])->name("member.single");
        Route::get("/test1", [Controllers\PostController::class, "post"]);
        Route::get("/about", [Controllers\HomeController::class, "about"])->name("about");
        Route::get("/contact", [Controllers\HomeController::class, "contact"])->name("contact");
    });

Route::get("/abc", function (){
    return \Illuminate\Support\Facades\Auth::logout();
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
    Route::post("/admin/member/photo", [Controllers\MemberController::class,"photo"])->name("member.photo");
    Route::post("/admin/partner/logo", [Controllers\PartnerController::class,"logo"])->name("partner.logo");
});

Route::get("/login", [Controllers\LoginController::class, "login"])
    ->middleware("guest")
    ->name("login");
Route::post("/login", [Controllers\LoginController::class, "login_check"])
    ->middleware("guest")
    ->name("login.check");

