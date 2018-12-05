<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\setting\group_menu;
use App\setting\daftar_menu;
use App\setting\hak_akses;
use App\User;
use App\setting\jabatan;
use App\setting\cabang;
use App\setting\list_db;
use Config;
use DB;
use Auth;

class models extends Model
{
  	public function group_menu($name = null,$host = null,$database = null,$username = null,$password = null)
	{	
		if (Auth::check()) {
			$nama     = Auth::user()->list_db->database;
			$host     = Auth::user()->list_db->host;
			$database = Auth::user()->list_db->database;
			$username = Auth::user()->list_db->username;
			$password = Auth::user()->list_db->password;

			$group_menu = new group_menu();
			$group_menu->changeConnection($database,$host,$database,$username,$password);
			return $group_menu;
		}
	}

	public function daftar_menu($name = null,$host = null,$database = null,$username = null,$password = null)
	{	
		if (Auth::check()) {
			$nama     = Auth::user()->list_db->database;
			$host     = Auth::user()->list_db->host;
			$database = Auth::user()->list_db->database;
			$username = Auth::user()->list_db->username;
			$password = Auth::user()->list_db->password;

			$daftar_menu = new daftar_menu();
			$daftar_menu->changeConnection($database,$host,$database,$username,$password);
			return $daftar_menu;
		}
	}

	public function hak_akses($name = null,$host = null,$database = null,$username = null,$password = null)
	{	
		if (Auth::check()) {
			$nama     = Auth::user()->list_db->database;
			$host     = Auth::user()->list_db->host;
			$database = Auth::user()->list_db->database;
			$username = Auth::user()->list_db->username;
			$password = Auth::user()->list_db->password;

			$hak_akses = new hak_akses();
			$hak_akses->changeConnection($database,$host,$database,$username,$password);
			return $hak_akses;
		}
	}

	public function jabatan($name = null,$host = null,$database = null,$username = null,$password = null)
	{	
		if (Auth::check()) {
			$nama     = Auth::user()->list_db->database;
			$host     = Auth::user()->list_db->host;
			$database = Auth::user()->list_db->database;
			$username = Auth::user()->list_db->username;
			$password = Auth::user()->list_db->password;

			$jabatan = new jabatan();
			$jabatan->changeConnection($database,$host,$database,$username,$password);
			return $jabatan;
		}
	}

	public function cabang($name = null,$host = null,$database = null,$username = null,$password = null)
	{	
		if (Auth::check()) {
			$nama     = Auth::user()->list_db->database;
			$host     = Auth::user()->list_db->host;
			$database = Auth::user()->list_db->database;
			$username = Auth::user()->list_db->username;
			$password = Auth::user()->list_db->password;

			$cabang = new cabang();
			$cabang->changeConnection($database,$host,$database,$username,$password);
			return $cabang;
		}
	}

	public function list_db($name = null,$host = null,$database = null,$username = null,$password = null)
	{	
		if (Auth::check()) {
			$nama     = Auth::user()->list_db->database;
			$host     = Auth::user()->list_db->host;
			$database = Auth::user()->list_db->database;
			$username = Auth::user()->list_db->username;
			$password = Auth::user()->list_db->password;

			$list_db = new list_db();
			$list_db->changeConnection($database,$host,$database,$username,$password);
			return $list_db;
		}
	}
}
