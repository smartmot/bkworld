<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("categories")->insert([
            [
                "id" => 1,
                "name"=> "Service",
            ],
            [
                "id" => 2,
                "name"=> "Business Activity",
            ],
            [
                "id" =>3,
                "name" => "Post"
            ],
            [
                "id" => 4,
                "name" => "News"
            ]
        ]);
    }
}
