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

Auth::routes();
Route::get('/', 'WebController@home')->middleware('web');
Route::get('/about', 'WebController@about')->middleware('web');
Route::get('/investment', 'WebController@investment')->middleware('web');

Route::get('lang/{lang}', ['uses'=>'LangController@switchLang']);

Route::prefix('admin')->group(function () {
	Route::get('/', function(){
		return 'admin';
	});

    Route::get('users', function () {
        // Matches The "/admin/users" URL
        return 'bosq';
    });
});

Route::get('/home', 'HomeController@index')->name('home');
