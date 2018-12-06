<?php

namespace App\setting;

use Illuminate\Database\Eloquent\Model;
use Config;

class log_history extends Model
{
	protected $connection = 'mysql';
    protected $table = 's_log_history';
	protected $primaryKey = 'id';
	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';

	protected $fillable = ['id',
						   'ref',
						   'cabang_id',
						   'user_id',
						   'keterangan',
						   'table_name',
						   'created_by',
						   'updated_by',
						];

	public function cabang_id()
    {
        return $this->belongsTo('App\setting\cabang','cabang_id','id');
    }

    public function user_id()
    {
        return $this->belongsTo('App\user','user_id','id');
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
