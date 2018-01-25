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

Route::get('/consultation/{id_User}', 'notes@consultation');
Route::get('/ajout/{id_User}', 'notes@ajout');
Route::get('/suppression/{id_Note}', 'notes@suppression');
Route::get('/modfication/{id_Note}', 'notes@modfication');
