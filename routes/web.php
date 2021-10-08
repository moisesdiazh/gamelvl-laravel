<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/games', 'GameController@index')->name('juegos.index');
Route::get('/games/create', 'GameController@create')->name('juegos.create');
Route::post('/games', 'GameController@store')->name('juegos.store');

Route::get('/games/{game}/edit', 'GameController@edit')->name('juegos.edit');
Route::put('/games/{game}', 'GameController@update')->name('juegos.update');

Route::delete('/games/{game}', 'GameController@destroy')->name('juegos.destroy');







Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
