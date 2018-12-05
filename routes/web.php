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
	// SETTING UTILITY
		// CARI MENU
		Route::get('cari_menu', 'setting\settingController@cari_menu')->name('cari_menu');
		// SETTING GROUP MENU
		Route::get('setting/group_menu', 'setting\setting_controller@group_menu')->name('group_menu');
		Route::get('setting/datatable_group_menu', 'setting\setting_controller@datatable_group_menu')->name('datatable_group_menu');
		// SETTING DAFTAR MENU
		Route::get('setting/daftar_menu', 'setting\setting_controller@daftar_menu')->name('daftar_menu');
		// SETTING HAK AKSES
		Route::get('setting/hak_akses', 'setting\setting_controller@hak_akses')->name('hak_akses');
		// SETTING USER
		Route::get('setting/user', 'setting\setting_controller@user')->name('user');
		// SETTING JABATAN
		Route::get('setting/jabatan', 'setting\setting_controller@jabatan')->name('jabatan');
		// SETTING CABANG
		Route::get('setting/cabang', 'setting\setting_controller@cabang')->name('cabang');
		// SETTING DATABASE
		Route::get('setting/database', 'setting\setting_controller@database')->name('database');
	// SETTING KEUANGAN
		// SETTING TAMBAH PERIODE
		Route::get('setting/tambah_periode', 'setting\setting_controller@tambah_periode')->name('tambah_periode');
		// SETTING PERIODE
		Route::get('setting/periode', 'setting\setting_controller@periode')->name('periode');

		
		
});
