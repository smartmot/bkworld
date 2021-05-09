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
        $allow = [
            "admin"
        ];
        $confirm = in_array(Auth::user()->role, $allow);
        if ($confirm){
            return view("admin.user")->with([
                "users" => User::query()
                    ->orderBy("created_at", "asc")
                    ->get()
            ]);
        }else{
            return redirect(route("admin.index"))->withErrors([
                "alert" => "No Permission",
                "alert_message" => "You don't have permission to edit this member"
            ])->withInput();
        }
    }

    /*
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $allow = [
            "admin"
        ];
        $confirm = in_array(Auth::user()->role, $allow);
        if ($confirm){
            return view("admin.user_create")->with([]);
        }else{
            return redirect(route("user.index"));
        }
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
        $data["options"] = json_encode(['message'=>0]);
        $allow = [
            "admin"
        ];
        $confirm = in_array(Auth::user()->role, $allow);
        if ($confirm){
            $user = new User($data);
            $user->save();
            return redirect(route("user.index"));
        }
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
        $allow = [
            "admin"
        ];
        $confirm = in_array(Auth::user()->role, $allow);
        if ($confirm){
            return view("admin.user_edit")->with([
                "user" => $user
            ]);
        }else{
            return redirect(route("user.index"))->withErrors([
                "alert" => "No Permission",
                "alert_message" => "You don't have permission to edit this member"
            ])->withInput();
        }
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
        $allow = [
            "admin"
        ];
        $confirm = in_array(Auth::user()->role, $allow);
        $validator = Validator::make($request->all(), [
            "gender" => ["required", "in:male,female"],
            "role" => ["required", "in:admin,editor,moderator"],
        ]);
        $data = $validator->validate();

        $data["updated_by"] = Auth::id();
        if ($confirm){
            $user->update($data);
            return redirect(route("user.index"));
        }else{
            return redirect(route("user.index"))->withErrors([
                "alert" => "No Permission",
                "alert_message" => "You don't have permission to edit this member"
            ])->withInput();
        }
    }

    /*
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $allow = [
            "admin"
        ];
        $confirm = in_array(Auth::user()->role, $allow);
        if ($confirm){
            $user->status = "deleted";
            $user->updated_by = Auth::id();
            $user->save();
            return redirect(route("user.index"));
        }else{
            return redirect(route("user.index"))->withErrors([
                "alert" => "No Permission",
                "alert_message" => "You don't have permission to edit this member"
            ])->withInput();
        }
    }
}
