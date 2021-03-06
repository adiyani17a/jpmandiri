<?php

namespace App\setting;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Config;
class cabang extends Model
{
	use SoftDeletes;
	protected $connection = 'mysql';
    protected $table = 's_cabang';
	protected $primaryKey = 'id';
	protected $dates = ['deleted_at'];
	
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

	public function kota()
	{
        return $this->belongsTo('App\master\kota','kota_id','id');
	}

	public function create()
	{
        return $this->belongsTo('App\user','created_by','id');
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
