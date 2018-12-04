<?php

namespace App\setting;

use Illuminate\Database\Eloquent\Model;

class chat extends Model
{
    protected $table = 's_chat_log';
	protected $primaryKey = 'id';
	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';

	protected $fillable = ['id',
						   'chat',
						   'user_id',
						];

	public function user()
    {
        return $this->belongsTo('App\setting\user','user_id','id');
    }

}
