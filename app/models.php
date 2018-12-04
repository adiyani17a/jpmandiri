<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\setting\cabang;
use App\setting\daftar_menu;
use App\setting\group_menu;
use App\setting\hak_akses;
use App\setting\jabatan;
use App\setting\list_db;

class models extends Model
{
    public function cabang()
	{
		return $cabang = new cabang();
	}

	public function daftar_menu()
	{
		return $daftar_menu = new daftar_menu();
	}

	public function group_menu()
	{
		return $group_menu = new group_menu();
	}

	public function hak_akses()
	{
		return $hak_akses = new hak_akses();
	}

	public function list_db()
	{
		return $list_db = new list_db();
	}
}
