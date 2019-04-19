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
class master_bersama_controller extends Controller
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
	// MASTER PROVINSI
	public function provinsi()
	{
		if (Auth::check()) {
			if (Auth::user()->akses('master provinsi','aktif') == false) {
				return Response::json(['status'=>0,'pesan'=>'Anda Tidak Memiliki otorisasi']);
			}

			return view('master.master_bersama.provinsi.provinsi');
		}
	}

	public function datatable_provinsi(Request $req)
	{
		$data = $this->model->provinsi()->get();
		// return $data;
	    $data = collect($data);
        return Datatables::of($data)
	                      ->addColumn('aksi', function ($data) {
	                      	$a = '';
	                      	$b = '';
	                      		if (Auth::user()->akses('master provinsi','ubah')) {
	                      			$a = '<button type="button" onclick="edit(\''.$data->id.'\')" class="btn btn-info btn-sm" title="edit">'.
	                                 '<label class="fa fa-pencil"></label></button>';
	                      		}

	                      		if (Auth::user()->akses('master provinsi','hapus')) {
	                      			$b = '<button type="button" onclick="hapus(\''.$data->id.'\')" class="btn btn-danger btn-sm" title="hapus">'.
	                                 '<label class="fa fa-trash"></label></button>';
	                      		}

	                        return '<div class="btn-group">'.$a.$b.'</div>';
	                      })
	                      ->addColumn('none', function ($data) {
	                          return '-';
	                      })
	                      ->rawColumns(['aksi', 'none'])
		                  ->addIndexColumn()
	                      ->make(true);
	}

	public function edit_provinsi(Request $req)
	{
		if (Auth::user()->akses('master provinsi','ubah') == false) {
			return Response::json(['status'=>0,'pesan'=>'Anda Tidak Memiliki otorisasi']);
		}
		$data = $this->model->provinsi()->find($req->id);

		return response()->json(['status'=>1,'data'=>$data]);
	}

	public function simpan_provinsi(Request $req)
	{
		if (Auth::user()->akses('master provinsi','tambah') == false) {
			return Response::json(['status'=>0,'pesan'=>'Anda Tidak Memiliki otorisasi']);
		}

		$provinsi = $this->model->provinsi();

		try {
			DB::connection(Auth::user()->list_db->database)->beginTransaction();
			$input = $req->all();
			unset($input['_token']);
			$id = $this->model->provinsi()->max('id')+1;

			if ($req->id == null or $req->id == '') {
				$input['id'] = $id;
				$provinsi->create($input);
				$log_history = $this->model->log_history($id,'simpan master provinsi','s_provinsi');
				DB::connection(Auth::user()->list_db->database)->commit();
				return response()->json(['status'=>1,'pesan'=>'Data Berhasil Disimpan']);
			}else{
				$provinsi->where('id',$req->id)->update($input);
				$log_history = $this->model->log_history($req->id,'Update master provinsi','s_provinsi');
				DB::connection(Auth::user()->list_db->database)->commit();
				return response()->json(['status'=>2,'pesan'=>'Data Berhasil Diupdate']);
			}
		} catch (Exception $e) {
			DB::connection(Auth::user()->list_db->database)->rollBack();
			dd($e);
		}
	}

	public function hapus_provinsi(Request $req)
	{
		if (Auth::user()->akses('master provinsi','hapus') == false) {
			return Response::json(['status'=>0,'pesan'=>'Anda Tidak Memiliki otorisasi']);
		}

		$provinsi = $this->model->provinsi();

		try {
			DB::connection(Auth::user()->list_db->database)->beginTransaction();

			$delete = $provinsi->where('id',$req->id)->delete();
			$log_history = $this->model->log_history($req->id,'Hapus master provinsi','s_provinsi');

			DB::connection(Auth::user()->list_db->database)->commit();
			return response()->json(['status'=>1,'pesan'=>'Data berhasil dihapus']);
		} catch (Exception $e) {

			DB::connection(Auth::user()->list_db->database)->rollBack();
			return response()->json(['status'=>0,'pesan'=>'Data Tidak Bisa Dihapus']);
		}
	}

	// MASTER KOTA
	public function kota()
	{
		if (Auth::check()) {
			if (Auth::user()->akses('master kota','aktif') == false) {
				return Response::json(['status'=>0,'pesan'=>'Anda Tidak Memiliki otorisasi']);
			}
			$provinsi = $this->model->provinsi()->get();
			$kota = $this->model->kota()->get();


			return view('master.master_bersama.kota.kota',compact('provinsi','kota','data'));
		}
	}

	public function datatable_kota(Request $req)
	{	
		if ($req->provinsi_id != '') {
          $provinsi_id = 'and provinsi_id = '."'$req->provinsi_id'";
        }else{
          $provinsi_id = '';
        }

        if ($req->filter_nama != '') {
          $req->filter_nama = strtoupper($req->filter_nama);
          $nama = 'and nama like '."'%$req->filter_nama%'";
        }else{
          $nama = '';
        }

		$data = $this->model->kota()->whereRaw("id != 'null' $provinsi_id $nama")->paginate($req->filter_showing);

		return view('master.master_bersama.kota.tabel_kota',compact('data'));
	}

	public function edit_kota(Request $req)
	{
		if (Auth::user()->akses('master kota','ubah') == false) {
			return Response::json(['status'=>0,'pesan'=>'Anda Tidak Memiliki otorisasi']);
		}
		$data = $this->model->kota()->find($req->id);

		return response()->json(['status'=>1,'data'=>$data]);
	}

	public function simpan_kota(Request $req)
	{
		if (Auth::user()->akses('master kota','tambah') == false) {
			return Response::json(['status'=>0,'pesan'=>'Anda Tidak Memiliki otorisasi']);
		}

		$kota = $this->model->kota();

		try {
			DB::connection(Auth::user()->list_db->database)->beginTransaction();
			$input = $req->all();
			unset($input['_token']);
			$id = $this->model->kota()->max('id')+1;

			if ($req->id == null or $req->id == '') {
				$input['id'] = $id;
				$kota->create($input);
				$log_history = $this->model->log_history($id,'simpan master kota','s_kota');
				DB::connection(Auth::user()->list_db->database)->commit();
				return response()->json(['status'=>1,'pesan'=>'Data Berhasil Disimpan']);
			}else{
				$kota->where('id',$req->id)->update($input);
				$log_history = $this->model->log_history($req->id,'Update master kota','s_kota');
				DB::connection(Auth::user()->list_db->database)->commit();
				return response()->json(['status'=>2,'pesan'=>'Data Berhasil Diupdate']);
			}
		} catch (Exception $e) {
			DB::connection(Auth::user()->list_db->database)->rollBack();
			dd($e);
		}
	}

	public function hapus_kota(Request $req)
	{
		if (Auth::user()->akses('master kota','hapus') == false) {
			return Response::json(['status'=>0,'pesan'=>'Anda Tidak Memiliki otorisasi']);
		}
		
		$kota = $this->model->kota();

		try {
			DB::connection(Auth::user()->list_db->database)->beginTransaction();

			$delete = $kota->where('id',$req->id)->delete();
			$log_history = $this->model->log_history($req->id,'Hapus master kota','s_kota');

			DB::connection(Auth::user()->list_db->database)->commit();
			return response()->json(['status'=>1,'pesan'=>'Data berhasil dihapus']);
		} catch (Exception $e) {

			DB::connection(Auth::user()->list_db->database)->rollBack();
			return response()->json(['status'=>0,'pesan'=>'Data Tidak Bisa Dihapus']);
		}
	}

	// MASTER KECAMATAN
	public function kecamatan()
	{
		if (Auth::check()) {
			if (Auth::user()->akses('master kecamatan','aktif') == false) {
				return Response::json(['status'=>0,'pesan'=>'Anda Tidak Memiliki otorisasi']);
			}

			$provinsi = $this->model->provinsi()->get();
			$kota = $this->model->kota()->get();
			$data = $this->model->kecamatan()->paginate();

			return view('master.master_bersama.kecamatan.kecamatan',compact('provinsi','kota','data'));
		}
	}

	public function datatable_kecamatan(Request $req)
	{

        if ($req->kota_id != '') {
          $kota_id = 'and kota_id = '."'$req->kota_id'";
        }else{
          $kota_id = '';
        }

        if ($req->filter_nama != '') {
          $req->filter_nama = strtoupper($req->filter_nama);
          $nama = 'and nama like '."'%$req->filter_nama%'";
        }else{
          $nama = '';
        }

		$data = $this->model->kecamatan()->whereRaw("id != 'null' $kota_id $nama")->paginate($req->filter_showing);

		return view('master.master_bersama.kecamatan.tabel_kecamatan',compact('data'));
	}

	public function edit_kecamatan(Request $req)
	{
		if (Auth::user()->akses('master kecamatan','ubah') == false) {
			return Response::json(['status'=>0,'pesan'=>'Anda Tidak Memiliki otorisasi']);
		}
		$data = $this->model->kecamatan()->find($req->id);

		return response()->json(['status'=>1,'data'=>$data]);
	}

	public function simpan_kecamatan(Request $req)
	{
		if (Auth::user()->akses('master kecamatan','tambah') == false) {
			return Response::json(['status'=>0,'pesan'=>'Anda Tidak Memiliki otorisasi']);
		}

		$kecamatan = $this->model->kecamatan();

		try {
			DB::connection(Auth::user()->list_db->database)->beginTransaction();
			$input = $req->all();
			unset($input['_token']);
			$id = $this->model->kecamatan()->max('id')+1;

			if ($req->id == null or $req->id == '') {
				$input['id'] = $id;
				$kecamatan->create($input);
				$log_history = $this->model->log_history($id,'simpan master kecamatan','s_kecamatan');
				DB::connection(Auth::user()->list_db->database)->commit();
				return response()->json(['status'=>1,'pesan'=>'Data Berhasil Disimpan']);
			}else{
				$kecamatan->where('id',$req->id)->update($input);
				$log_history = $this->model->log_history($req->id,'Update master kecamatan','s_kecamatan');
				DB::connection(Auth::user()->list_db->database)->commit();
				return response()->json(['status'=>2,'pesan'=>'Data Berhasil Diupdate']);
			}
		} catch (Exception $e) {
			DB::connection(Auth::user()->list_db->database)->rollBack();
			dd($e);
		}
	}

	public function hapus_kecamatan(Request $req)
	{
		if (Auth::user()->akses('master kecamatan','hapus') == false) {
			return Response::json(['status'=>0,'pesan'=>'Anda Tidak Memiliki otorisasi']);
		}
		
		$kecamatan = $this->model->kecamatan();

		try {
			DB::connection(Auth::user()->list_db->database)->beginTransaction();

			$delete = $kecamatan->where('id',$req->id)->delete();
			$log_history = $this->model->log_history($req->id,'Hapus master kecamatan','s_kecamatan');

			DB::connection(Auth::user()->list_db->database)->commit();
			return response()->json(['status'=>1,'pesan'=>'Data berhasil dihapus']);
		} catch (Exception $e) {

			DB::connection(Auth::user()->list_db->database)->rollBack();
			return response()->json(['status'=>0,'pesan'=>'Data Tidak Bisa Dihapus']);
		}
	}

	// MASTER DESA
	public function desa()
	{
		if (Auth::check()) {
			if (Auth::user()->akses('master desa','aktif') == false) {
				return Response::json(['status'=>0,'pesan'=>'Anda Tidak Memiliki otorisasi']);
			}

			$provinsi = $this->model->provinsi()->get();
			$kota = $this->model->kota()->get();
			$kecamatan = $this->model->kecamatan()->get();

			return view('master.master_bersama.desa.desa',compact('provinsi','kota','kecamatan','data'));
		}
	}

	public function datatable_desa(Request $req)
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

		$data = $this->model->desa()->whereRaw("id != 'null' $kecamatan_id $nama")->paginate($req->filter_showing);
		return view('master.master_bersama.desa.tabel_desa',compact('data'));
	}

	public function edit_desa(Request $req)
	{
		if (Auth::user()->akses('master desa','ubah') == false) {
			return Response::json(['status'=>0,'pesan'=>'Anda Tidak Memiliki otorisasi']);
		}
		$data = $this->model->desa()->find($req->id);

		return response()->json(['status'=>1,'data'=>$data]);
	}

	public function simpan_desa(Request $req)
	{
		if (Auth::user()->akses('master desa','tambah') == false) {
			return Response::json(['status'=>0,'pesan'=>'Anda Tidak Memiliki otorisasi']);
		}

		$desa = $this->model->desa();

		try {
			DB::connection(Auth::user()->list_db->database)->beginTransaction();
			$input = $req->all();
			unset($input['_token']);
			$id = $this->model->desa()->max('id')+1;

			if ($req->id == null or $req->id == '') {
				$input['id'] = $id;
				$desa->create($input);
				$log_history = $this->model->log_history($id,'simpan master desa','s_desa');
				DB::connection(Auth::user()->list_db->database)->commit();
				return response()->json(['status'=>1,'pesan'=>'Data Berhasil Disimpan']);
			}else{
				$desa->where('id',$req->id)->update($input);
				$log_history = $this->model->log_history($req->id,'Update master desa','s_desa');
				DB::connection(Auth::user()->list_db->database)->commit();
				return response()->json(['status'=>2,'pesan'=>'Data Berhasil Diupdate']);
			}
		} catch (Exception $e) {
			DB::connection(Auth::user()->list_db->database)->rollBack();
			dd($e);
		}
	}

	public function hapus_desa(Request $req)
	{
		if (Auth::user()->akses('master desa','hapus') == false) {
			return Response::json(['status'=>0,'pesan'=>'Anda Tidak Memiliki otorisasi']);
		}
		
		$desa = $this->model->desa();

		try {
			DB::connection(Auth::user()->list_db->database)->beginTransaction();

			$delete = $desa->where('id',$req->id)->delete();
			$log_history = $this->model->log_history($req->id,'Hapus master desa','s_kecamatan');

			DB::connection(Auth::user()->list_db->database)->commit();
			return response()->json(['status'=>1,'pesan'=>'Data berhasil dihapus']);
		} catch (Exception $e) {

			DB::connection(Auth::user()->list_db->database)->rollBack();
			return response()->json(['status'=>0,'pesan'=>'Data Tidak Bisa Dihapus']);
		}
	}

	// CABANG
	public function cabang()
	{
		if (Auth::check()) {
			if (Auth::user()->akses('master cabang','aktif') == false) {
				return Response::json(['status'=>0,'pesan'=>'Anda Tidak Memiliki otorisasi']);
			}
			$kota = $this->model->kota()->get();
			return view('master.master_bersama.cabang.cabang',compact('kota'));
		}
	}
	
	public function datatable_cabang(Request $req)
	{
		$data = $this->model->cabang()->get();

	    $data = collect($data);
        return Datatables::of($data)
	                      ->addColumn('aksi', function ($data) {
	                        return  '<div class="btn-group">'.
	                                 '<button type="button" onclick="edit(\''.$data->id.'\')" class="btn btn-info btn-xs" title="edit">'.
	                                 '<label class="fa fa-pencil"></label></button>'.
	                                 '<button type="button" onclick="hapus(\''.$data->id.'\')" class="btn btn-danger btn-xs" title="hapus">'.
	                                 '<label class="fa fa-trash"></label></button>'.
	                                '</div>';
	                      })
	                      ->addColumn('none', function ($data) {
	                          return '-';
	                      })
	                      ->addColumn('kota', function ($data) {
	                      	if ($data->kota != null) {
	                          return $data->kota->nama;
	                      	}
	                      })->addColumn('create', function ($data) {
	                      	if ($data->create != null) {
	                          return $data->create->name;
	                      	}
	                      })
	                      ->rawColumns(['aksi', 'none','kota','create'])
		                  ->addIndexColumn()
	                      ->make(true);
	}

	public function edit_cabang(Request $req)
	{
		if (Auth::user()->akses('master cabang','ubah') == false) {
			return Response::json(['status'=>0,'pesan'=>'Anda Tidak Memiliki otorisasi']);
		}
		$data = $this->model->cabang()->find($req->id);

		return response()->json(['status'=>1,'data'=>$data]);
	}

	public function simpan_cabang(Request $req)
	{
		if (Auth::user()->akses('master cabang','tambah') == false) {
			return Response::json(['status'=>0,'pesan'=>'Anda Tidak Memiliki otorisasi']);
		}

		$cabang = $this->model->cabang();

		try {
			DB::connection(Auth::user()->list_db->database)->beginTransaction();
			$input = $req->all();
			unset($input['_token']);
			$id = $this->model->cabang()->max('id')+1;

			

			if ($req->id == null or $req->id == '') {
				$kode = $this->model->cabang()->where('kode',$input['kode'])->first();
				if ($kode != null) {
					return response()->json(['status'=>0,'pesan'=>'Kode Sudah Terpakai']);
				}
				$input['id'] = $id;
				$cabang->create($input);
				$log_history = $this->model->log_history($id,'simpan master cabang','s_cabang');
				DB::connection(Auth::user()->list_db->database)->commit();
				return response()->json(['status'=>1,'pesan'=>'Data Berhasil Disimpan']);
			}else{
				$cabang->where('id',$req->id)->update($input);
				$log_history = $this->model->log_history($req->id,'Update master cabang','s_cabang');
				DB::connection(Auth::user()->list_db->database)->commit();
				return response()->json(['status'=>2,'pesan'=>'Data Berhasil Diupdate']);
			}
		} catch (Exception $e) {
			DB::connection(Auth::user()->list_db->database)->rollBack();
			dd($e);
		}
	}

	public function hapus_cabang(Request $req)
	{
		DB::beginTransaction();
		if (Auth::user()->akses('master cabang','hapus') == false) {
			return Response::json(['status'=>0,'pesan'=>'Anda Tidak Memiliki otorisasi']);
		}
		try {
			$delete = $this->model->cabang()->where('id',$req->id)->delete();
			$log_history = $this->model->log_history($req->id,'Hapus master cabang','s_cabang');
			DB::commit();
			return response()->json(['status'=>1,'pesan'=>'Data berhasil dihapus']);
		} catch (Exception $e) {
			DB::rollBack();
			return response()->json(['status'=>0,'pesan'=>'Data Tidak Bisa Dihapus']);
		}
	}

	public function pegawai()
	{
		if (Auth::check()) {
			if (Auth::user()->akses('master pegawai','aktif') == false) {
				return Response::json(['status'=>0,'pesan'=>'Anda Tidak Memiliki otorisasi']);
			}

			$provinsi = $this->model->provinsi()->get();
			$kota = $this->model->kota()->get();

			return view('master.master_bersama.pegawai.pegawai',compact('provinsi','kota','data'));
		}
	}

	public function datatable_pegawai(Request $req)
	{	
		if ($req->filter_bagian == '' or $req->filter_bagian == null) {
          $bagian = '';
        }else{
          $bagian = 'and bagian = '."'$req->filter_bagian'";
        }

        if ($req->filter_nama != '') {
          $req->filter_nama = strtoupper($req->filter_nama);
          $nama = 'and nama like '."'%$req->filter_nama%'";
        }else{
          $nama = '';
        }

		$data = $this->model->pegawai()->whereRaw("id != 'null' $bagian $nama")->paginate($req->filter_showing);
		return view('master.master_bersama.pegawai.tabel_pegawai',compact('data'));
	}

	public function edit_pegawai(Request $req)
	{
		if (Auth::user()->akses('master pegawai','ubah') == false) {
			return Response::json(['status'=>0,'pesan'=>'Anda Tidak Memiliki otorisasi']);
		}
		$data = $this->model->pegawai()->find($req->id);

		return response()->json(['status'=>1,'data'=>$data]);
	}

	public function simpan_pegawai(Request $req)
	{
		if (Auth::user()->akses('master pegawai','tambah') == false) {
			return Response::json(['status'=>0,'pesan'=>'Anda Tidak Memiliki otorisasi']);
		}

		$pegawai = $this->model->pegawai();

		try {
			DB::connection(Auth::user()->list_db->database)->beginTransaction();
			$input = $req->all();
			unset($input['_token']);
			$id = $this->model->pegawai()->max('id')+1;

			if ($req->id == null or $req->id == '') {

				$file = $req->file('foto');
		        if ($file != null) {
					$file_name = 'pegawai_'. $id .'_' . '.' . $file->getClientOriginalExtension();
					if (!is_dir(storage_path('uploads/pegawai/thumbnail/'))) {
						mkdir(storage_path('uploads/pegawai/thumbnail/'), 0777, true);
					}

					if (!is_dir(storage_path('uploads/pegawai/original/'))) {
						mkdir(storage_path('uploads/pegawai/original/'), 0777, true);
					}

					$thumbnail_path = storage_path('uploads/pegawai/thumbnail/');
					$original_path = storage_path('uploads/pegawai/original/');

					Image::make($file)
					      ->resize(261,null,function ($constraint) {
					        $constraint->aspectRatio();
					         })
					      ->save($original_path . $file_name)
					      ->resize(90, 90)
					      ->save($thumbnail_path . $file_name);
		        }else{
					$file_name ='TIDAK ADA';
		        }

				$input['id'] = $id;
				$input['foto'] = $file_name;
				
				$pegawai->insert($input);
				$log_history = $this->model->log_history($id,'simpan master pegawai','m_pegawai');
				DB::connection(Auth::user()->list_db->database)->commit();
				return response()->json(['status'=>1,'pesan'=>'Data Berhasil Disimpan']);
			}else{
				$file = $req->file('foto');
		        if ($file != null) {
					$file_name = 'pegawai_'. $req->id .'_' . '.' . $file->getClientOriginalExtension();
					if (!is_dir(storage_path('uploads/pegawai/thumbnail/'))) {
						mkdir(storage_path('uploads/pegawai/thumbnail/'), 0777, true);
					}

					if (!is_dir(storage_path('uploads/pegawai/original/'))) {
						mkdir(storage_path('uploads/pegawai/original/'), 0777, true);
					}

					$thumbnail_path = storage_path('uploads/pegawai/thumbnail/');
					$original_path = storage_path('uploads/pegawai/original/');

					Image::make($file)
					      ->resize(261,null,function ($constraint) {
					        $constraint->aspectRatio();
					         })
					      ->save($original_path . $file_name)
					      ->resize(90, 90)
					      ->save($thumbnail_path . $file_name);
		        }else{
					$file_name = $pegawai->where('id',$req->id)->first()->foto;
		        }

				$input['foto'] = $file_name;
				$pegawai->where('id',$req->id)->update($input);
				$log_history = $this->model->log_history($req->id,'Update master pegawai','m_pegawai');
				DB::connection(Auth::user()->list_db->database)->commit();
				return response()->json(['status'=>2,'pesan'=>'Data Berhasil Diupdate']);
			}
		} catch (Exception $e) {
			DB::connection(Auth::user()->list_db->database)->rollBack();
			dd($e);
		}
	}

	public function hapus_pegawai(Request $req)
	{
		if (Auth::user()->akses('master pegawai','hapus') == false) {
			return Response::json(['status'=>0,'pesan'=>'Anda Tidak Memiliki otorisasi']);
		}
		
		$pegawai = $this->model->pegawai();

		try {
			DB::connection(Auth::user()->list_db->database)->beginTransaction();

			try {
				unlink(storage_path('uploads/pegawai/thumbnail').'/'.$pegawai->where('id',$req->id)->first()->foto);
	    		unlink(storage_path('uploads/pegawai/original').'/'.$pegawai->where('id',$req->id)->first()->foto);
			} catch (Exception $e) {
				
			}
				
			$delete = $pegawai->where('id',$req->id)->delete();
			$log_history = $this->model->log_history($req->id,'Hapus master pegawai','m_pegawai');
			DB::connection(Auth::user()->list_db->database)->commit();
			return response()->json(['status'=>1,'pesan'=>'Data berhasil dihapus']);
		} catch (Exception $e) {
			DB::connection(Auth::user()->list_db->database)->rollBack();
			return response()->json(['status'=>0,'pesan'=>'Data Tidak Bisa Dihapus']);
		}
	}

	public function cetak_pegawai(Request $req)
	{
		return view('');
	}

	public function ubah_status_pegawai(Request $req)
	{
		

		if (Auth::user()->akses('master pegawai','validasi') == false) {
			return Response::json(['status'=>0,'pesan'=>'Anda Tidak Memiliki otorisasi']);
		}
		
		$pegawai = $this->model->pegawai();

		try {
			DB::connection(Auth::user()->list_db->database)->beginTransaction();
			if ($req->status == 'true') {
				$status = 'Active';
			}else{
				$status = 'Inactive';
			}

			$input['status'] = $status;
		
			$pegawai->where('id',$req->id)->update($input);
			$log_history = $this->model->log_history($req->id,'Update master cabang','s_cabang');
			DB::connection(Auth::user()->list_db->database)->commit();
			return Response::json(['status'=>1,'pesan'=>'Data Berhasil Dirubah']);
		} catch (Exception $e) {
			DB::connection(Auth::user()->list_db->database)->rollBack();
			dd($e);
		}

	}
}
