<?php

namespace App\setting;

use Illuminate\Database\Eloquent\Model;

class daftar_menu extends Model
{
    protected $table = 's_daftar_menu';
	protected $primaryKey = 'id';
	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';

	protected $fillable = ['id',
						   'nama',
						   'slug',
						   'created_by',
						   'updated_by',
						   'group_menu_id'
						];

	public function hak_akses()
	{
        return $this->hasMany('App\setting\hak_akses','daftar_menu');
	}

	public function grup_menu()
    {
        return $this->belongsTo('App\setting\grup_menu','group_menu_id','id');
    }
}
