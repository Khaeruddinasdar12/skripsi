<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
	return view('welcome');
});

Auth::routes([
	'register' => false,
	'login' => false,
]);
Route::get('/pdf', 'HomeController@pdf');

Route::get('/admin/login', 'Admin\Auth\LoginController@showLoginForm')->name('admin.login');
Route::post('/admin/login', 'Admin\Auth\LoginController@login')->name('admin.login');
Route::post('/logout', 'LoginController@logout')->name('admin.logout');


Route::prefix('admin')->namespace('Admin')->group(function () {
	Route::get('/', 'DashboardController@index')->name('admin.home');

	// MENU LAPORAN
	Route::get('laporan', 'Laporan@index')->name('index.laporan');
	// END MENU LAPORAN

	// RUTE MENU BIBIT & TRANSAKSI BIBIT
	// 1. Menu Bibit
	Route::get('bibit', 'BibitController@index')->name('index.bibit'); //menampilkan hal. data bibit
	Route::post('bibit', 'BibitController@store')->name('store.bibit'); //menambah data bibit
	Route::put('bibit/{id}', 'BibitController@update')->name('update.bibit'); //mengubah data bibit
	Route::delete('bibit/{id}', 'BibitController@delete')->name('delete.bibit'); //menghapus data bibit

	// 2. Menu Transaksi Bibit
	Route::get('transaksi-bibit', 'TransaksiBibitController@index')->name('index.tbibit'); //menampilkan hal. data transaksi bibit
	Route::get('riwayat-transaksi-bibit', 'TransaksiBibitController@riwayat')->name('riwayat.tbibit'); //menampilkan hal. data riwayat transaksi gabah
	Route::put('transaksi-bibit-status/{id}', 'TransaksiBibitController@status')->name('status.tbibit'); // mengubah status pembelian bibit menjadi riwayat
	Route::post('transaksi-bibit-delete/{id}', 'TransaksiBibitController@delete')->name('delete.tbibit'); // menghapus data transaksi bibit
	Route::delete('transaksi-bibit-delete-riwayat/{id}', 'TransaksiBibitController@deleteBySuperadmin')->name('deleteriwayat.tbibit')->middleware('CekAdmin'); // menghapus data transaksi bibit (riwayat Transaksi by superadmin)
	// END RUTE MENU BIBIT & TRANSAKSI BIBIT


	// RUTE MENU PUPUK & TRANSAKSI PUPUK
	// 1. Menu Pupuk
	Route::get('pupuk', 'PupukController@index')->name('index.pupuk'); //menampilkan hal. data pupuk
	Route::post('pupuk', 'PupukController@store')->name('store.pupuk'); //menambah data pupuk
	Route::put('pupuk/{id}', 'PupukController@update')->name('update.pupuk'); //mengubah data pupuk
	Route::delete('pupuk/{id}', 'PupukController@delete')->name('delete.pupuk'); //menghapus data pupuk

	// 2. Menu Transaksi Pupuk
	Route::get('transaksi-pupuk', 'TransaksiPupukController@index')->name('index.tpupuk'); //menampilkan hal. data transaksi pupuk
	Route::get('riwayat-transaksi-pupuk', 'TransaksiPupukController@riwayat')->name('riwayat.tpupuk'); //menampilkan hal. data riwayat transaksi pupuk
	Route::put('transaksi-pupuk-status/{id}', 'TransaksiPupukController@status')->name('status.tpupuk'); // mengubah status pembelian pupuk menjadi riwayat
	Route::post('transaksi-pupuk-delete/{id}', 'TransaksiPupukController@delete')->name('delete.tpupuk'); // menghapus data transaksi pupuk
	Route::delete('transaksi-pupuk-delete-riwayat/{id}', 'TransaksiPupukController@deleteBySuperadmin')->name('deleteriwayat.tpupuk')->middleware('CekAdmin'); // menghapus data transaksi pupuk (riwayat Transaksi by superadmin)
	// END RUTE MENU PUPUK & TRANSAKSI PUPUK


	// RUTE MENU ALAT
	// 1. Menu Alat
	Route::get('alat', 'AlatController@index')->name('index.alat'); //menampilkan hal. data alat
	Route::post('alat', 'AlatController@store')->name('store.alat'); //menambah data alat
	Route::put('alat/{id}', 'AlatController@update')->name('update.alat'); //mengubah data alat
	Route::delete('alat/{id}', 'AlatController@delete')->name('delete.alat'); //menghapus data alat

	// 2. Menu Transaksi Alat
	Route::get('transaksi-alat', 'TransaksiAlatController@index')->name('index.talat'); //menampilkan hal. data transaksi
	Route::get('riwayat-transaksi-alat', 'TransaksiAlatController@riwayat')->name('riwayat.talat'); //menampilkan hal. data riwayat transaksi alat
	Route::put('transaksi-alat-status/{id}', 'TransaksiAlatController@status')->name('status.talat'); // mengubah status pembelian alat menjadi riwayat
	Route::post('transaksi-alat-delete/{id}', 'TransaksiAlatController@delete')->name('delete.talat'); // menghapus data transaksi alat belum verif
	Route::delete('transaksi-alat-delete-riwayat/{id}', 'TransaksiAlatController@deleteBySuperadmin')->name('deleteriwayat.talat')->middleware('CekAdmin'); // menghapus data transaksi alat (riwayat Transaksi by superadmin)
	// END RUTE MENU ALAT


	// RUTE MENU BERAS & TRANSAKSI BERAS
	// 1. Menu Beras
	Route::get('beras', 'BerasController@index')->name('index.beras'); //menampilkan hal. data beras
	Route::post('beras', 'BerasController@store')->name('store.beras'); //menambah data beras
	Route::put('beras/{id}', 'BerasController@update')->name('update.beras'); //mengubah atau suplly data beras
	Route::delete('beras/{id}', 'BerasController@delete')->name('delete.beras'); //menghapus data beras

	// 2. Menu Transaksi Beras dan Riwayat Transaksi Beras
	Route::get('transaksi-beras', 'TransaksiBerasController@index')->name('index.tberas'); //menampilkan hal. data transaksi beras
	Route::get('riwayat-transaksi-beras', 'TransaksiBerasController@riwayat')->name('riwayat.tberas'); //menampilkan hal. data riwayat transaksi beras
	Route::put('transaksi-beras-status/{id}', 'TransaksiBerasController@status')->name('status.tberas'); // mengubah status pembelian beras menjadi riwayat
	Route::post('transaksi-beras-delete/{id}', 'TransaksiBerasController@delete')->name('delete.tberas'); // menghapus data transaksi beras
	Route::delete('transaksi-beras-delete-riwayat/{id}', 'TransaksiBerasController@deleteBySuperadmin')->name('deleteriwayat.tberas')->middleware('CekAdmin'); // menghapus data transaksi beras (riwayat Transaksi by superadmin)
	// END RUTE MENU BERAS & TRANSAKSI BERAS


	// RUTE MENU GABAHKU & TRANSAKSI GABAHKU
	// 1. Menu Gabah
	Route::get('gabah', 'GabahController@index')->name('index.gabah'); //menampilkan hal. data gabah
	Route::post('gabah', 'GabahController@store')->name('store.gabah'); //menambah data gabah
	Route::put('gabah/{id}', 'GabahController@update')->name('update.gabah'); //mengubah data gabah
	Route::delete('gabah/{id}', 'GabahController@delete')->name('delete.gabah'); //menghapus data gabah

	// 2. Menu Transaksi Gabah
	Route::get('transaksi-gabah', 'TransaksiGabahController@index')->name('index.tgabah'); //menampilkan hal. data transaksi gabah
	Route::get('riwayat-transaksi-gabah', 'TransaksiGabahController@riwayat')->name('riwayat.tgabah'); //menampilkan hal. data riwayat transaksi gabah
	Route::put('transaksi-gabah-status/{id}', 'TransaksiGabahController@status')->name('status.tgabah'); // mengubah status pembelian gabah menjadi riwayat
	Route::delete('transaksi-gabah-delete/{id}', 'TransaksiGabahController@delete')->name('delete.tgabah'); // menghapus data transaksi gabah
	Route::post('transaksi-gabah-batal/{id}', 'TransaksiGabahController@batal')->name('batal.tgabah'); // menghapus transaksi gabah dan tampil batal di user (android)
	Route::delete('transaksi-gabah-delete-riwayat/{id}', 'TransaksiGabahController@deleteBySuperadmin')->name('deleteriwayat.tgabah')->middleware('CekAdmin'); // menghapus data transaksi gabah (riwayat Transaksi by superadmin)
	// END RUTE MENU GABAHKU & TRANSAKSI GABAHKU


	// RUTE MENU MODAL TANAM
	Route::get('modal-tanam-daftar-gadai', 'ModalTanamController@daftargadai')->name('daftar.modaltanam'); //menampilkan hal. data mendaftarkan sawah untuk digadai 
	Route::get('modal-tanam-sedang-gadai', 'ModalTanamController@sedanggadai')->name('sedang.modaltanam'); //menampilkan hal. data yang sedang menggadai sawahnya
	Route::get('modal-tanam-riwayat-gadai', 'ModalTanamController@riwayatgadai')->name('riwayat.modaltanam'); //menampilkan hal. data riwayat gadai sawah

	Route::put('modal-tanam-gadai-status/{id}', 'ModalTanamController@gadaistatus')->name('gadaistatus.modaltanam'); // mengubah "daftar gadai" menjadi "sedang gadai"
	Route::put('modal-tanam-selesai-status/{id}', 'ModalTanamController@selesaistatus')->name('selesaistatus.modaltanam'); // mengubah "sedang gadai" menjadi "riwayat gadai"
	Route::put('modal-tanam-edit-keterangan/{id}', 'ModalTanamController@editketerangan')->name('editketerangan.modaltanam'); // edit keterangan 

	Route::post('modal-tanam-hapus-gadai/{id}', 'ModalTanamController@delgadai')->name('delgadai.modaltanam'); // menghapus gadai yang gagal di survey 
	Route::delete('modal-tanam-hapus-riwayat/{id}', 'ModalTanamController@delriwayat')->name('delriwayat.modaltanam')->middleware('CekAdmin'); // menghapus riwayat gadai hanya superadmin, jika admin otomatis gagal 
	// END RUTE MENU MODAL TANAM


	// RUTE MENU GADAI SAWAH
	Route::get('gadai-sawah-daftar-gadai', 'GadaiSawahController@daftargadai')->name('daftar.gadaisawah'); //menampilkan hal. data mendaftarkan sawah untuk digadai 
	Route::get('gadai-sawah-sedang-gadai', 'GadaiSawahController@sedanggadai')->name('sedang.gadaisawah'); //menampilkan hal. data yang sedang menggadai sawahnya
	Route::get('gadai-sawah-riwayat-gadai', 'GadaiSawahController@riwayatgadai')->name('riwayat.gadaisawah'); //menampilkan hal. data riwayat gadai sawah

	Route::put('gadai-sawah-gadai-status/{id}', 'GadaiSawahController@gadaistatus')->name('gadaistatus.gadaisawah'); // mengubah "daftar gadai" menjadi "sedang gadai"
	Route::put('gadai-sawah-selesai-status/{id}', 'GadaiSawahController@selesaistatus')->name('selesaistatus.gadaisawah'); // mengubah "sedang gadai" menjadi "riwayat gadai"
	Route::put('gadai-sawah-edit-keterangan/{id}', 'GadaiSawahController@editketerangan')->name('editketerangan.gadaisawah'); // edit keterangan 

	Route::post('gadai-sawah-hapus-gadai/{id}', 'GadaiSawahController@delgadai')->name('delgadai.gadaisawah'); // menghapus gadai yang gagal di survey 
	Route::delete('gadai-sawah-hapus-riwayat/{id}', 'GadaiSawahController@delriwayat')->name('delriwayat.gadaisawah')->middleware('CekAdmin'); // menghapus riwayat gadai hanya superadmin, jika admin otomatis gagal 
	// END RUTE MENU GADAI SAWAH


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

	Route::delete('manage-user/delete/{id}', 'UserController@delete')->name('delete.manage-user'); // menghapus petani yang tidak terverifikasi
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
