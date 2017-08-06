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



Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'Board\BoardController@index');
Route::get('/create', 'Board\BoardController@create');
Route::post('/store', 'Board\BoardController@store');
Route::get('/{id}', 'Board\BoardController@show');
Route::post('/delete/{id}', 'Board\BoardController@delete');
Route::get('/edit/{id}', 'Board\BoardController@edit');
Route::post('/update/{id}', 'Board\BoardController@update');


