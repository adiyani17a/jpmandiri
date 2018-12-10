<?php

namespace App\Http\Controllers\master;

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
class master_akuntansi_controller extends Controller
{
    // MASTER GROUP AKUN

    protected $db;
	protected $model;
	protected $log;

 	public function __construct()
	{
		$this->model = new models;

		Date::setLocale('id');
		$additionalData = [];

	}
	
    public function group_akun()
    {

    	return view('master.master_akuntansi.group_akun.group_akun');
    }

    public function datatable_group_akun(Request $req)
	{

        if ($req->kecamatan_id != '') {
          $kecamatan_id = 'and kecamatan_id = '."'$req->kecamatan_id'";
        }else{
          $kecamatan_id = '';
        }

        if ($req->filter_nama != '') {
          $req->filter_nama = strtoupper($req->filter_nama);
          $nama = 'and nama like '."'%$req->filter_nama%'";
        }else{
          $nama = '';
        }

		$data = $this->model->group_akun()->whereRaw("id != 'null' $kecamatan_id $nama")->paginate($req->filter_showing);
		return view('master.master_akuntansi.group_akun.tabel_group_akun',compact('data'));
	}

	public function edit_group_akun(Request $req)
	{
		if (Auth::user()->akses('master group_akun','ubah') == false) {
			return Response::json(['status'=>0,'pesan'=>'Anda Tidak Memiliki otorisasi']);
		}
		$data = $this->model->group_akun()->find($req->id);

		return response()->json(['status'=>1,'data'=>$data]);
	}

	public function simpan_group_akun(Request $req)
	{
		if (Auth::user()->akses('master group_akun','tambah') == false) {
			return Response::json(['status'=>0,'pesan'=>'Anda Tidak Memiliki otorisasi']);
		}

		$group_akun = $this->model->group_akun();

		try {
			DB::connection(Auth::user()->list_db->database)->beginTransaction();
			$input = $req->all();
			unset($input['_token']);
			$id = $this->model->group_akun()->max('id')+1;

			if ($req->id == null or $req->id == '') {
				$input['id'] = $id;
				$group_akun->create($input);
				$log_history = $this->model->log_history($id,'simpan master group_akun','s_group_akun');
				DB::connection(Auth::user()->list_db->database)->commit();
				return response()->json(['status'=>1,'pesan'=>'Data Berhasil Disimpan']);
			}else{
				$group_akun->where('id',$req->id)->update($input);
				$log_history = $this->model->log_history($req->id,'Update master group_akun','s_group_akun');
				DB::connection(Auth::user()->list_db->database)->commit();
				return response()->json(['status'=>2,'pesan'=>'Data Berhasil Diupdate']);
			}
		} catch (Exception $e) {
			DB::connection(Auth::user()->list_db->database)->rollBack();
			dd($e);
		}
	}

	public function hapus_group_akun(Request $req)
	{
		if (Auth::user()->akses('master group_akun','hapus') == false) {
			return Response::json(['status'=>0,'pesan'=>'Anda Tidak Memiliki otorisasi']);
		}
		
		$group_akun = $this->model->group_akun();

		try {
			DB::connection(Auth::user()->list_db->database)->beginTransaction();

			$delete = $group_akun->where('id',$req->id)->delete();
			$log_history = $this->model->log_history($req->id,'Hapus master group_akun','s_kecamatan');

			DB::connection(Auth::user()->list_db->database)->commit();
			return response()->json(['status'=>1,'pesan'=>'Data berhasil dihapus']);
		} catch (Exception $e) {

			DB::connection(Auth::user()->list_db->database)->rollBack();
			return response()->json(['status'=>0,'pesan'=>'Data Tidak Bisa Dihapus']);
		}
	}
}
