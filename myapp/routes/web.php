<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('/get_pokemon_data', function (Request $request) {
    $pokemon_name = $request->input('pokemon_name');
    $response = Http::get("https://pokeapi.co/api/v2/pokemon/$pokemon_name");
    $pokemon_data = $response->json();
    // do something with pokemon data

    return view('welcome', ['pokemon_data' => $pokemon_data]);
})->name('get_pokemon_data');