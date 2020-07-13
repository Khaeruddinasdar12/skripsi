<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes([
	'register' => false,
	'login' => false,
]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin/login','Admin\Auth\LoginController@showLoginForm')->name('admin.login');
Route::post('/admin/login','Admin\Auth\LoginController@login')->name('admin.login');
Route::post('/logout','LoginController@logout')->name('admin.logout');


Route::prefix('admin')->namespace('Admin')->group(function(){
	Route::get('/','HomeController@index')->name('admin.home');

  	Route::namespace('Auth')->group(function() {
	      
	    //Login Routes
	    
	    Route::post('/login','LoginController@login');
	    Route::post('/logout','LoginController@logout')->name('admin.logout');

	    //Forgot Password Routes
	    Route::get('/password/reset','ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
	    Route::post('/password/email','ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');

	    //Reset Password Routes
	    Route::get('/password/reset/{token}','ResetPasswordController@showResetForm')->name('admin.password.reset');
	    Route::post('/password/reset','ResetPasswordController@reset')->name('admin.password.update');

	});
});


