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

function agama() {
  return DB::table('m_agama')->get();
}

