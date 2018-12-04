<?php

namespace App\setting;

use Illuminate\Database\Eloquent\Model;

class log_history extends Model
{
    protected $table = 's_log_history';
	protected $primaryKey = 'id';
	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';

	protected $fillable = ['id',
						   'ref',
						   'cabang_id',
						   'user_id',
						   'keterangan',
						   'created_by',
						   'updated_by',
						];

	public function cabang_id()
    {
        return $this->belongsTo('App\setting\cabang','cabang_id','id');
    }

    public function user_id()
    {
        return $this->belongsTo('App\user','user_id','id');
    }
}
