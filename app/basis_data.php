<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Config;
use Auth;
class basis_data extends Model
{
    public function connect()
	{
		$name = Auth::user()->list_db->database;
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
}
