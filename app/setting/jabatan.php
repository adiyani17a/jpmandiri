<?php

namespace App\setting;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Config;
class jabatan extends Model
{
	use SoftDeletes;
	protected $dates = ['deleted_at'];
	protected $connection = 'mysql';
    protected $table = 's_jabatan';
	protected $primaryKey = 'id';
	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';

	protected $fillable = ['id',
						   'nama',
						   'keterangan',
						   'created_by',
						   'updated_by',
						];

	public function user()
	{
        return $this->hasMany('App\User','jabatan_id');
	}

	public function hak_akses()
	{
        return $this->hasMany('App\setting\hak_akses','jabatan_id');
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
