<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Config;

class basis_data extends Model
{
    public function connect($name,$host,$database,$username,$password)
    {
    	Config::set('database.connections.'.$name.'', array(
		    'driver'    => 'mysql',
		    'host'      => $host,
		    'database'  => $database,
		    'username'  => $username,
		    'password'  => $password,
		    'charset'   => 'utf8',
		    'collation' => 'utf8_unicode_ci',
		    'prefix'    => '',
		));
    }
}
