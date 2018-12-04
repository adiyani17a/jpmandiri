<?php

namespace App\setting;

use Illuminate\Database\Eloquent\Model;

class cabang extends Model
{
    protected $table = 's_cabang';
	protected $primaryKey = 'id';
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

}
