<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('api')->group(function () {
    Route::get('/vnc_eth', 'ApiController@getVncEth');
    Route::get('/eth_vnc', 'ApiController@getEthVnc');
    Route::post('/convertVncEth', 'ApiController@convertVncEth');
    Route::post('/convertEthVnc', 'ApiController@convertEthVnc');
    Route::post('/deposit', 'ApiController@deposit');
    Route::post('/withdraw', 'ApiController@withdraw');
    Route::get('/withdraw/callback', 'ApiController@withdrawCallback');
    Route::post('/depositPlans', 'ApiController@depositPlans');
});
