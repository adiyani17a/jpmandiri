<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;
use Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $fillable = [
        'id',
        'username',
        'name',
        'address',
        'birth_date',
        'email',
        'email_verified_at',
        'password',
        'remember_token',
        'jabatan_id',
        'image',
        'cabang_id',
        'last_login',
        'last_db',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function jabatan($value='')
    {
        return $this->belongsTo('App\setting\jabatan','jabatan_id','id');
    }

    public function cabang($value='')
    {
        return $this->belongsTo('App\setting\cabang','cabang_id','id');
    }

    public function akses($fitur,$aksi){
      // select * from  join  on = where ubah =true

        $cek = User::join('s_hak_akses', 'users.jabatan_id', '=', 's_hak_akses.jabatan_id')
                           ->where('daftar_menu', '=', $fitur)
                           ->where($aksi, '=', 1) 
                           ->where('users.id', '=', Auth::user()->id)             
                           ->get();  


        if(count($cek) != 0)
            return true;
        else
            return false;
    }
}
