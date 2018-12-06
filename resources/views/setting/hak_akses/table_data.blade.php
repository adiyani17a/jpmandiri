 @foreach($group_menu as $i=>$g)
  <div class="panel-default">
    <a data-toggle="collapse" href="#collapse{{ $i }}">
    <div class="panel-heading bg-gradient-primary panel-bg panel-top" style="border: 1px solid #e5e5e5;color:white;padding-left: 15px;">
      <h4 class="panel-title">
        {{ $g->nama }}
      </h4>
    </div>
    </a>
    <div id="collapse{{ $i }}" class="panel-collapse collapse">
      <div class="panel-body" style="border: 1px solid #e5e5e5;">
        <div class="table-responsive">
        <table class="table table-hover table-bordered" width="100%" cellspacing="0">
          <thead class="bg-gradient-danger">
            <tr class="text-light">
              <th width="500">Nama Menu</th>
              <th>Aksi</th>
              <th>Tambah</th>
              <th>Ubah</th>
              <th>Sekolah</th>
              <th>Global</th>
              <th>Print</th>
              <th>Hapus</th>
              <th>Validasi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($data as $c=>$val)
            @if($val->daftar_menus->group_menu->id == $g->id)
            <tr>
              <td>
                {{ $val->daftar_menus->nama }}
                <input class="penanda" value="{{ $val->daftar_menus->nama }}" name="penanda" type="hidden" />
              </td>
              <td align="center">
                <div class="form-check">
                  <label class="form-check-label">
                    <input @if($val->aktif == 1) checked="" @endif type="checkbox" class="aktif form-check-input">
                  <i class="input-helper"></i></label>
                </div>
              </td>
              <td align="center">
                <div class="form-check">
                  <label class="form-check-label">
                    <input @if($val->tambah == 1) checked="" @endif type="checkbox" class="tambah form-check-input">
                  <i class="input-helper"></i></label>
                </div>
              </td>
              <td align="center">
                <div class="form-check">
                  <label class="form-check-label">
                    <input @if($val->ubah == 1) checked="" @endif type="checkbox" class="ubah form-check-input">
                  <i class="input-helper"></i></label>
                </div>
              </td>
              <td align="center">
                <div class="form-check">
                  <label class="form-check-label">
                    <input @if($val->hapus == 1) checked="" @endif type="checkbox" class="hapus form-check-input">
                  <i class="input-helper"></i></label>
                </div>
              </td>
              <td align="center">
                <div class="form-check">
                  <label class="form-check-label">
                    <input @if($val->cabang == 1) checked="" @endif type="checkbox" class="cabang form-check-input">
                  <i class="input-helper"></i></label>
                </div>
              </td>
              <td align="center">
                <div class="form-check">
                  <label class="form-check-label">
                    <input @if($val->global == 1) checked="" @endif type="checkbox" class="global form-check-input">
                  <i class="input-helper"></i></label>
                </div>
              </td>
              <td align="center">
                <div class="form-check">
                  <label class="form-check-label">
                    <input @if($val->print == 1) checked="" @endif type="checkbox" class="print form-check-input">
                  <i class="input-helper"></i></label>
                </div>
              </td>
              <td align="center">
                <div class="form-check">
                  <label class="form-check-label">
                    <input @if($val->validasi == 1) checked="" @endif type="checkbox" class="validasi form-check-input">
                  <i class="input-helper"></i></label>
                </div>
              </td>
            </tr>
            @endif
            @endforeach
          </tbody>
        </table>
        </div>
      </div>
    </div>
  </div>
@endforeach

<script type="text/javascript">
  $('.aktif').change(function(){
    var jabatan_id = $('.jabatan_id').val();
    var par = $(this).parents('tr');
    var tanda = $(par).find('.penanda').val();
    var aktif = $(this).is(':checked');
    $.ajax({
      url:'{{ route('centang') }}',
      data:{jabatan_id,tanda,aktif},
      success:function(data){
        
      }
    });

  })

  $('.tambah').change(function(){
    var jabatan_id = $('.jabatan_id').val();
    var par = $(this).parents('tr');  
    var tanda = $(par).find('.penanda').val();
    var tambah = $(this).is(':checked');
    $.ajax({
      url:'{{ route('centang') }}',
      data:{jabatan_id,tanda,tambah},
      success:function(data){
        
      }
    });
  })

  $('.ubah').change(function(){
    var jabatan_id = $('.jabatan_id').val();
    var par = $(this).parents('tr');  
    var tanda = $(par).find('.penanda').val();
    var ubah = $(this).is(':checked');
    $.ajax({
      url:'{{ route('centang') }}',
      data:{jabatan_id,tanda,ubah},
      success:function(data){
        
      }
    });
  })

  $('.print').change(function(){
    var jabatan_id = $('.jabatan_id').val();
    var par = $(this).parents('tr');  
    var tanda = $(par).find('.penanda').val();
    var print = $(this).is(':checked');
    $.ajax({
      url:'{{ route('centang') }}',
      data:{jabatan_id,tanda,print},
      success:function(data){
        
      }
    });
  })

  $('.hapus').change(function(){
    var jabatan_id = $('.jabatan_id').val();
    var par = $(this).parents('tr');  
    var tanda = $(par).find('.penanda').val();
    var hapus = $(this).is(':checked');
    $.ajax({
      url:'{{ route('centang') }}',
      data:{jabatan_id,tanda,hapus},
      success:function(data){
        
      }
    });
  })

  $('.cabang').change(function(){
    var jabatan_id = $('.jabatan_id').val();
    var par = $(this).parents('tr');  
    var tanda = $(par).find('.penanda').val();
    var cabang = $(this).is(':checked');
    $.ajax({
      url:'{{ route('centang') }}',
      data:{jabatan_id,tanda,cabang},
      success:function(data){
        
      }
    });
  })

  $('.global').change(function(){
    var jabatan_id = $('.jabatan_id').val();
    var par = $(this).parents('tr');  
    var tanda = $(par).find('.penanda').val();
    var global = $(this).is(':checked');
    $.ajax({
      url:'{{ route('centang') }}',
      data:{jabatan_id,tanda,global},
      success:function(data){
        
      }
    });
  })

  $('.validasi').change(function(){
    var jabatan_id = $('.jabatan_id').val();
    var par = $(this).parents('tr');  
    var tanda = $(par).find('.penanda').val();
    var validasi = $(this).is(':checked');
    $.ajax({
      url:'{{ route('centang') }}',
      data:{jabatan_id,tanda,validasi},
      success:function(data){
        
      }
    });
  })
</script>