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
            ['serie_id'=>1, 
            'id_temporada'=>1, 
            'titulo'=>"Primera Temporada", 
            'capitulos'=>8],
            ['serie_id'=>2, 
            'id_temporada'=>2, 
            'titulo'=>"Segunda Temporada", 
            'capitulos'=>20],
            ['serie_id'=>3, 
            'id_temporada'=>4, 
            'titulo'=>"Cuarta Temporada", 
            'capitulos'=>15],
            ['serie_id'=>4, 
            'id_temporada'=>1, 
            'titulo'=>"Primera Temporada", 
            'capitulos'=>12]
        ]);
    }
}
