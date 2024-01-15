<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class SerieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('series')->insert([
            ['titulo'=>"La casa de papel", 
            'plataforma'=>"Netflix", 
            'num_temporadas'=>5],
            ['titulo'=>"Suits", 
            'plataforma'=>"Amazon Prime", 
            'num_temporadas'=>3],
            ['titulo'=>"Como conoci a vuestra madre", 
            'plataforma'=>"Netflix", 
            'num_temporadas'=>10],
            ['titulo'=>"El plan del diablo", 
            'plataforma'=>"HBO", 
            'num_temporadas'=>4]
        ]);
    }
}
