<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Serie;

class SerieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $series = Serie::all();
        /*
        $series = [
            ["La casa de papel", "Netflix", 5],
            ["Suits", "Amazon Prime", 3],
            ["Como conoci a vuestra madre", "Netflix", 10],
            ["El plan del diablo", "HBO", 4]
        ];
        */
        $mensaje = "Pagina de series";

        return view('series/index', ['series' => $series, 'mensaje' => $mensaje]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
