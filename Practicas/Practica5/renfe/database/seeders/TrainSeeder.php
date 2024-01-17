<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class TrainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("trains")->insert([
            [
                "name" => "Cercanias01",
                "passengers" => 200,
                "year" => 2020,
                "trainType_id" => 1
            ],
            [
                "name" => "MD01",
                "passengers" => 300,
                "year" => 2022,
                "trainType_id" => 2
            ],
            [
                "name" => "AVE01",
                "passengers" => 450,
                "year" => 2021,
                "trainType_id" => 3
            ]
        ]);
    }
}
