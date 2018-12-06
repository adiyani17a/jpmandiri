@extends('main')
@section('title','Desa')
@section('content')
@include('master.master_bersama.desa.tambah_desa')
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
        <li class="breadcrumb-item" style="color: white">Master</li>
        <li class="breadcrumb-item  active" style="color: white" aria-current="page">Master Desa</li>
      </ol>
    </nav>
  </div>
	<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body row">
        <div class="col-md-12 row title" style="padding-bottom: 20px;">
          <div class="col-md-4">
            <span class="card-title"><b>Master Desa</b></span>
          </div>
          <div class="pull-right col-md-8 " style="padding-right: 0px;">
            <button type="button" class="btn btn-info btn_modal btn-sm pull-right" data-toggle="modal" data-target="#modal_bispro"><i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah Data</button>
          </div>
        </div>
        <div class="form-group col-md-2" style="padding-bottom: 20px;">
          <label>Filter Kecamatan</label>
          <select onchange="selectChange()" class="filter_kecamatan select2 form-control form-control-sm">
            <option value="">Semua - Kecamatan</option>
            @foreach($kecamatan as $val)
            <option value="{{ $val->id }}">{{ $val->nama }}</option>
            @endforeach
          </select>
        </div>
        <div class="col-md-12 row">
          <div class="form-group col-md-9 row">
            <span>Menampilkan&nbsp;&nbsp;</span>
            <div class="col-xs-3">
              <select onchange="selectChange()" class="filter_showing select2 form-control form-control-sm">
                <option value="10">10</option>
                <option value="20">20</option>
                <option value="50">50</option>
                <option value="100">100</option>
                <option value="1000">1000</option>
              </select>
            </div>
            <span>&nbsp;&nbsp;data</span>
          </div>
          <div class=" col-md-3 row" style="padding-bottom: 10px;">
            <div class="col-md-12 col-xs-2 pull-right">
              <input type="text" placeholder="Cari" value="" class="form-control filter_nama form-control-sm search-laravel" onkeyup="cari()">
            </div>
          </div>
        </div>
        <div class="table-responsive table_append">
	        
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
  table_append();
});

function table_append() {
  $.ajax({
      url:'{{ route('datatable_desa') }}?page='+page,
      type:'get',
      data:{provinsi_id: function() { return $('.filter_provinsi option:selected').val() },
            kecamatan_id: function() { return $('.filter_kecamatan option:selected').val() },
            filter_nama: function() { return $('.filter_nama').val() },
            filter_showing: function() { return $('.filter_showing option:selected').val() }},
      success:function(data){
        $('.table_append').html(data);
        $('.page-link').not(':last').not(':eq(0)').addClass('direct');
        $('.page-link').eq(0).addClass('previous');
        $('.page-link').last().addClass('next');
        $('.page-link').removeAttr('href');
      },
      error:function(){
        table_append();
      } 
  });
}




$('.btn_modal').click(function(){
  $('.clean').val('');
  $('.created_by').val('{{ Auth::user()->id }}');
  $('.updated_by').val('{{ Auth::user()->id }}');
  $('.option').val('').trigger('change');
  inputReady = 1;
})

function edit(id) {
  $.ajax({
      url:'{{ route('edit_desa') }}',
      type:'get',
      data:{id},
      dataType:'json',
      success:function(data){
        if (data.status == 1) {
          $('.clean').val('');
          $('.id').val(data.data.id);
          $('.updated_by').val(data.data.updated_by);
          $('.nama').val(data.data.nama);
          $('.keterangan').val(data.data.keterangan);
          $('.kecamatan_id').val(data.data.kecamatan_id).trigger('change');
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
        url:'{{ route('simpan_desa') }}',
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
                url:'{{ route('hapus_desa') }}',
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

                  table_append();
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