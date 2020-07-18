<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

        // SAWAHCONTROLLER 
        Route::get('sawah', 'Api\SawahController@index'); // data sawah berdasarkan id yang login
        Route::post('sawah', 'Api\SawahController@store'); // mendaftarkan sawah berdasarkan id yang login
        Route::put('sawah/{id}', 'Api\SawahController@update'); //edit sawah berdasarkan id sawah (tidak bisa edit jika data terdapat di table lain)
        Route::delete('sawah/{id}', 'Api\SawahController@delete'); //hapus sawah berdasarkan id sawah
        // END SAWAHCONTROLLER

        Route::get('closed', 'DataController@closed');
    });
