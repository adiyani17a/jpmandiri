<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Config;
use App\models;
use App\basis_data;
use Auth;
class tesController extends Controller
{
	protected $db;
	protected $model;

	public function __construct()
	{
		$this->db = new basis_data; //name,hosts,database,username,password
		$this->model = new models;
	}
    public function tes()
    {
    	
    	$this->db->connect();

		return $data1 = DB::connection()->table('s_jabatan')->get();
    }
}
