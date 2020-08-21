<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

$api = app('Dingo\Api\Routing\Router');
$api->version('v1', function($api) {
    $api->get('test', function() {
         return 1;
    });
});
	Route::get('provinsi', 'Api\AlamatController@provinsi');
	Route::get('kabupaten/{id}', 'Api\AlamatController@kabupaten');
	Route::post('register', 'Api\UserController@register');
    Route::post('login', 'Api\UserController@login');
    
    Route::get('gabah-all', 'Api\GabahController@index'); //semua data gabah (no header)

    Route::group(['middleware' => ['auth:api']], function() {
        Route::get('user', 'Api\UserController@detail');
        Route::post('edit-user', 'Api\UserController@update');

        // GABAH
        Route::post('gabah-store/{id}', 'Api\GabahController@store');
        
        Route::get('transaksi-gabah', 'Api\GabahController@transaksi');
        Route::get('riwayat-transaksi-gabah', 'Api\GabahController@riwayat');
        Route::get('batal-transaksi-gabah', 'Api\GabahController@batal');
        // GABAH

        // SAWAHCONTROLLER 
        Route::get('sawah', 'Api\SawahController@index'); // data sawah berdasarkan id yang login
        Route::post('sawah', 'Api\SawahController@store'); // mendaftarkan sawah berdasarkan id yang login
        Route::post('edit-sawah/{id}', 'Api\SawahController@update'); //edit sawah berdasarkan id sawah (tidak bisa edit jika data terdapat di table lain)
        Route::post('delete-sawah/{id}', 'Api\SawahController@delete'); //hapus sawah berdasarkan id sawah
        // END SAWAHCONTROLLER


        // GADAI SAWAH
        Route::get('gadai-sawah', 'Api\GadaiSawahController@index');
        Route::post('gadai-sawah', 'Api\GadaiSawahController@store');
        // END GADAI SAWAH



    });
