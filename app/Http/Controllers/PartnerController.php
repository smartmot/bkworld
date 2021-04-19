<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class PartnerController extends Controller
{
    /*
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.partner")->with([
            "partners" => Partner::query()->orderBy("created_at", "desc")->paginate()
        ]);
    }

    /*
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.partner_create");
    }

    /*
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            "name"=> ["required"],
            "logo"=> ["required"],
            "website"=> ["nullable"],
            "email"=> ["nullable"],
            "phone"=> ["nullable"],
            "address"=> ["nullable"],
        ]);

        $data = $validator->validate();
        $data["user_id"] = Auth::id();
        $image = "images/cache/post_". Auth::id() . ".jpg";

        $cover = date("Y/m/d/his");
        $foler = "images/";
        if (Storage::disk("local")->exists($image)) {
            Storage::move($image, $foler.$cover. ".jpg");
            $data["logo"] = $cover;
        }else{
            $validator->errors()->add("logo", "Please upload a logo");
        }
        $partner = new Partner($data);
        $partner->save();
        return redirect(route("partner.index"));
    }

    /*
     * Display the specified resource.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function show(Partner $partner)
    {
        return view("admin.partner_show")->with([
            "partner" => $partner
        ]);
    }

    /*
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function edit(Partner $partner)
    {
        if ($partner->user_id == Auth::id() or Auth::user() == "admin"){
            return view("admin.partner_edit")->with([
                "partner" => $partner
            ]);
        }else{
            return redirect(route("partner.index"))->withErrors([
                "alert" => "No Permission!",
                "alert_message" => "No permission to edit this partner"
            ])->withInput();
        }
    }

    /*
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Partner $partner)
    {
        if ($partner->user_id == Auth::id() or Auth::user() == "admin"){
            $validator = Validator::make($request->all(),[
                "name"=> ["required"],
                "logo"=> ["required"],
                "website"=> ["nullable"],
                "email"=> ["nullable"],
                "phone"=> ["nullable"],
                "address"=> ["nullable"],
            ]);

            $data = $validator->validate();
            $image = "images/cache/post_". Auth::id() . ".jpg";
            $cover = date("Y/m/d/his");
            $foler = "images/";
            $partner->name = $data["name"];
            $partner->logo = $data["logo"];
            $partner->website = $data["website"];
            $partner->email = $data["email"];
            $partner->phone = $data["phone"];
            $partner->address = $data["address"];
            if ($partner->isDirty("logo")){
                if (Storage::disk("local")->exists($image)) {
                    Storage::move($image, $foler.$cover. ".jpg");
                    $partner->logo = $cover;
                }else{
                    $validator->errors()->add("logo", "Please upload a logo");
                }
            }
            if (count($partner->getDirty()) == 0){
                return redirect(route("partner.index"));
            }else{
                $partner->updated_by = Auth::id();
                $partner->update($partner->getDirty());
                return redirect(route("partner.index"));
            }

        }else{
            return redirect(route("partner.index"))->withErrors([
                "alert" => "No Permission!",
                "alert_message" => "No permission to edit this partner"
            ])->withInput();
        }
    }

    /*
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partner $partner)
    {
        if ($partner->user_id == Auth::id() or Auth::user() == "admin"){
            Storage::disk("local")->delete([
                "images/".$partner->logo.".jpg",
            ]);
            $partner->delete();
            return redirect(route("partner.index"));
        }else{
            return redirect(route("partner.index"))->withErrors([
                "alert" => "No Permission!",
                "alert_message" => "No permission to delete this partner"
            ])->withInput();
        }
    }

    public function logo(Request $request){
        $validator = Validator::make($request->all(),[
            "partner" => ["required", "image", "max:5000", "min:1"]
        ]);
        if ($validator->fails()){
            $error = $validator->errors()->add("error", true);
            return response($error);
        }else{
            $name = "cache/post_". Auth::id() . ".jpg";
            $url = $request->partner->storeAs('images', $name, 'local');
            return response(["url"=>$name."?ver=".date("his"), "error"=>false]);
        }
    }
}
