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
    Route::get('beras', 'Api\BerasController@index'); //semua data gabah (no header)
    Route::get('tsawah', 'Api\SawahController@listsawah'); // data sawah berdasarkan id yang login

    Route::group(['middleware' => ['auth:api']], function() {
        Route::get('user', 'Api\UserController@detail');
        Route::post('edit-user', 'Api\UserController@update');

        // BERAS
        Route::post('beras-store/{id}', 'Api\BerasController@store');
        
        Route::get('transaksi-beras', 'Api\BerasController@transaksi');
        Route::get('riwayat-transaksi-beras', 'Api\BerasController@riwayat');
        Route::get('batal-transaksi-beras', 'Api\BerasController@batal');
        // END BERAS

        // GABAH
        Route::post('gabah-store/{id}', 'Api\GabahController@store');
        
        Route::get('transaksi-gabah', 'Api\GabahController@transaksi');
        Route::get('riwayat-transaksi-gabah', 'Api\GabahController@riwayat');
        Route::get('batal-transaksi-gabah', 'Api\GabahController@batal');
        // GABAH

        // SAWAH CONTROLLER 
        Route::get('sawah', 'Api\SawahController@index'); // data sawah berdasarkan id yang login
        Route::post('sawah', 'Api\SawahController@store'); // mendaftarkan sawah berdasarkan id yang login
        Route::post('edit-sawah/{id}', 'Api\SawahController@update'); //edit sawah berdasarkan id sawah (tidak bisa edit jika data terdapat di table lain)
        Route::post('delete-sawah/{id}', 'Api\SawahController@delete'); //hapus sawah berdasarkan id sawah
        // END SAWAH CONTROLLER

        // MODAL TANAM CONTROLLER
        Route::post('modal-tanam', 'Api\ModalTanamController@store'); // post mendaftarkan sawah untuk digadai modal tanam

        Route::get('list-sedang-gadai-modal-tanam', 'Api\ModalTanamController@gadai'); // list sawah yang sedang tergadai modal tanam oleh user id
        Route::get('list-daftar-modal-tanam', 'Api\ModalTanamController@daftargadai'); //list daftarkan sawah untuk modal tanam
        Route::get('list-riwayat-modal-tanam', 'Api\ModalTanamController@riwayatgadai'); //list sawah yang pernah digadai modal tanam
        Route::get('list-batal-modal-tanam', 'Api\ModalTanamController@batalgadai'); //list sawah yang dibatalkan digadai modal tanam
        // END MODAL TANAM CONTROLLER 

        // GADAI SAWAH CONTROLLER
        
        // END GADAI SAWAH CONTROLLER 


        // GADAI SAWAH
        Route::post('gadai-sawah', 'Api\GadaiSawahController@store'); // post mendaftarkan sawah untuk digadai

        Route::get('list-sedang-gadai-sawah', 'Api\GadaiSawahController@gadai'); // list sawah yang sedang tergadai oleh user id
        Route::get('list-daftar-gadai-sawah', 'Api\GadaiSawahController@daftargadai'); //list daftarkan sawah untuk digadai
        Route::get('list-riwayat-gadai-sawah', 'Api\GadaiSawahController@riwayatgadai'); //list sawah yang pernah digadai
        Route::get('list-batal-gadai-sawah', 'Api\GadaiSawahController@batalgadai'); //list sawah yang dibatalkan digadai
        // END GADAI SAWAH





    });
