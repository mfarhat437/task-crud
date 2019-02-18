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

Route::get('/all_users','apiUsers@index');
Route::get('/show_user/{id}','apiUsers@show');
Route::post('/add_user','apiUsers@store');
Route::put('/update_user/{id}','apiUsers@update');
Route::delete('/delete_user/{id}','apiUsers@destroy');

