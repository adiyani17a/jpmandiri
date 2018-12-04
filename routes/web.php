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

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
	Route::get('/', 'HomeController@index')->name('home');
	Route::get('home', 'HomeController@index');
	Route::get('tes', 'tesController@tes')->name('tes');

	// SETTING
		// CARI MENU
		Route::get('cari_menu', 'setting/settingController@cari_menu')->name('cari_menu');
});