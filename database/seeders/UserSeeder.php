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
            "password" => Hash::make("LeeQuanPass!")
        ]);
        DB::table("users")->insert([
            "username" => "kangyee",
            "password" => Hash::make("KangYeePass!")
        ]);
        DB::table("users")->insert([
            "username" => "adrian",
            "password" => Hash::make("AdrianPass!")
        ]);
        DB::table("users")->insert([
            "username" => "lianghan",
            "password" => Hash::make("LiangHanPass!")
        ]);
    }
}
