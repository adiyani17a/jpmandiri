<?php

namespace App\setting;

use Illuminate\Database\Eloquent\Model;

class jabatan extends Model
{
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
}
