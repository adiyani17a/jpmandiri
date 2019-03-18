<?php

namespace App\setting;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Config;

class daftar_menu extends Model
{
	use SoftDeletes;
	protected $dates = ['deleted_at'];
	protected $connection = 'mysql';
    protected $table = 's_daftar_menu';
	protected $primaryKey = 'id';
	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';

	protected $fillable = ['id',
						   'nama',
						   'url',
						   'created_by',
						   'updated_by',
						   'group_menu_id'
						];

	public function hak_akses()
	{
    	return $this->hasMany('App\setting\hak_akses','daftar_menu');
	}

	public function group_menu()
    {
        return $this->belongsTo('App\setting\group_menu','group_menu_id','id');
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
