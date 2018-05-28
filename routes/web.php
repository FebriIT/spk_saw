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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/kriteria', 'KriteriaController@index')->name('kriteria');
Route::get('/kriteria/tambah', 'KriteriaController@create')->name('kriteria.tambah');
Route::post('/kriteria/tambah', 'KriteriaController@store')->name('kriteria.simpan');