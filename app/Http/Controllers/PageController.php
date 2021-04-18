<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PageController extends Controller
{
    /*
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.page")->with([
            "pages" => Page::query()->orderBy("created_at","DESC")->paginate()
        ]);
    }

    /*
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.page_create");
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
            "title" => ["required", "max:255"],
            "slug" => ["required", "unique:pages,slug", "regex:/^[a-zA-Z][a-zA-Z0-9-_\.]{1,20}$/"],
            "keyword" => ["nullable","max:200"],
            "description" => ["nullable", "max:255"],
            "content" => ["required"],
        ]);
        $data = $validator->validate();
        $data["user_id"] = Auth::id();
        $page = new Page($data);
        $page->save();
        return redirect(route("page.index"));
    }

    /*
     * Display the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        return view("admin.page_show")->with([
            "page" => $page
        ]);
    }

    /*
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        return view("admin.page_edit")->with([
            "page" => $page
        ]);
    }

    /*
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        $validator = Validator::make($request->all(), [
            "title" => ["required", "max:255"],
            "slug" => ["required", "regex:/^[a-zA-Z][a-zA-Z0-9-_\.]{1,20}$/"],
            "keyword" => ["nullable","max:200"],
            "description" => ["nullable", "max:255"],
            "content" => ["required"],
        ]);
        $data = $validator->validate();
        $data["updated_by"] = Auth::id();
        if ($data["slug"] != $page->slug){
            $slug = Validator::make($request->only("slug"), [
                "slug" => ["unique:pages,slug"]
            ])->validate();
        }
        $page->update($data);
        return redirect(route("page.index"));
    }

    /*
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        $no_delete = [
            "about"
        ];
        if ($page->user_id == Auth::id() or Auth::user() == "admin") {
            if (in_array($page->slug, $no_delete)){
                return redirect(route("page.index"))->withErrors([
                    "alert" => "Delete Failed",
                    "alert_message" => "This page is can't not delete"
                ])->withInput();
            }else{
                $page->delete();
                return redirect(route("page.index"));
            }
        }else{
                return redirect(route("page.index"))->withErrors([
                    "alert" => "Delete Failed",
                    "alert_message" => "You are no permission to delete this page"
                ])->withInput();
        }
    }
}
