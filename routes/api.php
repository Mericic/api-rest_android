<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::get('/show/{id_user}', 'ControllerNotes@show')->where('id_user', '[0-9]+');
Route::post('/add/{id_user}', 'ControllerNotes@add')->where('id_user', '[0-9]+');
Route::post('/delete/{id_note}', 'ControllerNotes@delete')->where('id_note', '[0-9]+');
Route::post('/update/{id_note}', 'ControllerNotes@update')->where('id_note', '[0-9]+');
//Route::get('/matieres', 'ControllerNotes@matieres');
Route::get('/matieres', 'ControllerMatieres@show');
Route::post('/matieres/add', 'ControllerMatieres@add');
Route::get('/matieres/delete/{id_matiere}', 'ControllerMatieres@add')->where('id_matiere', '[0-9]+');