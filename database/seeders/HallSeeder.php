<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HallSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("halls")->insert([
            "type" => "Classic",
        ]);
        DB::table("halls")->insert([
            "type" => "Deluxe",
        ]);
        DB::table("halls")->insert([
            "type" => "Plushy",
        ]);
        DB::table("halls")->insert([
            "type" => "IMAX",
        ]);
        DB::table("halls")->insert([
            "type" => "3D",
        ]);
    }
}
