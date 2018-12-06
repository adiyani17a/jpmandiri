<?php

namespace App\setting;

use Illuminate\Database\Eloquent\Model;
use Config;

class hak_akses extends Model
{
	protected $connection = 'mysql';
    protected $table = 's_hak_akses';
	protected $primaryKey = 'id';
	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';

	protected $fillable = ['id',
						   'dt',
						   'jabatan_id',
						   'daftar_menu',
						   'daftar_menu_id',
						   'aktif',
						   'tambah',
						   'ubah',
						   'hapus',
						   'cabang',
						   'global',
						   'print',
						   'validasi',
						   'updated_by',
						   'created_by'
						];

	public function jabatan()
    {
        return $this->belongsTo('App\setting\jabatan','jabatan_id','id');
    }

    public function daftar_menus()
    {
        return $this->belongsTo('App\setting\daftar_menu','daftar_menu','nama');
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

