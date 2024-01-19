<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TicketType;
use DB;

class TicketTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = TicketType::all();

        return view('ticketTypes/index', [
            'types' => $types
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ticketTypes/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $type = new TicketType;
        $type -> type = $request -> input('type');
        $type -> save();

        return redirect('/ticketTypes');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $type = TicketType::find($id);
        return view('ticketTypes/show', ['type' => $type]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $type = TicketType::find($id);
        return view('ticketTypes/edit', ['type' => $type]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $type = TicketType::find($id);
        $type -> type = $request -> input('type');
        $type -> save();

        return redirect('/ticketTypes');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('ticket_types')->where('id', "=", $id)->delete();
        return redirect('/ticketTypes');
    }
}
