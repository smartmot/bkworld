<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class MemberController extends Controller
{
    /*
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allow = ["admin"];
        $confirm = in_array(Auth::user()->role, $allow);
        if ($confirm){
            return view("admin.member")->with([
                "members" => Member::all()
            ]);
        }else{
            return abort(404);
        }
    }

    /*
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allow = ["admin"];
        $confirm = in_array(Auth::user()->role, $allow);
        if ($confirm){
            return view("admin.member_create");
        }else{
            return abort(404);
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
        $allow = ["admin"];
        $confirm = in_array(Auth::user()->role, $allow);


        if (!$confirm){
            abort(404);
        }

        $validator = Validator::make($request->all(), [
            "name" => ["required", "max:255"],
            "position" => ["nullable", "max:255"],
            "type" => ["required", "in:management,operation"],
            "photo" => ["required", "max:255"],
            "facebook" => ["nullable", "max:255"],
            "instagram" => ["nullable", "max:255"],
            "youtube" => ["nullable", "max:255"],
            "twitter" => ["nullable", "max:255"],
            "description" => ["nullable", "max:255"],
            "content" => ["nullable"],
        ]);
        $data = $validator->validate();
        $data["user_id"] = Auth::id();

        $image = "images/cache/upload_". Auth::id() . ".jpg";

        $cover = date("Y/m/d/his");
        $foler = "images/";
        if ($confirm){
            if (Storage::disk("local")->exists($image)) {
                Storage::move($image, $foler.$cover. ".jpg");
                $photo = Image::make("photo/".$cover. ".jpg");
                $photo->resize(300, 350);
                $photo->save($photo->dirname."/".$photo->filename."_thumb.".$photo->extension);
                $data["photo"] = $cover;
            }else{
                $validator->errors()->add("photo", "Please upload a photo");
            }

            $member = new Member($data);
            $member->save();
        }
        return redirect(route("member.index"));
    }

    /*
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        $allow = ["admin"];
        $confirm = in_array(Auth::user()->role, $allow);
        if ($confirm){
            return view("admin.member_show")->with([
                "member" => $member
            ]);
        }else{
            return redirect(route("admin.index"));
        }
    }

    /*
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        if ($member->user_id == Auth::id() or Auth::user() == "admin"){
            return view("admin.member_edit")->with([
                "member" => $member
            ]);
        }else{
            return redirect(route("member.index"))->withErrors([
                "alert" => "No Permission",
                "alert_message" => "You don't have permission to edit this member"
            ])->withInput();
        }
    }

    /*
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        $old_photo = $member["photo"];
        $validator = Validator::make($request->all(), [
            "name" => ["required", "max:255"],
            "position" => ["nullable", "max:255"],
            "type" => ["required", "in:management,operation"],
            "photo" => ["required", "max:255"],
            "facebook" => ["nullable", "max:255"],
            "instagram" => ["nullable", "max:255"],
            "youtube" => ["nullable", "max:255"],
            "twitter" => ["nullable", "max:255"],
            "description" => ["nullable", "max:255"],
            "content" => ["nullable"],
        ]);
        $data = $validator->validate();

        $image = "images/cache/upload_". Auth::id() . ".jpg";
        $cover = date("Y/m/d/his");
        $foler = "images/";
        $member->name = $data["name"];
        $member->position = $data["position"];
        $member->photo = $data["photo"];
        $member->facebook = $data["facebook"];
        $member->instagram = $data["instagram"];
        $member->youtube = $data["youtube"];
        $member->twitter = $data["twitter"];
        $member->description = $data["description"];
        $member->content = $data["content"];
        $member->type = $data["type"];

        if ($member->user_id == Auth::id() or Auth::user() == "admin"){
            if ($member->isDirty("photo")){

                if (Storage::disk("local")->exists($image)) {
                    Storage::move($image, $foler.$cover. ".jpg");
                    Storage::disk("local")->delete([
                        "images/".$old_photo.".jpg",
                        "images/".$old_photo."_thumb.jpg",
                    ]);
                    $photo = Image::make("photo/".$cover. ".jpg");
                    $photo->resize(300, 350);
                    $photo->save($photo->dirname."/".$photo->filename."_thumb.".$photo->extension);
                    $member->photo = $cover;
                }else{
                    $validator
                        ->after(function ($validator){
                            $validator->errors()->add("photo","Please upload a photo");
                        })->validate();
                }
            }

            if (count($member->getDirty()) == 0){
                return redirect(route("member.index"));
            }else{
                $member->updated_by = Auth::id();
                $member->update($member->getDirty());
                return redirect(route("member.index"));
            }
        }else{
            return redirect(route("member.index"))->withErrors([
                "alert" => "No permission",
                "alert_message" => "You don't have permission to edit this member"
            ])->withInput();
        }

    }

    /*
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        if (Auth::user()->role == "admin"){
            Storage::disk("local")->delete([
                "images/".$member->photo.".jpg",
                "images/".$member->photo."_thumb.jpg",
            ]);
            $member->delete();
            return redirect(route("member.index"));
        }else{
            if ($member->user_id == Auth::id()){
                Storage::disk("local")->delete([
                    "images/".$member->photo.".jpg",
                    "images/".$member->photo."_thumb.jpg",
                ]);
                $member->delete();
                return redirect(route("member.index"));
            }else{
                return redirect(route("member.index"))->withErrors([
                    "alert" => "No permission",
                    "alert_message" => "You don't have permission to update this member"
                ])->withInput();
            }
        }
    }

    public function photo(Request $request){
        $validator = Validator::make($request->all(),[
            "mphoto" => ["required", "image", "mimes:jpeg", "max:5126", "min:1", "dimensions:ratio=6/7"]
        ]);
        if ($validator->fails()){
            $error = $validator->errors()->add("error", true);
            return response($error);
        }else{
            $name = "cache/post_". Auth::id() . ".jpg";
            $url = $request->mphoto->storeAs('images', $name, 'local');
            return response(["url"=>$name."?ver=".date("his"), "error"=>false]);
        }
    }

    public function member(Member $member){
        return view("member")->with([
            "member" => $member,
            "relates" => Member::query()
                ->where("type", $member["type"])
                ->whereKeyNot($member["id"])
                ->limit(5)
                ->get()
        ]);
    }
}
