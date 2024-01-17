<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class ArtistaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("artistas")->insert([
            [
                "nombre_artista" => "Los chichos",
                "genero_artista" => "Grupo"
            ],
            [
                "nombre_artista" => "Queen",
                "genero_artista" => "Grupo"
            ],
            [
                "nombre_artista" => "Camaron",
                "genero_artista" => "Marisco"
            ],
        ]);
    }
}
