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
	protected $log;

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
			if (Auth::user()->akses('setting group menu','aktif') == false) {
				return Response::json(['status'=>0,'pesan'=>'Anda Tidak Memiliki otorisasi']);
			}
			return view('setting.group_menu.group_menu');
		}
	}
	
	public function datatable_group_menu(Request $req)
	{
		$data = $this->model->group_menu()->take(5000)->get();
		// return $data;
	    $data = collect($data);
        return Datatables::of($data)
	                      ->addColumn('aksi', function ($data) {
	                        return  '<div class="btn-group">'.
	                                 '<button type="button" onclick="edit(\''.$data->id.'\')" class="btn btn-info btn-sm" title="edit">'.
	                                 '<label class="fa fa-pencil"></label></button>'.
	                                 '<button type="button" onclick="hapus(\''.$data->id.'\')" class="btn btn-danger btn-sm" title="hapus">'.
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

	public function edit_group_menu(Request $req)
	{
		if (Auth::user()->akses('setting group menu','ubah') == false) {
			return Response::json(['status'=>0,'pesan'=>'Anda Tidak Memiliki otorisasi']);
		}
		$data = $this->model->group_menu()->find($req->id);

		return response()->json(['status'=>1,'data'=>$data]);
	}

	public function simpan_group_menu(Request $req)
	{
		DB::beginTransaction();
		if (Auth::user()->akses('setting group menu','simpan') == false) {
			return Response::json(['status'=>0,'pesan'=>'Anda Tidak Memiliki otorisasi']);
		}
		try {
			$group_menu = $this->model->group_menu();
			$input = $req->all();
			unset($input['_token']);
			$id = $this->model->group_menu()->max('id')+1;

			if ($req->id == null or $req->id == '') {
				$input['id'] = $id;
				$group_menu->create($input);
				$log_history = $this->model->log_history($id,'simpan group menu','s_group_menu');
				DB::commit();
				return response()->json(['status'=>1,'pesan'=>'Data Berhasil Disimpan']);
			}else{
				$group_menu->where('id',$req->id)->update($input);
				$log_history = $this->model->log_history($req->id,'Update group menu','s_group_menu');
				DB::commit();
				return response()->json(['status'=>2,'pesan'=>'Data Berhasil Diupdate']);
			}
		} catch (Exception $e) {
			DB::rollBack();
			dd($e);
		}
	}

	public function hapus_group_menu(Request $req)
	{
		DB::beginTransaction();
		if (Auth::user()->akses('setting group menu','hapus') == false) {
			return Response::json(['status'=>0,'pesan'=>'Anda Tidak Memiliki otorisasi']);
		}
		try {
			$delete = $this->model->group_menu()->where('id',$req->id)->delete();
			$log_history = $this->model->log_history($req->id,'Hapus group menu','s_group_menu');
			DB::commit();
			return response()->json(['status'=>1,'pesan'=>'Data berhasil dihapus']);
		} catch (Exception $e) {
			DB::rollBack();
			return response()->json(['status'=>0,'pesan'=>'Data Tidak Bisa Dihapus']);
		}
	}

	// DAFTAR MENU
	public function daftar_menu()
	{
		if (Auth::check()) {
			if (Auth::user()->akses('setting daftar menu','aktif') == false) {
				return Response::json(['status'=>0,'pesan'=>'Anda Tidak Memiliki otorisasi']);
			}
			$group_menu = $this->model->group_menu()->all();
			return view('setting.daftar_menu.daftar_menu',compact('group_menu'));
		}
	}
	
	public function datatable_daftar_menu(Request $req)
	{
		$data = $this->model->daftar_menu()->take(5000)->get();
	    $data = collect($data);
        return Datatables::of($data)
	                      ->addColumn('aksi', function ($data) {
	                        return  '<div class="btn-group">'.
	                                 '<button type="button" onclick="edit(\''.$data->id.'\')" class="btn btn-info btn-sm" title="edit">'.
	                                 '<label class="fa fa-pencil"></label></button>'.
	                                 '<button type="button" onclick="hapus(\''.$data->id.'\')" class="btn btn-danger btn-sm" title="hapus">'.
	                                 '<label class="fa fa-trash"></label></button>'.
	                                '</div>';
	                      })->addColumn('none', function ($data) {
	                          return '-';
	                      })->addColumn('group_menu', function ($data) {
	                          return $data->group_menu->nama;
	                      })
	                      ->rawColumns(['aksi', 'none','group_menu'])
		                  ->addIndexColumn()
	                      ->make(true);
	}

	public function edit_daftar_menu(Request $req)
	{
		if (Auth::user()->akses('setting daftar menu','ubah') == false) {
			return Response::json(['status'=>0,'pesan'=>'Anda Tidak Memiliki otorisasi']);
		}
		$data = $this->model->daftar_menu()->find($req->id);

		return response()->json(['status'=>1,'data'=>$data]);
	}

	public function simpan_daftar_menu(Request $req)
	{
		DB::beginTransaction();
		if (Auth::user()->akses('setting daftar menu','simpan') == false) {
			return Response::json(['status'=>0,'pesan'=>'Anda Tidak Memiliki otorisasi']);
		}
		try {
			$daftar_menu = $this->model->daftar_menu();
			$input = $req->all();
			unset($input['_token']);
			$id = $this->model->daftar_menu()->max('id')+1;

			if ($req->id == null or $req->id == '') {
				$input['id'] = $id;
				$daftar_menu->create($input);
				$log_history = $this->model->log_history($id,'simpan daftar menu','s_daftar_menu');

				$jabatan = $this->model->jabatan()->get();

				for ($i=0; $i < count($jabatan); $i++) { 
					$id1 = $this->model->hak_akses()->max('id')+1;
					$hak_akses = array(
						'id'			=> $id1,
						'dt'			=> $i+1,
						'jabatan_id'	=> $jabatan[$i]->id,
						'daftar_menu'	=> $input['nama'],
						'daftar_menu_id'=> $id,
						'aktif'			=> 1,
						'tambah'		=> 1,
						'ubah'			=> 1,
						'hapus'			=> 1,
						'cabang'		=> 1,
						'global'		=> 1,
						'print'			=> 1,
						'validasi'		=> 1,
						'updated_by'	=> Auth::user()->name,
						'created_by'	=> Auth::user()->name,
					);
						
					if ($jabatan[$i]->id == 1) {
						$this->model->hak_akses()->create($hak_akses);
					}else{
						$hak_akses['aktif']		= 1;
						$hak_akses['tambah']	= 0;
						$hak_akses['ubah']		= 0;
						$hak_akses['hapus']		= 0;
						$hak_akses['cabang']	= 0;
						$hak_akses['global']	= 0;
						$hak_akses['print']		= 0;
						$hak_akses['validasi']	= 0;
						$this->model->hak_akses()->create($hak_akses);
					}
				}

				DB::commit();
				return response()->json(['status'=>1,'pesan'=>'Data Berhasil Disimpan']);
			}else{
				$daftar_menu->where('id',$req->id)->update($input);
				$log_history = $this->model->log_history($req->id,'update daftar menu','s_daftar_menu');
				$this->model->hak_akses()->where('daftar_menu_id',$req->id)->update([
																						'daftar_menu'=>$input['nama'],
																					]);
				DB::commit();
				return response()->json(['status'=>2,'pesan'=>'Data Berhasil Diupdate']);
			}


		} catch (Exception $e) {
			DB::rollBack();
			dd($e);
		}
	}

	public function hapus_daftar_menu(Request $req)
	{
		DB::beginTransaction();
		if (Auth::user()->akses('setting daftar menu','hapus') == false) {
			return Response::json(['status'=>0,'pesan'=>'Anda Tidak Memiliki otorisasi']);
		}
		try {
			$delete = $this->model->daftar_menu()->where('id',$req->id)->delete();
			$log_history = $this->model->log_history($id,'hapus daftar menu','s_daftar_menu');
			DB::commit();
			return response()->json(['status'=>1,'pesan'=>'Data berhasil dihapus']);
		} catch (Exception $e) {
			DB::rollBack();
			return response()->json(['status'=>0,'pesan'=>'Data Tidak Bisa Dihapus']);
		}
	}

	// HAK AKSES
	public function hak_akses()
	{
		if (Auth::user()->akses('setting hak akses','aktif') == false) {
			return Response::json(['status'=>0,'pesan'=>'Anda Tidak Memiliki otorisasi']);
		}
		$jabatan = $this->model->jabatan()->get();
		return view('setting.hak_akses.hak_akses',compact('jabatan'));
	}

	public function hak_akses_data(Request $req)
	{
		$data = $this->model->hak_akses()->where('jabatan_id',$req->jabatan_id)->get();
	    $group_menu  = $this->model->group_menu()->get();
	    return view('setting.hak_akses.table_data',compact('data','group_menu','hak_akses'));
	}

	public function centang(request $req)
	{
		if (Auth::user()->akses('setting hak akses','simpan') == false) {
			return Response::json(['status'=>0,'pesan'=>'Anda Tidak Memiliki otorisasi']);
		}
		if (isset($req->aktif)) {
		  if ($req->aktif == 'true') {
		    $aktif = 1;
		  }else{
		    $aktif = 0;
		  }
		  $this->model->hak_akses()->where('jabatan_id',$req->jabatan_id)
		                    ->where('daftar_menu',$req->tanda)
		                    ->update([
		                      'aktif' =>$aktif
		                    ]);

		  $log_history = $this->model->log_history($id,'rubah hak akses aktif','s_hak_akses');
		}

		if (isset($req->tambah)) {
		  if ($req->tambah == 'true') {
		    $tambah = 1;
		  }else{
		    $tambah = 0;
		  }
		  $this->model->hak_akses()->where('jabatan_id',$req->jabatan_id)
		                    ->where('daftar_menu',$req->tanda)
		                    ->update([
		                      'tambah' =>$tambah
		                    ]);

		  $log_history = $this->model->log_history($id,'rubah hak akses tambah','s_hak_akses');
		}      

		if (isset($req->ubah)) {
		  if ($req->ubah == 'true') {
		    $ubah = 1;
		  }else{
		    $ubah = 0;
		  }
		  $this->model->hak_akses()->where('jabatan_id',$req->jabatan_id)
		                    ->where('daftar_menu',$req->tanda)
		                    ->update([
		                      'ubah' =>$ubah
		                    ]);

		  $log_history = $this->model->log_history($id,'rubah hak akses ubah','s_hak_akses');
		}  

		if (isset($req->cabang)) {
		  if ($req->cabang == 'true') {
		    $cabang = 1;
		  }else{
		    $cabang = 0;
		  }
		  $this->model->hak_akses()->where('jabatan_id',$req->jabatan_id)
		                    ->where('daftar_menu',$req->tanda)
		                    ->update([
		                      'cabang' =>$cabang
		                    ]);

		  $log_history = $this->model->log_history($id,'rubah hak akses cabang','s_hak_akses');
		}  

		if (isset($req->global)) {
		  if ($req->global == 'true') {
		    $global = 1;
		  }else{
		    $global = 0;
		  }
		  $this->model->hak_akses()->where('jabatan_id',$req->jabatan_id)
		                    ->where('daftar_menu',$req->tanda)
		                    ->update([
		                      'global' =>$global
		                    ]);
		  $log_history = $this->model->log_history($id,'rubah hak akses cabang','s_hak_akses');
		}  

		if (isset($req->print)) {
		  if ($req->print == 'true') {
		    $print = 1;
		  }else{
		    $print = 0;
		  }
		  $this->model->hak_akses()->where('jabatan_id',$req->jabatan_id)
		                    ->where('daftar_menu',$req->tanda)
		                    ->update([
		                      'print' =>$print
		                    ]);
		  $log_history = $this->model->log_history($id,'rubah hak akses print','s_hak_akses');
		} 

		if (isset($req->hapus)) {
		  if ($req->hapus == 'true') {
		    $hapus = 1;
		  }else{
		    $hapus = 0;
		  }
		  $this->model->hak_akses()->where('jabatan_id',$req->jabatan_id)
		                    ->where('daftar_menu',$req->tanda)
		                    ->update([
		                      'hapus' =>$hapus
		                    ]);
		  $log_history = $this->model->log_history($id,'rubah hak akses hapus','s_hak_akses');
		}

		if (isset($req->validasi)) {
		  if ($req->validasi == 'true') {
		    $validasi = 1;
		  }else{
		    $validasi = 0;
		  }
		  $this->model->hak_akses()->where('jabatan_id',$req->jabatan_id)
		                    ->where('daftar_menu',$req->tanda)
		                    ->update([
		                      'validasi' =>$validasi
		                    ]);
		  $log_history = $this->model->log_history($id,'rubah hak akses validasi','s_hak_akses');
		}

		return response()->json(['status' => 1]);
	}

	// USER
	public function user()
	{
		# code...
	}

	// JABATAN
	public function jabatan()
	{
		if (Auth::check()) {
			if (Auth::user()->akses('setting jabatan','aktif') == false) {
				return Response::json(['status'=>0,'pesan'=>'Anda Tidak Memiliki otorisasi']);
			}
			$this->model->akses('setting jabatan','aktif');
			return view('setting.jabatan.jabatan');
		}
	}
	
	public function datatable_jabatan(Request $req)
	{
		$data = $this->model->jabatan()->take(5000)->get();
		// return $data;
	    $data = collect($data);
        return Datatables::of($data)
	                      ->addColumn('aksi', function ($data) {
	                      	if ($data->id != 1) {
	                      		return  '<div class="btn-group">'.
		                                 '<button type="button" onclick="edit(\''.$data->id.'\')" class="btn btn-info btn-sm" title="edit">'.
		                                 '<label class="fa fa-pencil"></label></button>'.
		                                 '<button type="button" onclick="hapus(\''.$data->id.'\')" class="btn btn-danger btn-sm" title="hapus">'.
		                                 '<label class="fa fa-trash"></label></button>'.
		                                '</div>';
	                      	}else{
	                      		return '-';
	                      	}
		                        
	                      })
	                      ->addColumn('none', function ($data) {
	                          return '-';
	                      })
	                      ->rawColumns(['aksi', 'none'])
		                  ->addIndexColumn()
	                      ->make(true);
	}

	public function edit_jabatan(Request $req)
	{
		if (Auth::user()->akses('setting jabatan','ubah') == false) {
			return Response::json(['status'=>0,'pesan'=>'Anda Tidak Memiliki otorisasi']);
		}
		$this->model->akses('setting jabatan','ubah');
		$data = $this->model->jabatan()->find($req->id);

		return response()->json(['status'=>1,'data'=>$data]);
	}

	public function simpan_jabatan(Request $req)
	{
		if (Auth::user()->akses('setting jabatan','simpan') == false) {
			return Response::json(['status'=>0,'pesan'=>'Anda Tidak Memiliki otorisasi']);
		}

		DB::beginTransaction();
		try {
			$this->model->akses('setting jabatan','tambah');
			$jabatan = $this->model->jabatan();
			$input = $req->all();
			unset($input['_token']);
			$id = $this->model->jabatan()->max('id')+1;

			if ($req->id == null or $req->id == '') {
				$input['id'] = $id;
				$jabatan->create($input);
				$log_history = $this->model->log_history($id,'simpan jabatan','s_jabatan');
				$daftar_menu = $this->model->daftar_menu();
				for ($i=0; $i < count($daftar_menu); $i++) { 
					$daftar_menu
					$daftar_menu = array(
									'id'			=> $i+1,
									'dt'			=> $i+1,
									'jabatan_id'	=> $jabatan[$i]->id,
									'daftar_menu'	=> $input['nama'],
									'daftar_menu_id'=> $id,
									'aktif'			=> 1,
									'tambah'		=> 0,
									'ubah'			=> 0,
									'hapus'			=> 0,
									'cabang'		=> 0,
									'global'		=> 0,
									'print'			=> 0,
									'validasi'		=> 0,
									'updated_by'	=> Auth::user()->name,
									'created_by'	=> Auth::user()->name,
								);
				}

				DB::commit();
				return response()->json(['status'=>1,'pesan'=>'Data Berhasil Disimpan']);
			}else{
				$jabatan->where('id',$req->id)->update($input);
				$log_history = $this->model->log_history($req->id,'Update jabatan','s_jabatan');
				DB::commit();
				return response()->json(['status'=>2,'pesan'=>'Data Berhasil Diupdate']);
			}
		} catch (Exception $e) {
			DB::rollBack();
			dd($e);
		}
	}

	public function hapus_jabatan(Request $req)
	{
		if (Auth::user()->akses('setting jabatan','hapus') == false) {
			return Response::json(['status'=>0,'pesan'=>'Anda Tidak Memiliki otorisasi']);
		}
		DB::beginTransaction();
		try {
			$this->model->akses('setting jabatan','hapus');
			$delete = $this->model->jabatan()->where('id',$req->id)->delete();
			$log_history = $this->model->log_history($req->id,'Hapus jabatan','s_group_menu');
			DB::commit();
			return response()->json(['status'=>1,'pesan'=>'Data berhasil dihapus']);
		} catch (Exception $e) {
			DB::rollBack();
			return response()->json(['status'=>0,'pesan'=>'Data Tidak Bisa Dihapus']);
		}
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

