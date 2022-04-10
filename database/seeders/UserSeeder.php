<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("users")->insert([
            "username" => "leequan",
            "password" => Hash::make("LeeQuanPass!"),
            "isAdmin" => false
        ]);
        DB::table("users")->insert([
            "username" => "kangyee",
            "password" => Hash::make("KangYeePass!"),
            "isAdmin" => false
        ]);
        DB::table("users")->insert([
            "username" => "adrian",
            "password" => Hash::make("AdrianPass!"),
            "isAdmin" => false
        ]);
        DB::table("users")->insert([
            "username" => "lianghan",
            "password" => Hash::make("LiangHanPass!"),
            "isAdmin" => false
        ]);
        DB::table("users")->insert([
            "username" => "admin",
            "password" => Hash::make("AdminPass!"),
            "isAdmin" => true
        ]);
    }
}
