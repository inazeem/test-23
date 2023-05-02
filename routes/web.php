<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RickandMortyController;

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


Route::get('/characters', [RickandMortyController::class, 'getCharacters']);
Route::get('/character/{id}', [RickandMortyController::class, 'getCharacter']);
Route::get('/locations', [RickandMortyController::class, 'getlocations']);
Route::get('/location/{id}', [RickandMortyController::class, 'getlocation']);
Route::get('/episodes', [RickandMortyController::class, 'getepisodes']);
Route::get('/episode/{id}', [RickandMortyController::class, 'getepisode']);

Route::get('/pagination/{type}/{id}', [RickandMortyController::class, 'pagination']);
Route::post('/searchcharacter', [RickandMortyController::class, 'searchCharacter']);
