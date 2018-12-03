<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\setting\jabatan;
use App\setting\cabang;

class models extends Model
{
    public function jabatan()
	{
		return $jabatan = new jabatan();
	}
}
