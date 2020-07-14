<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
	
	Route::get('provinsi', 'Api\AlamatController@provinsi');
	Route::get('kabupaten/{id}', 'Api\AlamatController@kabupaten');
	Route::post('register', 'Api\UserController@register');
    Route::post('login', 'Api\UserController@authenticate');
    Route::get('open', 'DataController@open');

    Route::group(['middleware' => ['jwt.verify']], function() {
        Route::get('user', 'Api\UserController@getAuthenticatedUser');
        Route::get('closed', 'DataController@closed');
    });
