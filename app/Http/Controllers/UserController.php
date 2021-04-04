<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /*
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.user")->with([
            "users" => User::query()
                ->orderBy("created_at", "asc")
                ->get()
        ]);
    }

    /*
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view("admin.user_create")->with([]);
    }

    /*
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name" => ["required", "max:200"],
            "email" => ["required", "unique:users,email", "max:200", "email"],
            "gender" => ["required", "in:male,female"],
            "role" => ["required", "in:admin,editor,moderator"],
            "password" => ["required", "min:8", "max:16"]
        ]);

        $data = $validator->validate();
        $data["token"] = encrypt($data["password"]);
        $data["password"] = Hash::make($data["password"]);
        $data["created_by"] = Auth::id();
        $data["status"] = "active";
        $user = new User($data);
        $user->save();
        return redirect(route("user.index"));
    }

    /*
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return 1;
    }

    /*
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view("admin.user_edit")->with([
            "user" => $user
        ]);
    }

    /*
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            "name" => ["required", "max:200"],
            "email" => ["required", "max:200", "email"],
            "gender" => ["required", "in:male,female"],
            "role" => ["required", "in:admin,editor,moderator"],
        ]);
        $data = $validator->validate();

        if ($user->email != $data["email"]){
            $email = Validator::make($request->only("email"), [
                "email" => ["unique:users,email"]
            ]);
            $email->validate();
        }
        $data["updated_by"] = Auth::id();
        $user->update($data);
        $user->save();
        return $data;//redirect(route("user.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
