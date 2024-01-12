<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Temporada;
use DB;

class TemporadaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $temporadas = Temporada::all();
        /*
        $temporadas = [
            ["La casa de papel", 1, "Primera Temporada", 8],
            ["Suits", 2, "Segunda Temporada", 20],
            ["Como conoci a vuestra madre", 4, "Cuarta Temporada", 15],
            ["Friends", 1, "Primera Temporada", 12]
        ];
        */
        $mensaje = "Pagina de temporadas";

        return view('temporadas/index', ['temporadas' => $temporadas, 'mensaje' => $mensaje]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('temporadas/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $temporada = new Temporada;
        $temporada -> nombre = $request -> input('nombre');
        $temporada -> id_temporada = $request -> input('id_temporada');
        $temporada -> titulo = $request -> input('titulo');
        $temporada -> capitulos = $request -> input('capitulos');
        $temporada -> save();

        return redirect('/temporadas');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $temporada = Temporada::find($id);
        return view('temporadas/show', ['temporada'=>$temporada]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $temporada = Temporada::find($id);
        return view('temporadas/edit', ['temporada'=>$temporada]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $temporada = Temporada::find($id);
        $temporada -> nombre = $request -> input('nombre');
        $temporada -> id_temporada = $request -> input('id_temporada');
        $temporada -> titulo = $request -> input('titulo');
        $temporada -> capitulos = $request -> input('capitulos');
        $temporada -> save();

        return redirect('/temporadas');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('temporadas')->where('id', "=", $id)->delete();
        return redirect('/temporadas');
    }
}
