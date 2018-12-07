<?php

namespace App\master;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Config;
class desa extends Model
{
	use SoftDeletes;
	protected $dates = ['deleted_at'];
    protected $connection = 'mysql';
    protected $table = 'm_desa';
	protected $primaryKey = 'id';
	

	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';

	protected $fillable = ['id',
						   'kecamatan_id',
						   'nama',
						   'created_by',
						   'updated_by',
						];

	public function kecamatan()
	{
        return $this->belongsTo('App\master\kecamatan','kecamatan_id','id');
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
