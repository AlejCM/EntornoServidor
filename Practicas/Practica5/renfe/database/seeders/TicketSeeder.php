<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("tickets")->insert([
            [
                "date" => "2021-05-21",
                "price" => 5.25,
                "train_id" => 1,
                "ticketType_id" => 3
            ],
            [
                "date" => "2023-07-08",
                "price" => 35.50,
                "train_id" => 2,
                "ticketType_id" => 2
            ],
            [
                "date" => "2022-12-15",
                "price" => 50,
                "train_id" => 3,
                "ticketType_id" => 1
            ]
        ]);
    }
}
