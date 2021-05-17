<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("settings")->insert([
            [
                "id" => 1,
                "name"=> "featured_video",
                "json" => json_encode(
                    [
                        "title" => "Lorem ...",
                        "video" => '<iframe width="550" height="310" src="https://www.youtube.com/embed/M0a9C9t0RW8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'
                    ]
                ),
                "content" => "Lorem Ipsum is simply dummy text of the printing"
            ],
            [
                "id" => 2,
                "name"=> "featured_video",
                "json" => json_encode(
                    [
                        "title" => "Lorem ...",
                        "video" => '<iframe src="https://www.youtube.com/embed/M0a9C9t0RW8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'
                    ]
                ),
                "content" => "Lorem Ipsum is simply dummy text of the printing"
            ]
        ]);
    }
}
