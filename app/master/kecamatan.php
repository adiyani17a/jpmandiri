<?php

namespace App\master;

use Illuminate\Database\Eloquent\Model;
use Config;
class kecamatan extends Model
{
    protected $connection = 'mysql';
    protected $table = 'm_kecamatan';
	protected $primaryKey = 'id';
	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';

	protected $fillable = ['id',
						   'kota_id',
						   'nama',
						   'created_by',
						   'updated_by',
						];

	public function kota()
	{
        return $this->belongsTo('App\master\kota','kota_id','id');
	}

	public function desa()
	{
        return $this->hasMany('App\master\desa','kecamatan_id');
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
