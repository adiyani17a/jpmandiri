@extends('main')
@section('content')
@include('setting.group_menu.tambah_group_menu')
<style type="text/css">
  a:hover{
    color: hotpink !important;
  }
</style>
<!-- partial -->
<div class="row">
  <div class="col-lg-12"> 
    <nav aria-label="breadcrumb" role="navigation">
      <ol class="breadcrumb bg-gradient-primary" >
        <li class="breadcrumb-item" style="color: white;">
          <i class="fa fa-home"></i>&nbsp;<a style="text-decoration: none !important;color: white" href="{{ url('/') }}">Home</a>
        </li>
        <li class="breadcrumb-item" style="color: white">Setting</li>
        <li class="breadcrumb-item  active" style="color: white" aria-current="page">Setting Group Menu</li>
      </ol>
    </nav>
  </div>
	<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Setting Group Menu</h4>
        {{-- @if(Auth::user()->akses('SETTING DAFTAR MENU','tambah')) --}}
        <div class="col-md-12 col-sm-12 col-xs-12" align="right" style="margin-bottom: 15px;">
        	<button type="button" class="btn btn-info btn_modal" data-toggle="modal" data-target="#daftar-menu"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add Data</button>
        </div>
        {{-- @endif --}}
        <div class="table-responsive">
		        <table id="table_data" class="table table-striped table-hover" cellspacing="0">
                <thead class="bg-gradient-primary text-white">
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
            </table> 
        </div>
      </div>
    </div>
  </div>
</div>
<!-- content-wrapper ends -->
@endsection
@section('extra_script')
<script type="text/javascript">
$(document).ready(function(){
  $('#table_data').DataTable({
    processing: true,
    serverSide: true,
    ajax: {
        url:'{{ route('datatable_group_menu') }}',
        error:function(){
          var table = $('#table_data').DataTable();
          table.ajax.reload(null, false);
        }
    },
    columnDefs: [

            {
               targets: 0 ,
               className: 'tengah'
            },
            {
               targets: 1,
               className: 'dm_nama'
            },
            {
               targets: 2,
               className: 'tengah gm_id'
            },
            
          ],
    columns: [
      {data: 'id', name: 'id'},
      {data: 'nama', name: 'nama'},
      {data: 'aksi', name: 'aksi'},
    ]
  });
})
</script>
@endsection