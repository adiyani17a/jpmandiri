<?php

namespace App\setting;

use Illuminate\Database\Eloquent\Model;

class group_menu extends Model
{
	protected $connection = 'mysql';
    protected $table = 's_grup_menu';
	protected $primaryKey = 'id';
	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';

	protected $fillable = [
						   'id',
						   'nama',
						];

	public function daftar_menu()
	{
        return $this->hasMany('App\setting\daftar_menu','id');
	}

	public function changeConnection($name,$host,$database,$username,$password)
	{
		if ($name != null) {
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
	    	$this->connection = $name;
		}
	}
}
