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


Route::get('/adminLTE', function(){
	return view('admin/dashboard', [
		"page_title" => "Dashboard",
		"header" => [
			"images_user2" => "/images/img/user2-160x160.jpg",
			"images_user3" => "/images/img/user3-128x128.jpg",
			"images_user4" => "/images/img/user4-128x128.jpg",
			"images_user5" => "/images/img/user5-128x128.jpg",
			"images_user6" => "/images/img/user6-128x128.jpg",
			"images_user7" => "/images/img/user7-128x128.jpg",
			"images_user8" => "/images/img/user8-128x128.jpg"
		],
		"images_user2" => "/images/img/user2-160x160.jpg",
		"images_user3" => "/images/img/user3-128x128.jpg",
		"images_user4" => "/images/img/user4-128x128.jpg",
		"images_user5" => "/images/img/user5-128x128.jpg",
		"images_user6" => "/images/img/user6-128x128.jpg",
		"images_user7" => "/images/img/user7-128x128.jpg",
		"images_user8" => "/images/img/user8-128x128.jpg"
	]);
});