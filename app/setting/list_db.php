<?php

namespace App\setting;

use Illuminate\Database\Eloquent\Model;

class list_db extends Model
{
    protected $table = 's_connection';
	protected $primaryKey = 'id';
	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';

	protected $fillable = ['id',
						   'host',
						   'database',
						   'username',
						   'password',
						];

	public function user()
	{
        return $this->hasMany('App\User','connection_id');
	}
}
