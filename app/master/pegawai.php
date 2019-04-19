<?php

namespace App\master;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Config;

class pegawai extends Model
{
    use SoftDeletes;
	protected $connection = 'mysql';
    protected $table = 'm_pegawai';
	protected $primaryKey = 'id';
	protected $dates = ['deleted_at'];
	
	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';

	protected $fillable = [
							'id',
							'nama',
							'nip',
							'bagian',
							'gelar_awal',
							'gelar_akhir',
							'panggilan',
							'jenis_kelamin',
							'tempat_lahir',
							'tanggal_lahir',
							'agama',
							'status_menikah',
							'nomor_identitas',
							'alamat',
							'telpon',
							'email',
							'foto',
							'keterangan',
							'pin',
							'created_at',
							'updated_at',
							'created_by',
							'updated_by',
							'deleted_at'
						];

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
