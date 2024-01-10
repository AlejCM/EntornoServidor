<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class TemporadaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('temporadas')->insert([
            ['nombre'=>"La casa de papel", 
            'id_temporada'=>1, 
            'titulo'=>"Primera Temporada", 
            'capitulos'=>8],
            ['nombre'=>"Suits", 
            'id_temporada'=>2, 
            'titulo'=>"Segunda Temporada", 
            'capitulos'=>20],
            ['nombre'=>"Como conoci a vuestra madre", 
            'id_temporada'=>4, 
            'titulo'=>"Cuarta Temporada", 
            'capitulos'=>15],
            ['nombre'=>"Friends", 
            'id_temporada'=>1, 
            'titulo'=>"Primera Temporada", 
            'capitulos'=>12]
        ]);
    }
}
