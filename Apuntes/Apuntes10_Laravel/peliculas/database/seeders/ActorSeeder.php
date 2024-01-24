<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class ActorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('actors')->insert([
            [
                'first_name' => 'Bruce',
                'last_name' => 'Willis',
                'date_of_birth' => '1970-01-10'
            ],
            [
                'first_name' => 'Samuel L',
                'last_name' => 'Jackson',
                'date_of_birth' => '1972-02-20'
            ],
            [
                'first_name' => 'Leonardo',
                'last_name' => 'Di Caprio',
                'date_of_birth' => '1969-10-25'
            ]
        ]);
    }
}
