@extends('main')
@section('title','Cabang')
@section('content')
@include('master.master_bersama.cabang.tambah_cabang')
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
        <li class="breadcrumb-item  active" style="color: white" aria-current="page">Setting Cabang</li>
      </ol>
    </nav>
  </div>
	<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="col-md-12 row title" style="padding-bottom: 20px;">
          <div class="col-md-4">
            <span class="card-title"><b>Setting Cabang</b></span>
          </div>
          <div class="pull-right col-md-8 " style="padding-right: 0px;">
            <button type="button" class="btn btn-info btn_modal btn-sm pull-right" data-toggle="modal" data-target="#modal_bispro"><i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah Data</button>
          </div>
        </div>
        <div class="table-responsive" s>
	        <table id="table_data" class="table table-bordered" cellspacing="0" >
            <thead class="bg-gradient-primary text-white head_table">
              <th>No</th>
              <th>Kode</th>
              <th>Nama</th>
              <th>Alamat</th>
              <th>Telpon</th>
              <th>Fax</th>
              <th>Kota</th>
              <th>Dibuat</th>
              <th class="text-center">Aksi</th>
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
        url:'{{ route('datatable_cabang') }}',
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
               className: 'huruf_besar'
            },
            {
               targets: 5,
               className: 'huruf_besar'
            },
            {
               targets: 6,
               className: 'huruf_besar'
            },
            {
               targets: 7,
               className: 'tengah huruf_besar'
            }
          ],
    columns: [
      {data: 'id', name: 'id'},
      {data: 'kode', name: 'kode'},
      {data: 'nama', name: 'nama'},
      {data: 'alamat', name: 'alamat'},
      {data: 'telpon', name: 'telpon'},
      {data: 'fax', name: 'fax'},
      {data: 'kota', name: 'kota'},
      {data: 'create', name: 'create'},
      {data: 'aksi', name: 'aksi'},
    ]
  });
})


$('.btn_modal').click(function(){
  $('.clean').val('');
  $('.created_by').val('{{ Auth::user()->id }}');
  $('.updated_by').val('{{ Auth::user()->id }}');
  $('.kode').prop('readonly',false);
  $('.option').val('').trigger('change');
  inputReady = 1;
})

function edit(id) {
  $.ajax({
      url:'{{ route('edit_cabang') }}',
      type:'get',
      data:{id},
      dataType:'json',
      success:function(data){
        if (data.status == 1) {
          $('.clean').val('');
          $('.id').val(data.data.id);
          $('.kode').val(data.data.kode);
          $('.kode').prop('readonly',true);
          $('.updated_by').val(data.data.updated_by);
          $('.nama').val(data.data.nama);
          $('.keterangan').val(data.data.keterangan);
          $('.kota_id').val(data.data.kota_id).trigger('change');
          $('.telpon').val(data.data.telpon);
          $('.fax').val(data.data.fax);
          $('.alamat').val(data.data.alamat);
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
        url:'{{ route('simpan_cabang') }}',
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
          }

          $('.clean').val('');
          $('#modal_bispro').modal('hide');

          var table = $('#table_data').DataTable();
          table.ajax.reload(null,false);
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
                url:'{{ route('hapus_cabang') }}',
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