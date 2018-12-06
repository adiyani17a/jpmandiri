@extends('main')
@section('title','Daftar Menu')
@section('content')
@include('setting.daftar_menu.tambah_daftar_menu')
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
        <li class="breadcrumb-item  active" style="color: white" aria-current="page">Setting Daftar Menu</li>
      </ol>
    </nav>
  </div>
	<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="col-md-12 row title" style="padding-bottom: 20px;">
          <div class="col-md-4">
            <span class="card-title"><b>Setting Daftar Menu</b></span>
          </div>
          <div class="pull-right col-md-8 " style="padding-right: 0px;">
            <button type="button" class="btn btn-info btn_modal btn-sm pull-right" data-toggle="modal" data-target="#modal_bispro"><i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah Data</button>
          </div>
        </div>
        <div class="table-responsive">
	        <table id="table_data" class="table table-bordered" cellspacing="0" >
            <thead class="bg-gradient-primary text-white">
              <th>No</th>
              <th>Nama</th>
              <th>Group Menu</th>
              <th>Keterangan</th>
              <th>Aksi</th>
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
var inputReady = 0;
$(document).ready(function(){
  $('#table_data').DataTable({
    processing: true,
    serverSide: true,
    ajax: {
        url:'{{ route('datatable_daftar_menu') }}',
        error:function(){
          var table = $('#table_data').DataTable();
          table.ajax.reload(null, false);
        }
    },
    columnDefs: [

            {
               targets: 0 ,
               className: 'tengah huruf_besar'
            },
            {
               targets: 1 ,
               className: 'huruf_besar'
            },
            {
               targets: 2,
               className: 'huruf_besar'
            },
            {
               targets: 3,
               className: 'huruf_besar'
            },
            {
               targets: 4,
               className: 'tengah huruf_besar'
            }
          ],
    columns: [
      {data: 'id', name: 'id'},
      {data: 'nama', name: 'nama'},
      {data: 'group_menu', name: 'group_menu'},
      {data: 'keterangan', name: 'keterangan'},
      {data: 'aksi', name: 'aksi'},
    ]
  });
})



$('.btn_modal').click(function(){
  $('.clean').val('');
  $('.created_by').val('{{ Auth::user()->id }}');
  $('.updated_by').val('{{ Auth::user()->id }}');
  inputReady = 1;
})

function edit(id) {
  $.ajax({
      url:'{{ route('edit_daftar_menu') }}',
      type:'get',
      data:{id},
      dataType:'json',
      success:function(data){
        if (data.status == 1) {
          $('.id').val(data.data.id);
          $('.updated_by').val(data.data.updated_by);
          $('.nama').val(data.data.nama);
          $('.keterangan').val(data.data.keterangan);
          $('.group_menu_id').val(data.data.group_menu_id).trigger('change');
          $('.wajib').removeClass('error');
          $('#modal_bispro').modal('show'); 
          inputReady = 1;
        }
      },
      error:function(){
        iziToast.warning({
          icon: 'fa fa-times',
          message: 'Terjadi Kesalahan!',
          position:'topRight'
        });
      } 
  });
}

$('.simpan').click(function(){
  var input =  $('.tabel_modal :input').length;
  var validator = [];
  var validator_name = [];

  $('.wajib').each(function(){
    if ($(this).val() == '') {
      $(this).addClass('error');
      validator.push(0);
    }
  })

  $('.option').each(function(){
    if ($(this).val() == '') {
      var par =$(this).parents('td');
      par.find('span').eq(0).addClass('error');
      validator.push(0);
    }
  })

  var index = validator.indexOf(0);
  if (index != -1) {
    iziToast.warning({
        icon: 'fa fa-times',
        title: 'Terjadi Kesalahan',
        message: 'Semua Inputan Harus Diisi',
        position:'topRight'
    });

    return false;
  }

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
  if (inputReady == 1) {
    inputReady = 0;
    $.ajax({
        url:'{{ route('simpan_daftar_menu') }}',
        type:'post',
        data:$('.tabel_modal :input').serialize(),
        dataType:'json',
        success:function(data){
          if (data.status == 0) {
            iziToast.warning({
              icon: 'fa fa-times',
              title: 'Nama',
              message: data.pesan,
              position:'topRight'
            });
          }else if(data.status == 1){
            iziToast.success({
              icon: 'fa fa-save',
              title: 'Berhasil',
              message: data.pesan,
              position:'topRight'
            });
          }else{
            iziToast.success({
              icon: 'fa fa-pencil',
              title: 'Berhasil',
              message: data.pesan,
              position:'topRight'
            });
            $('#modal_bispro').modal('hide');
          }

          var table = $('#table_data').DataTable();
          table.ajax.reload();
          $('.clean').val('');
        },
        error:function(){
          iziToast.warning({
            icon: 'fa fa-times',
            message: 'Terjadi Kesalahan!',
            position:'topRight'
          });
        } 
    });
  }
});

function hapus(id) {
  iziToast.show({
    overlay: true,
    close: false,
    timeout: 20000, 
    color: 'dark',
    icon: 'fa fa-question-circle',
    title: 'Hapus Data!',
    message: 'Apakah Anda Yakin ?!',
    position: 'center',
    progressBarColor: 'rgb(0, 255, 184)',
    buttons: [
    [
        '<button style="background-color:#32CD32;">Hapus</button>',
        function (instance, toast) {

          $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url:'{{ route('hapus_daftar_menu') }}',
                type:'get',
                data:{id},
                dataType:'json',
                success:function(data){
                  if (data.status == 0) {
                    iziToast.warning({
                      icon: 'fa fa-times',
                      title: 'Nama',
                      message: data.pesan,
                      position:'topRight'
                    });
                  }else if(data.status == 1){
                    iziToast.warning({
                      icon: 'fa fa-trash',
                      title: 'Berhasil',
                      message: data.pesan,
                      position:'topRight'
                    });
                    $('#modal_bispro').modal('hide');
                  }else{
                    iziToast.warning({
                      icon: 'fa fa-pencil',
                      title: 'Berhasil',
                      message: data.pesan,
                      position:'topRight'
                    });
                  }

                  var table = $('#table_data').DataTable();
                  table.ajax.reload();
                  $('.clean').val('');  
                },
                error:function(){
                  iziToast.warning({
                    icon: 'fa fa-times',
                    message: 'Terjadi Kesalahan!',
                    position:'topRight'
                  });
                }
            });
            instance.hide({
                transitionOut: 'fadeOutUp'
            }, toast);
        }
    ],
    [
        '<button style="background-color:#44d7c9;">Cancel</button>',
        function (instance, toast) {
          instance.hide({
            transitionOut: 'fadeOutUp'
          }, toast);
        }
      ]
    ]
  });
}

</script>
@endsection