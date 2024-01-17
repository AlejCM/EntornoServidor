<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class CancionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("cancions")->insert([
            [
                "titulo_cancion" => "Bailaras con alegria",
                "duracion" => 150,
                "genero_cancion" => "Flamenco",
                "artista_id" => 1
            ],
            [
                "titulo_cancion" => "Bohemian Rhapsody",
                "duracion" => 240,
                "genero_cancion" => "Rock",
                "artista_id" => 2
            ],
            [
                "titulo_cancion" => "Nana del caballo grande",
                "duracion" => 130,
                "genero_cancion" => "Flamenco",
                "artista_id" => 3
            ],
        ]);
    }
}
