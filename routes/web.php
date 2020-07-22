<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
	return view('welcome');
});

Auth::routes([
	'register' => false,
	'login' => false,
]);

Route::get('/admin/login', 'Admin\Auth\LoginController@showLoginForm')->name('admin.login');
Route::post('/admin/login', 'Admin\Auth\LoginController@login')->name('admin.login');
Route::post('/logout', 'LoginController@logout')->name('admin.logout');


Route::prefix('admin')->namespace('Admin')->group(function () {
	Route::get('/', 'HomeController@index')->name('admin.home');

	// RUTE MENU GABAHKU & TRANSAKSI GABAHKU
	Route::get('gabah', 'GabahController@index')->name('index.gabah'); //menampilkan hal. data gabah
	Route::get('transaksi-gabah', 'GabahController@transaksi')->name('transaksi.gabah'); //menampilkan hal. data transaksi gabah
	// END RUTE MENU GABAHKU & TRANSAKSI GABAHKU


	// RUTE MENU BERAS & TRANSAKSI BERAS
	Route::get('beras', 'BerasController@index')->name('index.beras'); //menampilkan hal. data beras
	Route::get('transaksi-beras', 'BerasController@transaksi')->name('transaksi.beras'); //menampilkan hal. data transaksi beras
	// END RUTE MENU BERAS & TRANSAKSI BERAS


	// RUTE MENU MODAL TANAM
	Route::get('modal-tanam', 'ModalTanamController@index')->name('index.modaltanam'); //menampilkan hal. data modal tanam
	// END RUTE MENU MODAL TANAM


	// RUTE MENU GADAI SAWAH
	Route::get('gadai-sawah', 'GadaiSawahController@index')->name('index.gadaisawah'); //menampilkan hal. data gadai sawah
	// END RUTE MENU GADAI SAWAH


	// RUTE MENU ALAT
	Route::get('alat', 'AlatController@index')->name('index.alat'); //menampilkan hal. data alat
	Route::get('alat/transaksi-sewa', 'AlatController@sewa')->name('sewa.alat'); //menampilkan hal. data transaksi sewa alat
	Route::get('alat/transaksi-beli', 'AlatController@beli')->name('beli.beras'); //menampilkan hal. data transaksi beli alat
	// END RUTE MENU ALAT


	// RUTE MENU BIBIT PUPUK
	Route::get('bibit-pupuk', 'BibitPupukController@index')->name('index.bibit-pupuk'); //menampilkan hal. data bibit-pupuk
	Route::get('transaksi-bibit-pupuk', 'AlatController@sewa')->name('transaksi.bibit-pupuk'); //menampilkan hal. data transaksi bibit-pupuk
	// END RUTE BIBIT PUPUK


	// RUTE MENU MANAGE ADMIN
	Route::get('manage-admin', 'AdminController@index')->name('index.manage-admin'); //menampilkan hal. data admin
	// END RUTE MANAGE ADMIN


	// RUTE MENU MANAGE USER
	Route::get('manage-user', 'UserController@index')->name('index.manage-user'); //menampilkan hal. data user
	Route::put('manage-user/{id}', 'UserController@verified')->name('verified.manage-user');
	Route::put('manage-user/{id}', 'UserController@verified')->name('edit.manage-user')->middleware('CekAdmin'); //rute ini hanya untuk superadmin, jika admin otomatis gagal
	// END RUTE MANAGE USER

	Route::namespace('Auth')->group(function () {


		//Login Routes

		Route::post('/login', 'LoginController@login');
		Route::post('/logout', 'LoginController@logout')->name('admin.logout');

		//Forgot Password Routes
		Route::get('/password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
		Route::post('/password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');

		//Reset Password Routes
		Route::get('/password/reset/{token}', 'ResetPasswordController@showResetForm')->name('admin.password.reset');
		Route::post('/password/reset', 'ResetPasswordController@reset')->name('admin.password.update');
	});
});
