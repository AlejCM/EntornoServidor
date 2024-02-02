<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Film;
use App\Http\Resources\FilmResource;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/films', function(){
    return FilmResource::collection(Film::all());
});

Route::get('/films/{id}', function(string $id){
    return new FilmResource(Film::findOrFail($id));
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
