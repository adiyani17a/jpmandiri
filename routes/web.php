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
		Route::get('setting/edit_group_menu', 'setting\setting_controller@edit_group_menu')->name('edit_group_menu');
		Route::get('setting/datatable_group_menu', 'setting\setting_controller@datatable_group_menu')->name('datatable_group_menu');
		Route::post('setting/simpan_group_menu', 'setting\setting_controller@simpan_group_menu')->name('simpan_group_menu');
		Route::get('setting/hapus_group_menu', 'setting\setting_controller@hapus_group_menu')->name('hapus_group_menu');
		// SETTING DAFTAR MENU
		Route::get('setting/daftar_menu', 'setting\setting_controller@daftar_menu')->name('daftar_menu');
		Route::get('setting/edit_daftar_menu', 'setting\setting_controller@edit_daftar_menu')->name('edit_daftar_menu');
		Route::get('setting/datatable_daftar_menu', 'setting\setting_controller@datatable_daftar_menu')->name('datatable_daftar_menu');
		Route::post('setting/simpan_daftar_menu', 'setting\setting_controller@simpan_daftar_menu')->name('simpan_daftar_menu');
		Route::get('setting/hapus_daftar_menu', 'setting\setting_controller@hapus_daftar_menu')->name('hapus_daftar_menu');
		// SETTING HAK AKSES
		Route::get('setting/hak_akses', 'setting\setting_controller@hak_akses')->name('hak_akses');
		Route::get('setting/hak_akses/hak_akses_data', 'setting\setting_controller@hak_akses_data')->name('hak_akses_data');
		Route::get('setting/hak_akses/centang', 'setting\setting_controller@centang')->name('centang');
		// SETTING USER
		Route::get('setting/user', 'setting\setting_controller@user')->name('user');
		// SETTING JABATAN
		Route::get('setting/jabatan', 'setting\setting_controller@jabatan')->name('jabatan');
		Route::get('setting/edit_jabatan', 'setting\setting_controller@edit_jabatan')->name('edit_jabatan');
		Route::get('setting/datatable_jabatan', 'setting\setting_controller@datatable_jabatan')->name('datatable_jabatan');
		Route::post('setting/simpan_jabatan', 'setting\setting_controller@simpan_jabatan')->name('simpan_jabatan');
		Route::get('setting/hapus_jabatan', 'setting\setting_controller@hapus_jabatan')->name('hapus_jabatan');
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
