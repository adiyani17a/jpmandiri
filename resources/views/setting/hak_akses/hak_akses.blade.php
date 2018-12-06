@extends('main')
@section('title','Hak Akses')
@section('content')
@include('setting.jabatan.tambah_jabatan')
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
        <li class="breadcrumb-item  active" style="color: white" aria-current="page">Setting Hak Akses</li>
      </ol>
    </nav>
  </div>

  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="col-md-12 col-xs-12 col-xs-12">
          <table class="table">
           <tr>
            <td width="50">Level</td>
             <td>
                <select name="jabatan_id" class="jabatan_id form-control select2" >
                  <option value="0">Pilih - Level</option>
                  @foreach($jabatan as $i)
                  <option value="{{ $i->id }}">{{ $i->nama }}</option>
                  @endforeach
                </select>
             </td>
           </tr>
          </table>
          <div class="content_hak_akses">
           
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- content-wrapper ends -->
@endsection
@section('extra_script')
<script type="text/javascript">
$('.jabatan_id').change(function(){
  var jabatan_id = $(this).val();

  $.ajax({
    url:'{{ route('hak_akses_data') }}',
    data:{jabatan_id},
    success:function(data){
      $('.content_hak_akses').html(data);
    }
  });
})
</script>
@endsection