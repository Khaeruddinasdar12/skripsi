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
	Route::get('gabah', 'GabahController@store')->name('store.gabah'); //menambah data gabah

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
	Route::get('gadai-sawah-daftar-gadai', 'GadaiSawahController@daftargadai')->name('daftar.gadaisawah'); //menampilkan hal. data mendaftarkan sawah untuk digadai 
	Route::get('gadai-sawah-sedang-gadai', 'GadaiSawahController@sedanggadai')->name('sedang.gadaisawah'); //menampilkan hal. data yang sedang menggadai sawahnya
	Route::get('gadai-sawah-riwayat-gadai', 'GadaiSawahController@riwayatgadai')->name('riwayat.gadaisawah'); //menampilkan hal. data riwayat gadai sawah

	Route::put('gadai-sawah-gadai-status/{id}', 'GadaiSawahController@gadaistatus')->name('gadaistatus.gadaisawah'); // mengubah "daftar gadai" menjadi "sedang gadai"
	Route::put('gadai-sawah-selesai-status/{id}', 'GadaiSawahController@selesaistatus')->name('selesaistatus.gadaisawah'); // mengubah "sedang gadai" menjadi "riwayat gadai"
	Route::put('gadai-sawah-edit-keterangan/{id}', 'GadaiSawahController@editketerangan')->name('editketerangan.gadaisawah'); // edit keterangan 

	Route::delete('gadai-sawah-hapus-gadai/{id}', 'GadaiSawahController@delgadai')->name('delgadai.gadaisawah'); // menghapus gadai yang gagal di survey 
	Route::delete('gadai-sawah-hapus-riwayat/{id}', 'GadaiSawahController@delriwayat')->name('delriwayat.gadaisawah')->middleware('CekAdmin'); // menghapus riwayat gadai hanya superadmin, jika admin otomatis gagal 
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

	Route::post('manage-admin', 'AdminController@store')->name('store.manage-admin')->middleware('CekAdmin'); // // input data admin, hanya untuk superadmin, jika admin otomatis gagal
	Route::put('manage-admin/{id}', 'AdminController@update')->name('update.manage-admin')->middleware('CekAdmin'); // // edit data admin, hanya untuk superadmin, jika admin otomatis gagal
	Route::delete('manage-admin/{id}', 'AdminController@delete')->name('delete.manage-admin')->middleware('CekAdmin'); // // delete data admin, hanya untuk superadmin, jika admin otomatis gagal
	// END RUTE MANAGE ADMIN


	// RUTE MENU MANAGE USER
	Route::get('manage-user-konsumen', 'UserController@konsumen')->name('konsumen.manage-user'); //menampilkan hal. data user konsumen
	Route::get('manage-user-petani-verified', 'UserController@verified')->name('verified.manage-user'); //menampilkan hal. data user petani terverifikasi
	Route::get('manage-user-petani-unverified', 'UserController@unverified')->name('unverified.manage-user'); //menampilkan hal. data user petani belum terverifikasi

	Route::put('manage-user/verified/{id}', 'UserController@buttonverified')->name('buttonverified.manage-user'); // rute untuk verified user
	Route::put('manage-user/edit/{id}', 'UserController@update')->name('edit.manage-user')->middleware('CekAdmin'); // rute untuk edit user, hanya untuk superadmin, jika admin otomatis gagal
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
