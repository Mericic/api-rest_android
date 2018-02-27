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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/show/{id_user}', 'ControllerNotes@show');
Route::post('/add/{id_user}', 'ControllerNotes@add');
Route::post('/delete/{id_note}', 'ControllerNotes@delete');
Route::post('/update/{id_note}', 'ControllerNotes@update');
Route::get('/matieres', 'ControllerNotes@matieres');
