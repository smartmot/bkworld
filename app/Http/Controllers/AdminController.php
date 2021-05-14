<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    /*
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.profile");
    }

    /*
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /*
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /*
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /*
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = User::query()->where("id", Auth::id())->get();
        if (count($user) === 1){
            return view("admin.profile_edit")->with([
                "user" => $user[0]
            ]);
        }else{
            return abort(404);
        }
    }

    /*
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(),[
            "name" => ["required"],
            "email" => ["required","email"],
            "birth_date" => ["required","date"],
            "gender" => ["required", "in:male,female"],
        ]);
        $user = User::query()->find(Auth::id());
        if ($user != null){
            if ($request->has("email") && $request->get("email") != $user->email){
                $email = Validator::make($request->only("email"),[
                    "email" => ["required", "email", "unique:users,email"]
                ]);
                $email->validate();
            }
            $data = $validator->validate();
            $user->name = $data["name"];
            $user->email = $data["email"];
            $user->birth_date = $data["birth_date"];
            $user->gender = $data["gender"];
            $user->updated_by = Auth::id();
            $user->save();
            return redirect(route("admin.index"));
        }else{
            return abort(404);
        }
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

    public function password_form(){
        return view("admin.profile_password");
    }

    public function update_password(Request $request){
        $user = User::query()->find(Auth::id());
        if ($user != null){
            $validator = Validator::make($request->all(), [
                "password" => ["required"],
                "new_password" => ["required", "confirmed"]
            ]);
            $data = $validator->validate();
            if (Hash::check($request->get("password"), $user->password)){
                $user->password = Hash::make($data["new_password"]);
                $user->updated_by = Auth::id();
                $user->save();
                return redirect(route("admin.index"));
            }else{
                $validator->after(function ($validator){
                    $validator->errors()->add("password","Incorrect Password");
                })->validate();
            }
        }else{
            abort(404);
        }
    }

    public function photo(Request $request){
        $user = User::query()->find(Auth::id())->get();
        $validator = Validator::make($request->all(),[
            "photo" => ["required", "image", "mimes:jpeg", "max:5125", "min:1", "dimensions:ratio=1"]
        ]);
        if ($validator->fails()){
            $error = $validator->errors()->add("error", true);
            return response($error);
        }else{
            $name = "users/.".Auth::id().".jpg";
            $url = $request->photo->storeAs('images', $name, 'local');
            $user->photo = $name;
            return response(["url"=>$name."?ver=".date("his"), "error"=>false]);
        }
    }
}
