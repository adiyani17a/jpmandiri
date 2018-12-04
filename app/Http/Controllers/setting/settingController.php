<?php

namespace App\Http\Controllers\setting;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Config;
use App\models;
use App\basis_data;
use Auth;

class settingController extends Controller
{
	
	
	public function __construct()
	{
		$this->db = new basis_data; //name,hosts,database,username,password
		$this->model = new models;
	}

    public function cari_menu(Request $req)
    {
    	$this->model->
    }
}
