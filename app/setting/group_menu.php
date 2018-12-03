<?php

namespace App\setting;

use Illuminate\Database\Eloquent\Model;

class group_menu extends Model
{
    protected $table = 's_grup_menu';
	protected $primaryKey = 'id';
	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';

	protected $fillable = [
						   'id',
						   'nama',
						];

	public function daftar_menu()
	{
        return $this->hasMany('App\setting\daftar_menu','id');
	}
}
