@extends('main')
@section('title','Group Akun')
@section('content')
@include('master.master_akuntansi.group_akun.tambah_group_akun')
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
        <li class="breadcrumb-item  active" style="color: white" aria-current="page">Setting group_akun</li>
      </ol>
    </nav>
  </div>
	<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="col-md-12 row title" style="padding-bottom: 20px;">
          <div class="col-md-4">
            <span class="card-title"><b>Setting group_akun</b></span>
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
    table_append();
  });

  function table_append() {
    $.ajax({
        url:'{{ route('datatable_group_akun') }}?page='+page,
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
        url:'{{ route('edit_group_akun') }}',
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
          url:'{{ route('simpan_group_akun') }}',
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
                  url:'{{ route('hapus_group_akun') }}',
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