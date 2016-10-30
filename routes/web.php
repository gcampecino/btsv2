<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/bus-search', 'BusSearchController@index');
Route::get('/bus', 'Admin\BusController@index');
Route::get('/bus/create', 'Admin\BusController@create');
Route::post('/bus/store', 'Admin\BusController@store');
Route::get('/bus/show/{id}', 'Admin\BusController@show');
Route::post('/bus/update/{id}', 'Admin\BusController@update');
Route::post('/bus-schedule/store', 'Admin\BusScheduleController@store');
