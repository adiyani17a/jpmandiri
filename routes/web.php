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
		// SETTING DATABASE
		Route::get('setting/database', 'setting\setting_controller@database')->name('database');
		// setting PERUSAHAAN
		Route::get('setting/perusahaan', 'setting\setting_controller@perusahaan')->name('perusahaan');
		Route::get('setting/edit_perusahaan', 'setting\setting_controller@edit_perusahaan')->name('edit_perusahaan');
		Route::get('setting/datatable_perusahaan', 'setting\setting_controller@datatable_perusahaan')->name('datatable_perusahaan');
		Route::post('setting/simpan_perusahaan', 'setting\setting_controller@simpan_perusahaan')->name('simpan_perusahaan');
		Route::get('setting/hapus_perusahaan', 'setting\setting_controller@hapus_perusahaan')->name('hapus_perusahaan');
	// SETTING KEUANGAN
		// SETTING TAMBAH PERIODE
		Route::get('setting/tambah_periode', 'setting\setting_controller@tambah_periode')->name('tambah_periode');
		// SETTING PERIODE
		Route::get('setting/periode', 'setting\setting_controller@periode')->name('periode');


	// MASTER BERSAMA
		// MASTER PROVINSI
		Route::get('master/provinsi', 'master\master_bersama_controller@provinsi')->name('provinsi');
		Route::get('master/provinsi/edit', 'master\master_bersama_controller@edit_provinsi')->name('edit_provinsi');
		Route::get('master/provinsi/datatable', 'master\master_bersama_controller@datatable_provinsi')->name('datatable_provinsi');
		Route::post('master/provinsi/simpan', 'master\master_bersama_controller@simpan_provinsi')->name('simpan_provinsi');
		Route::get('master/provinsi/hapus', 'master\master_bersama_controller@hapus_provinsi')->name('hapus_provinsi');
		// MASTER KOTA
		Route::get('master/kota', 'master\master_bersama_controller@kota')->name('kota');
		Route::get('master/kota/edit', 'master\master_bersama_controller@edit_kota')->name('edit_kota');
		Route::get('master/kota/datatable', 'master\master_bersama_controller@datatable_kota')->name('datatable_kota');
		Route::post('master/kota/simpan', 'master\master_bersama_controller@simpan_kota')->name('simpan_kota');
		Route::get('master/kota/hapus', 'master\master_bersama_controller@hapus_kota')->name('hapus_kota');
		// MASTER KECAMATAN
		Route::get('master/kecamatan', 'master\master_bersama_controller@kecamatan')->name('kecamatan');
		Route::get('master/kecamatan/edit', 'master\master_bersama_controller@edit_kecamatan')->name('edit_kecamatan');
		Route::get('master/kecamatan/datatable', 'master\master_bersama_controller@datatable_kecamatan')->name('datatable_kecamatan');
		Route::post('master/kecamatan/simpan', 'master\master_bersama_controller@simpan_kecamatan')->name('simpan_kecamatan');
		Route::get('master/kecamatan/hapus', 'master\master_bersama_controller@hapus_kecamatan')->name('hapus_kecamatan');
		// MASTER DESA
		Route::get('master/desa', 'master\master_bersama_controller@desa')->name('desa');
		Route::get('master/desa/edit', 'master\master_bersama_controller@edit_desa')->name('edit_desa');
		Route::post('master/desa/simpan', 'master\master_bersama_controller@simpan_desa')->name('simpan_desa');
		Route::get('master/desa/hapus', 'master\master_bersama_controller@hapus_desa')->name('hapus_desa');
		// MASTER CABANG
		Route::get('master/cabang', 'master\master_bersama_controller@cabang')->name('cabang');
		Route::get('master/cabang/edit', 'master\master_bersama_controller@edit_cabang')->name('edit_cabang');
		Route::get('master/cabang/datatable', 'master\master_bersama_controller@datatable_cabang')->name('datatable_cabang');
		Route::post('master/cabang/simpan', 'master\master_bersama_controller@simpan_cabang')->name('simpan_cabang');
		Route::get('master/cabang/hapus', 'master\master_bersama_controller@hapus_cabang')->name('hapus_cabang');
		// MASTER PEGAWAI
		Route::get('master/pegawai', 'master\master_bersama_controller@pegawai')->name('pegawai');
		Route::get('master/pegawai/edit', 'master\master_bersama_controller@edit_pegawai')->name('edit_pegawai');
		Route::get('master/pegawai/datatable', 'master\master_bersama_controller@datatable_pegawai')->name('datatable_pegawai');
		Route::post('master/pegawai/simpan', 'master\master_bersama_controller@simpan_pegawai')->name('simpan_pegawai');
		Route::get('master/pegawai/hapus', 'master\master_bersama_controller@hapus_pegawai')->name('hapus_pegawai');
		Route::get('master/pegawai/cetak', 'master\master_bersama_controller@cetak_pegawai')->name('cetak_pegawai');
		Route::get('master/pegawai/ubah_status', 'master\master_bersama_controller@ubah_status_pegawai')->name('ubah_status_pegawai');

	// MASTER AKUNTANSI
		// MASTER GROUP AKUN
		Route::get('master_akuntansi/group_akun', 'master\master_akuntansi_controller@group_akun')->name('group_akun');
		Route::get('master_akuntansi/edit_group_akun', 'master\master_akuntansi_controller@edit_group_akun')->name('edit_group_akun');
		Route::get('master_akuntansi/datatable_group_akun', 'master\master_akuntansi_controller@datatable_group_akun')->name('datatable_group_akun');
		Route::post('master_akuntansi/simpan_group_akun', 'master\master_akuntansi_controller@simpan_group_akun')->name('simpan_group_akun');
		Route::get('master_akuntansi/hapus_group_akun', 'master\master_akuntansi_controller@hapus_group_akun')->name('hapus_group_akun');
		// MASTER AKUN
		Route::get('master_akuntansi/akun', 'master\master_akuntansi_controller@akun')->name('akun');
		Route::get('master_akuntansi/edit_akun', 'master\master_akuntansi_controller@edit_akun')->name('edit_akun');
		Route::get('master_akuntansi/datatable_akun', 'master\master_akuntansi_controller@datatable_akun')->name('datatable_akun');
		Route::post('master_akuntansi/simpan_akun', 'master\master_akuntansi_controller@simpan_akun')->name('simpan_akun');
		Route::get('master_akuntansi/hapus_akun', 'master\master_akuntansi_controller@hapus_akun')->name('hapus_akun');
		
		
});
