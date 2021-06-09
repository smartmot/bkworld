<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{

    /*
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.setting")->with([

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        //
    }

    /*
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        return view("admin.settings.".$setting->name)->with([
            "setting" => $setting
        ]);
    }

    /*
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setting $setting)
    {
        $resp=[
            "error" => true,
        ];
        switch ($setting->name){
            case "featured_video":
                $validator = Validator::make($request->all(),[
                    "title" => ["required", "max:255"],
                    "video" => ["required"],
                    "content" => ["required"]
                ]);
                if ($validator->fails()){
                    $resp["failed"] = array_keys($validator->errors()->toArray());
                }else{
                    $data = $validator->validate();
                    $setting->json = json_encode(
                        [
                            "title" => $data["title"],
                            "video" => $data["video"]
                        ]
                    );
                    $setting->content = $data["content"];
                    $setting->save();
                    $resp["error"] = $data;
                }
                return response($resp);
                break;
            default:abort(404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        //
    }

    public function setting($item){
        $keys = array_keys(config("settings"));
        if (in_array($item, $keys)){
            return view("admin.setting_edit");
        }else{
            return abort(404);
        }
    }
    public function update_item(Request $request, $item){
        $validator = Validator::make($request->all(),[
            "name" => ["max:255", "min:3"],
            "address" => ["max:255", "min:3"],
            "tel" => ["max:255", "min:3"],
            "website" => ["max:255", "min:3"],
            "email" => ["max:255", "min:3"],
            "facebook" => ["max:255", "min:3"],
            "youtube" => ["max:255", "min:3"],
            "twitter" => ["max:255", "min:3"],
            "instagram" => ["max:255", "min:3"],
            "notifications" => ["max:255", "min:3", "email"],
            "description" => ["max:500", "min:3"],
            "map" => ["max:500", "min:3"],
            "keywords" => ["max:255", "min:3"],
            "admin" => ["in:default"],
            "theme" => ["in:default"],
            "admin_header" => ["in:header_1"],
        ]);
        $data = $validator->validate();
        config(['settings.'.$item => $data[$item]]);
        $fp = fopen(base_path() .'/config/settings.php' , 'w');
        fwrite($fp, '<?php return ' . var_export(config('settings'), true) . ';');
        fclose($fp);
        return redirect(route("setting.index"));
    }

    public function config(Request $request){

    }
}
