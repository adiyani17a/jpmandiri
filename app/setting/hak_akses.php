<?php

namespace App\setting;

use Illuminate\Database\Eloquent\Model;

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

	public function list_db()
    {
        return $this->belongsTo('App\setting\jabatan','jabatan_id','id');
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

