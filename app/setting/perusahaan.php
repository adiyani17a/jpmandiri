<?php

namespace App\setting;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Config;
class perusahaan extends Model
{
	use SoftDeletes;
	protected $connection = 'mysql';
    protected $table = 's_perusahaan';
	protected $primaryKey = 'id';
	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';

	protected $fillable = ['id',
						   'alamat',
						   'nama',
						   'kota',
						   'telepon',
						   'image',
						   'fax'
						];

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
