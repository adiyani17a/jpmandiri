<?php

namespace App\setting;

use Illuminate\Database\Eloquent\Model;
use Config;
class cabang extends Model
{
	protected $connection = 'mysql';
    protected $table = 's_cabang';
	protected $primaryKey = 'id';
	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';

	protected $fillable = ['id',
						   'kode',
						   'nama',
						   'alamat',
						   'telpon',
						   'fax',
						   'kota_id',
						   'created_by',
						   'updated_by'
						];

	public function user()
	{
        return $this->hasMany('App\User','cabang_id');
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
