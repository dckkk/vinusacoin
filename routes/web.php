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

// LARAVEL DEFAULT
// Route::get('/', function () {
//     return view('welcome');
// });

// setup lang
Route::get('lang/{lang}', ['uses'=>'LangController@switchLang']);

Route::middleware(['web', 'auth'])->group(function () {
	Route::get('/home', 'HomeController@index')->name('home');
});

Route::middleware(['web'])->group(function () {
	Auth::routes();
	Route::get('/', 'WebController@home');
	Route::get('/about', 'WebController@about');
	Route::get('/investment', 'WebController@investment');
});

// API
Route::get('/api/ethvns', 'ApiController@getEthVns');

