<?php

namespace App\setting;

use Illuminate\Database\Eloquent\Model;
use Config;

class chat extends Model
{
	protected $connection = 'mysql';
    protected $table = 's_chat_log';
	protected $primaryKey = 'id';
	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';

	protected $fillable = ['id',
						   'chat',
						   'user_id',
						];

	public function user()
    {
        return $this->belongsTo('App\setting\user','user_id','id');
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
