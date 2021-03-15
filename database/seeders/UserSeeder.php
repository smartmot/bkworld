<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("users")->insert([
            "name"=> "EL MOT",
            "token" => encrypt("qwertyuiop"),
            'status' => "active",
            'role' => "admin",
            'gender' => "male",
            'created_by' => 0,
            'birth_date' => "1995-03-10",
            'email' => "lyelmot@gmail.com",
            'password' => Hash::make("qwertyuiop"),
            'created_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
