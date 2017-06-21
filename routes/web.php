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
Route::get('alphabet', 'FilmoviController@alphabet');
//Route::get('alphabet', array('uses' => 'FilmoviController@alphabet'));
Route::get('/', function () {
    return view('index');
});
Route::get('/kolekcija', function () {
    return view('index');
});
Route::resource('filmovi',   'FilmoviController');
Route::resource('zanr',   'ZanrController');