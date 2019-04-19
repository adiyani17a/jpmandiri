@extends('main')
@section('title','pegawai')
@section('content')
@include('master.master_bersama.pegawai.tambah_pegawai')
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
        <li class="breadcrumb-item  active" style="color: white" aria-current="page">Master Pegawai</li>
      </ol>
    </nav>
  </div>
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body row">
        <div class="col-md-12 row title" style="padding-bottom: 20px;">
          <div class="col-md-4">
            <span class="card-title"><b>Master Pegawai</b></span>
          </div>
          <div class="pull-right col-md-8 " style="padding-right: 0px;">
            @if (Auth::user()->akses('master pegawai','tambah') == true)
              <button type="button" class="btn btn-info btn_modal btn-sm pull-right" data-toggle="modal" data-target="#modal_bispro"><i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah Data</button>
            @endif
          </div>
        </div>
        <div class="form-group col-md-4" style="padding-bottom: 20px;padding-left: 0px;">
          <label>Bagian</label>
          <select onchange="table_append()" class="filter_bagian select2 form-control form-control-sm">
            <option value="">Tampilkan Semua</option>
            <option value="AKADEMIK">AKADEMIK</option>
            <option value="NON AKADEMIK">NON AKADEMIK</option>
          </select>
        </div>
        <div class="col-md-12 row">
          <div class="form-group col-md-9 row">
            <span>Menampilkan&nbsp;&nbsp;</span>
            <div class="col-xs-3">
              <select onchange="table_append()" class="filter_showing select2 form-control form-control-sm">
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
              <input type="text" placeholder="Cari" value="" class="form-control filter_nama form-control-sm search-laravel" onkeyup="table_append()">
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
  $(document).ready(function() {
      table_append();
      $('[data-toggle="tooltip"]').tooltip()
      $('.dropify').dropify();
      $('.tanggal_lahir').datepicker({
        format:'yyyy-mm-dd'
      });
  });

  function table_append() {
      $.ajax({
          url: '{{ route('datatable_pegawai') }}?page=' + page,
          type: 'get',
          data: {
              filter_bagian: function() {
                  return $('.filter_bagian option:selected').val()
              },
              filter_nama: function() {
                  return $('.filter_nama').val()
              },
              filter_showing: function() {
                  return $('.filter_showing option:selected').val()
              }
          },
          success: function(data) {
              $('.table_append').html(data);
              $('.page-link').not(':last').not(':eq(0)').addClass('direct');
              $('.page-link').eq(0).addClass('previous');
              $('.page-link').last().addClass('next');
              $('.page-link').removeAttr('href');
          },
          error: function() {
              table_append();
          }
      });
  }




  $('.btn_modal').click(function() {
      $('.clean').val('');
      $('.created_by').val('{{ Auth::user()->id }}');
      $('.updated_by').val('{{ Auth::user()->id }}');
      $('.option').val('').trigger('change');
      $(".dropify-clear").trigger("click");
      inputReady = 1;
  })

  function edit(id) {
      $.ajax({
          url: '{{ route('edit_pegawai') }}',
          type: 'get',
          data: {
              id
          },
          dataType: 'json',
          success: function(data) {
              if (data.status == 1) {
                  $('.clean').val('');
                  $('.id').val(data.data.id);
                  $('.nama').val(data.data.nama);
                  $('.nip').val(data.data.nip);
                  $('.bagian').val(data.data.bagian).trigger('change');
                  $('.gelar_awal').val(data.data.gelar_awal);
                  $('.gelar_akhir').val(data.data.gelar_akhir);
                  $('.panggilan').val(data.data.panggilan);
                  $('.jenis_kelamin').val(data.data.jenis_kelamin).trigger('change');
                  $('.tempat_lahir').val(data.data.tempat_lahir);
                  $('.tanggal_lahir').val(data.data.tanggal_lahir);
                  $('.status_menikah').val(data.data.status_menikah).trigger('change');
                  $('.agama').val(data.data.agama).trigger('change');
                  $('.nomor_identitas').val(data.data.nomor_identitas);
                  $('.alamat').val(data.data.alamat);
                  $('.telpon').val(data.data.telpon);
                  $('.email').val(data.data.email);
                  $('.keterangan').val(data.data.keterangan);
                  $('.updated_by').val(data.data.updated_by);

                  var url = '{{ asset('storage/uploads/pegawai/original') }}/'+data.data.foto;
                  var imagenUrl = url;
                  var drEvent = $('.dropify').dropify({
                    defaultFile: imagenUrl,
                  });
                  drEvent = drEvent.data('dropify');
                  drEvent.resetPreview();
                  drEvent.clearElement();
                  drEvent.settings.defaultFile = imagenUrl;
                  drEvent.destroy();
                  drEvent.init();
                  $('.wajib').removeClass('error');
                  $('#modal_bispro').modal('show');
                  inputReady = 1;
              }
          },
          error: function() {
              iziToast.warning({
                  icon: 'fa fa-times',
                  message: 'Terjadi Kesalahan!',
                  position: 'topRight'
              });
          }
      });
  }

  function ubahStatus(child,id) {
      var status = $(child).is(':checked');
      $.ajax({
          url: '{{ route('ubah_status_pegawai') }}',
          type: 'get',
          data: {
              status,
              id
          },
          success: function(data) {
            if (data.status == '1') {
                iziToast.success({
                    icon: 'fa fa-check',
                    message: data.pesan,
                    position: 'topRight'
                });
            }else{
                iziToast.warning({
                    icon: 'fa fa-times',
                    message: data.pesan,
                    position: 'topRight'
                });
            }
          },
          error: function() {
              ubahStatus(child,id);
          }
      });
  }

  $('.simpan').click(function() {
      var input = $('.tabel_modal :input').length;
      var validator = [];
      var validator_name = [];

      $('.wajib').each(function() {
          if ($(this).val() == '') {
              $(this).addClass('error');
              validator.push(0);
          }
      })

      $('.option').each(function() {
          if ($(this).val() == '') {
              var par = $(this).parents('td');
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
              position: 'topRight'
          });

          return false;
      }

      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      if (inputReady == 1) {
          // inputReady = 0;

          var form  = $('#save');
          var formdata = false;
          if (window.FormData){
              formdata = new FormData(form[0]);
          }

          $.ajax({
              url: '{{ route('simpan_pegawai') }}',
              type: 'post',
              data: formdata ? formdata : form.serialize(),
              dataType: 'json',
              processData: false,
              contentType: false,
              success: function(data) {
                  if (data.status == 0) {
                      iziToast.warning({
                          icon: 'fa fa-times',
                          title: 'Nama',
                          message: data.pesan,
                          position: 'topRight'
                      });
                  } else if (data.status == 1) {
                      iziToast.success({
                          icon: 'fa fa-save',
                          title: 'Berhasil',
                          message: data.pesan,
                          position: 'topRight'
                      });
                  } else {
                      iziToast.success({
                          icon: 'fa fa-pencil',
                          title: 'Berhasil',
                          message: data.pesan,
                          position: 'topRight'
                      });
                      $('#modal_bispro').modal('hide');
                  }


                  table_append();
                  $('.clean').val('');
                  $('.clean').val('').trigger('change');
              },
              error: function() {
                  iziToast.warning({
                      icon: 'fa fa-times',
                      message: 'Terjadi Kesalahan!',
                      position: 'topRight'
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
                  function(instance, toast) {

                      $.ajaxSetup({
                          headers: {
                              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                          }
                      });

                      $.ajax({
                          url: '{{ route('hapus_pegawai') }}',
                          type: 'get',
                          data: {
                              id
                          },
                          dataType: 'json',
                          success: function(data) {
                              if (data.status == 0) {
                                  iziToast.warning({
                                      icon: 'fa fa-times',
                                      title: 'Nama',
                                      message: data.pesan,
                                      position: 'topRight'
                                  });
                              } else if (data.status == 1) {
                                  iziToast.warning({
                                      icon: 'fa fa-trash',
                                      title: 'Berhasil',
                                      message: data.pesan,
                                      position: 'topRight'
                                  });
                                  $('#modal_bispro').modal('hide');
                              } else {
                                  iziToast.warning({
                                      icon: 'fa fa-pencil',
                                      title: 'Berhasil',
                                      message: data.pesan,
                                      position: 'topRight'
                                  });
                              }

                              table_append();
                              $('.clean').val('');
                          },
                          error: function() {
                              iziToast.warning({
                                  icon: 'fa fa-times',
                                  message: 'Terjadi Kesalahan!',
                                  position: 'topRight'
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
                  function(instance, toast) {
                      instance.hide({
                          transitionOut: 'fadeOutUp'
                      }, toast);
                  }
              ]
          ]
      });
  }

  function cetak(id) {
    window.open("{{ route('cetak_pegawai') }}?id="+id, "myWindow", 'width=600,height=800');
  }

</script>
@endsection