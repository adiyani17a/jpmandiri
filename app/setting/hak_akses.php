<?php

namespace App\setting;

use Illuminate\Database\Eloquent\Model;

class hak_akses extends Model
{
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
}










	FROM s_hak_akses