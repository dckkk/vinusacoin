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
	Route::get('/deposit', 'HomeController@deposit')->name('home');
	Route::get('/client-investment', 'HomeController@invest');
	Route::get('/deposit/{a}', 'HomeController@depositRegister');
	Route::get('/reward', 'HomeController@reward');
	Route::get('/loading', 'HomeController@loading');
});

Route::middleware(['web'])->group(function () {
	Auth::routes();
	Route::get('/', 'WebController@home');
	Route::get('/about', 'WebController@about');
	Route::get('/contact', 'WebController@contact')->name('contact');
	Route::get('/investment', 'WebController@investment');
	Route::post('send', 'EmailController@send')->name('send');
});
