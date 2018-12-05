<?php

namespace App\Http\Controllers\setting;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use App\models;
use Exception;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Hash;
use Response;
use Session;
use Yajra\Datatables\Datatables;
use Jenssegers\Date\Date;
use App\setting\jabatan;
class setting_controller extends Controller
{
	protected $db;
	protected $model;
	protected $tes;

 	public function __construct()
	{
		$this->model = new models;
		Date::setLocale('id');
		$additionalData = [];

	}

	// CARI MENU
	public function cari_menu()
	{
		# code...
	}

	// GROUP MENU
	public function group_menu()
	{
		if (Auth::check()) {
			$tes = $this->model->jabatan();
			return view('setting.group_menu.group_menu');
		}
	}
	
	public function datatable_group_menu(Request $req)
	{
		$data = $this->model->jabatan()->take(5000)->get();
		// return $data;
	    $data = collect($data);
        return Datatables::of($data)
	                      ->addColumn('aksi', function ($data) {
	                        return  '<div class="btn-group">'.
	                                 '<button type="button" onclick="edit(this)" class="btn btn-info btn-lg" title="edit">'.
	                                 '<label class="fa fa-pencil-alt"></label></button>'.
	                                 '<button type="button" onclick="hapus(this)" class="btn btn-danger btn-lg" title="hapus">'.
	                                 '<label class="fa fa-trash"></label></button>'.
	                                '</div>';
	                      })
	                      ->addColumn('none', function ($data) {
	                          return '-';
	                      })
	                      ->rawColumns(['aksi', 'none'])
		                  ->addIndexColumn()
	                      ->make(true);
	}

	// DAFTAR MENU
	public function daftar_menu()
	{
		# code...
	}

	// HAK AKSES
	public function hak_akses()
	{
		# code...
	}

	// USER
	public function user()
	{
		# code...
	}

	// JABATAN
	public function jabatan()
	{
		# code...
	}

	// CABANG
	public function cabang()
	{
		# code...
	}

	// DATABASE
	public function database()
	{
		# code...
	}
}

