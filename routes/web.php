<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/welcome','userController@index');
Route::get('/register','userController@create')->name('register');

Route::get('/store','userController@store');
Route::post('/store','userController@store')->name('store');

Route::get('/edit/{id}','userController@edit')->name('edit');

Route::get('/update/{id}','userController@update')->name('update');
Route::put('/update/{id}','userController@update')->name('update');

Route::get('/delete/{id}','userController@destroy')->name('delete');
Route::delete('/delete/{id}','userController@destroy')->name('delete');
