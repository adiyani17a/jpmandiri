@extends('main')
@section('title','perusahaan')
@section('content')
@include('setting.perusahaan.tambah_perusahaan')
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
        <li class="breadcrumb-item  active" style="color: white" aria-current="page">Master Perusahaan</li>
      </ol>
    </nav>
  </div>
	<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="col-md-12 row title" style="padding-bottom: 20px;">
          <div class="col-md-4">
            <span class="card-title"><b>Master Perusahaan</b></span>
          </div>
          <div class="pull-right col-md-8 " style="padding-right: 0px;">
            <label class="switch pull-right">
              <input type="checkbox" class="checkbox" checked="">
              <span class="slider round"></span>
            </label>
          </div>
        </div>
        <div class="table-responsive">
          <form id="simpan">
            @if ($data != null)
              <table class="table tabel_modal disabled">
                <tr>
                  <th>Nama</th>
                  <td colspan="3">
                    <input type="text" value="{{ $data->nama or null }}" placeholder="Nama perusahaan" name="nama" class="nama form-control clean wajib">
                    <input type="hidden" name="id" class="id clean" value="{{ $data->id or null }}">
                    <input type="hidden" name="created_by" class="created_by" value="{{ $data->created_by or null }}">
                    <input type="hidden" name="updated_by" class="updated_by" value="{{ $data->updated_by or null }}">
                    {{ csrf_field() }}
                  </td>
                </tr>
                <tr>
                  <th>Alamat</th>
                  <td colspan="3">
                    <input value="{{ $data->alamat or null }}" type="text" placeholder="Alamat perusahaan" name="alamat" class="alamat form-control clean wajib">
                  </td>
                </tr>
                <tr>
                  <th>Kota</th>
                  <td colspan="3">
                    <input value="{{ $data->kota or null }}" type="text" placeholder="Kota perusahaan" name="kota" class="kota form-control clean wajib">
                  </td>
                </tr>
                <tr>
                  <th>Telepon</th>
                  <td>
                    <input value="{{ $data->telepon or null }}" type="text" placeholder="Telepon perusahaan" name="telepon" class="telepon form-control clean wajib">
                  </td>
                  <th>Fax</th>
                  <td>
                    <input value="{{ $data->fax or null }}" type="text" placeholder="Fax perusahaan" name="fax" class="fax form-control clean wajib">
                  </td>
                </tr>
                <tr>
                  <td colspan="2">
                    <h6>Logo</h6>
                    <div class="file-upload">
                      <div class="file-select">
                        <div class="file-select-button" id="fileName">Image</div>
                        <div class="file-select-name" id="noFile">Choose Image...</div> 
                        <input type="file" name="image" onchange="loadFile(event)" id="chooseFile">
                      </div>
                    </div>
                  </td>
                  <td colspan="2">
                    <div class="preview_td pull-right">
                        <img style="width: 100px;height: 100px;border:1px solid pink" id="output" >
                    </div>
                  </td>
                </tr>
                <tr>
                  <td colspan="4"><button type="button" class="btn btn-primary pull-right simpan"><i class="fa fa-save"></i> Simpan</button></td>
                </tr>
              </table>
            @else
              <table class="table tabel_modal disabled">
                <tr>
                  <th>Nama</th>
                  <td colspan="3">
                    <input type="text" value="" placeholder="Nama perusahaan" name="nama" class="nama form-control clean wajib">
                    <input type="hidden" name="id" class="id clean" value="">
                    <input type="hidden" name="created_by" class="created_by" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="updated_by" class="updated_by" value="{{ Auth::user()->id }}">
                    {{csrf_field() }}
                  </td>
                </tr>
                <tr>
                  <th>Alamat</th>
                  <td colspan="3">
                    <input value="" type="text" placeholder="Alamat perusahaan" name="alamat" class="alamat form-control clean wajib">
                  </td>
                </tr>
                <tr>
                  <th>Kota</th>
                  <td colspan="3">
                    <input value="" type="text" placeholder="Kota perusahaan" name="kota" class="kota form-control clean wajib">
                  </td>
                </tr>
                <tr>
                  <th>Telepon</th>
                  <td>
                    <input value="" type="text" placeholder="Telepon perusahaan" name="telepon" class="telepon form-control clean wajib">
                  </td>
                  <th>Fax</th>
                  <td>
                    <input value="" type="text" placeholder="Fax perusahaan" name="fax" class="fax form-control clean wajib">
                  </td>
                </tr>
                <tr>
                  <td colspan="2">
                    <h6>Logo</h6>
                    <div class="file-upload">
                      <div class="file-select">
                        <div class="file-select-button" id="fileName">Image</div>
                        <div class="file-select-name" id="noFile">Choose Image...</div> 
                        <input type="file" name="image" onchange="loadFile(event)" id="chooseFile">
                      </div>
                    </div>
                  </td>
                  <td colspan="2">
                    <div class="preview_td pull-right">
                        <img style="width: 100px;height: 100px;border:1px solid pink" id="output" >
                    </div>
                  </td>
                </tr>
                <tr>
                  <td colspan="4"><button type="button" class="btn btn-primary pull-right simpan"><i class="fa fa-save"></i> Simpan</button></td>
                </tr>
              </table>
            @endif
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- content-wrapper ends -->
@endsection
@section('extra_script')
<script type="text/javascript">
var inputReady = 1;

$('.btn_modal').click(function(){
  $('.clean').val('');
  $('.created_by').val('{{ Auth::user()->id }}');
  $('.updated_by').val('{{ Auth::user()->id }}');
  inputReady = 1;
})

$('.checkbox').change(function(){
  console.log($(this).is(':checked'));
  if ($(this).is(':checked') == true) {
    $('.tabel_modal').addClass('disabled');
  }else if ($(this).is(':checked') == false){
    $('.tabel_modal').removeClass('disabled');
  }
});

function edit(id) {
  $.ajax({
      url:'{{ route('edit_perusahaan') }}',
      type:'get',
      data:{id},
      dataType:'json',
      success:function(data){
        if (data.status == 1) {
          $('.id').val(data.data.id);
          $('.updated_by').val(data.data.updated_by);
          $('.nama').val(data.data.nama);
          $('.keterangan').val(data.data.keterangan);
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
    // inputReady = 0;
    var formdata = new FormData();  
    formdata = $('#simpan');
    console.log(formdata);
    formdata.append( 'image', $('#chooseFile')[0].files[0]);
    $.ajax({
        url:'{{ route('simpan_perusahaan') }}',
        type:'post',
        data:formdata,
        dataType:'json',
        success:function(data){
          if (data.status == 0) {
            iziToast.warning({
              icon: 'fa fa-times',
              title: 'Terjadi kesalahan',
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
          table.ajax.reload(null, false);
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

$('#chooseFile').bind('change', function () {
  var filename = $("#chooseFile").val();
  var fsize = $('#chooseFile')[0].files[0].size;
  if(fsize>1048576) //do something if file size more than 1 mb (1048576)
  {
      return false;
  }
  if (/^\s*$/.test(filename)) {
    $(".file-upload").removeClass('active');
    $("#noFile").text("No file chosen..."); 
  }
  else {
    $(".file-upload").addClass('active');
    $("#noFile").text(filename.replace("C:\\fakepath\\", "")); 
  }
});

var loadFile = function(event) {
  var fsize = $('#chooseFile')[0].files[0].size;
  if(fsize>1048576) //do something if file size more than 1 mb (1048576)
  {
      iziToast.warning({
        icon: 'fa fa-times',
        message: 'File Is To Big!',
      });
      return false;
  }
  var reader = new FileReader();
  reader.onload = function(){
    var output = document.getElementById('output');
    output.src = reader.result;
  };
  reader.readAsDataURL(event.target.files[0]);
};


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
                url:'{{ route('hapus_perusahaan') }}',
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
                  table.ajax.reload(null, false);
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