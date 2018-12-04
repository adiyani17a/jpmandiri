<?php


function connect($name)
{
	Config::set('database.connections.'.$name.'', array(
    'driver'    => 'mysql',
    'host'      => Auth::user()->list_db->host,
    'database'  => Auth::user()->list_db->database,
    'username'  => Auth::user()->list_db->username,
    'password'  => Auth::user()->list_db->password,
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
	));
}

function get_menu() {
  return $user = DB::table('s_daftar_menu')->get();
}

function log_history($ref,$keterangan)
{
	$db = Auth::user()->list_db->nama;
	$this->connect();

	$id = DB::connection()->table('s_log_history')+1;

	$save = DB::connection()->table('s_log_history')
			  ->insert([
				  				'id'		 => $id,
								'ref'		 => $ref,
								'cabang_id'	 => Auth::user()->cabang_id,
								'user_id'	 => Auth::user()->id,
								'keterangan' => $keterangan,
								'created_by' => Auth::user()->name,
								'updated_by' => Auth::user()->name,
			  		   ]);
}