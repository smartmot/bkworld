<?php

use App\Mail\ResetMail;
use Illuminate\Support\Facades\Mail;
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

        Route::post("/admin/post/upload", [Controllers\UploadController::class, "image"])->name("upload.image");
        Route::post("/admin/post/upload/crop", [Controllers\UploadController::class, "crop"])->name("upload.crop");
    });

Route::get("/abc", function (){
   return view("abc");
})->name("abc");
Route::get("/soft/{soft}", [Controllers\SoftController::class, "index"])->name("soft");
Route::middleware("auth")
    ->group(function ()
{
    Route::get("/admin", [Controllers\AdminController::class, "index"])->name("admin.index");
    Route::get("/admin/profile", [Controllers\AdminController::class, "edit"])->name("admin.edit");
    Route::put("/admin/profile", [Controllers\AdminController::class, "update"])->name("admin.update");
    Route::post("/admin/photo", [Controllers\AdminController::class, "photo"])->name("admin.photo");
    Route::get("/admin/password", [Controllers\AdminController::class, "password_form"])->name("admin.pw_form");
    Route::put("/admin/password", [Controllers\AdminController::class, "update_password"])->name("admin.pw_update");
    Route::resource("/admin/user", Controllers\UserController::class);
    Route::resource("/admin/post", Controllers\PostController::class);
    Route::resource("/admin/page", Controllers\PageController::class);
    Route::resource("/admin/member", Controllers\MemberController::class);
    Route::resource("/admin/partner", Controllers\PartnerController::class);
    Route::resource("/admin/media", Controllers\MediaController::class);
    Route::resource("/admin/setting", Controllers\SettingController::class)->middleware("admin");
    Route::get("/admin/settings/{setting}", [Controllers\SettingController::class, "setting"])
        ->middleware("admin")
        ->name("setting.item");
    Route::put("/admin/settings/{setting}", [Controllers\SettingController::class, "update_item"])
        ->middleware("admin")
        ->name("setting.item_update");
    Route::resource("/admin/event", Controllers\EventController::class);
    Route::resource("/admin/message", Controllers\MessageController::class);
    Route::post("/admin/post/thumb", [Controllers\PostController::class,"thumbnail"])->name("post.thumb");
    Route::post("/admin/member/photo", [Controllers\MemberController::class,"photo"])->name("member.photo");
    Route::post("/admin/partner/logo", [Controllers\PartnerController::class,"logo"])->name("partner.logo");
    Route::post("logout", [Controllers\LoginController::class, "logout"])->name("logout");
});

Route::post("/login/reset_password", [Controllers\LoginController::class, "reset_check"])
    ->middleware("guest")
    ->name("update_password");
Route::get("/login/reset_password/verify", [Controllers\LoginController::class, "reset_confirm"])
    ->middleware("guest")
    ->name("reset_confirm");

Route::post("/login/reset_password/verify", [Controllers\LoginController::class, "reset_final"])
    ->middleware("guest")
    ->name("reset_confirm.submit");

Route::get("/login/new_password", [Controllers\LoginController::class, "new_password"])
    ->middleware("guest")
    ->name("new_password");

Route::put("/login/new_password", [Controllers\LoginController::class, "save_password"])
    ->middleware("guest")
    ->name("new_password.save");

Route::get("/login/reset_password", [Controllers\LoginController::class, "reset_password"])
    ->middleware("guest")
    ->name("reset_password");

Route::get("/login", [Controllers\LoginController::class, "login"])
    ->middleware("guest")
    ->name("login");
Route::post("/login", [Controllers\LoginController::class, "login_check"])
    ->middleware("guest")
    ->name("login.check");

Route::get("/uploads",[Controllers\TestController::class,"show"])->name("upload");
Route::post("/uploads",[Controllers\TestController::class,"uplaod"])->name("upload.submit");
