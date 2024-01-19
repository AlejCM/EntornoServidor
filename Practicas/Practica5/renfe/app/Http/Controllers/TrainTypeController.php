<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrainType;
use DB;

class TrainTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = TrainType::all();

        return view('trainTypes/index', [
            'types' => $types
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('trainTypes/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $type = new TrainType;
        $type -> type = $request -> input('type');
        $type -> save();

        return redirect('/trainTypes');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $type = TrainType::find($id);
        return view('trainTypes/show', ['type' => $type]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $type = TrainType::find($id);
        return view('trainTypes/edit', ['type' => $type]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $type = TrainType::find($id);
        $type -> type = $request -> input('type');
        $type -> save();

        return redirect('/trainTypes');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('train_types')->where('id', "=", $id)->delete();
        return redirect('/trainTypes');
    }
}
