<table id="table_data" class="table table-bordered" cellspacing="0" >
  <thead class="bg-gradient-primary text-white">
    <th class="text-center">No</th> 
    <th class="text-center">Foto</th> 
    <th class="text-center">NIP</th>
    <th class="text-center">Nama</th>
    <th class="text-center">Tempat/Tanggal lahir</th>
    <th class="text-center">Status</th>
    <th class="text-center">Aksi</th>
  </thead>
  <tbody>
    @foreach ($data as $i => $d)
      <tr>
        <td align="center" width="50px">{{ $i + $data->firstItem()}}</td>
        <td align="center"><img  onerror="this.src='{{ asset('assets/image/no-image.png') }}';" style="width: 50px;height: 50px;" src="{{ asset('storage/uploads/pegawai/thumbnail') }}/{{ $d->foto }}">   </td>
        <td>{{ $d->nip}}</td>
        <td>{{ $d->nama}}</td>
        <td>{{ $d->tempat_lahir }}, {{ carbon\carbon::parse($d->tanggal_lahir)->format('d F Y') }}</td>
        <td align="center" style="width: 30px;">
          @if (Auth::user()->akses('master pegawai','validasi') == true)
            <div class="form-check">
              <label class="form-check-label">
                <input @if ($d->status == 'Active')
                  checked="" 
                @endif type="checkbox" onclick="ubahStatus(this,'{{ $d->id }}')" class="ubahStatus form-check-input">
              <i class="input-helper"></i></label>
            </div>
          @else
            @if ($d->status =='Active')
              <span class="badge badge-primary">Active</span>
            @else
              <span class="badge badge-danger">Inactive</span>
            @endif
          @endif
        </td>
        <td align="center">
          <div class="btn-group">
            @if (Auth::user()->akses('master pegawai','ubah') == true)
                <button type="button" onclick="edit('{{ $d->id }}')" class="btn btn-info btn-sm" title="edit">
                  <label class="fa fa-pencil"></label>
                </button>
            @endif
            @if (Auth::user()->akses('master pegawai','print') == true)
                <button type="button" onclick="cetak('{{ $d->id }}')" class="btn btn-warning btn-sm" title="cetak">
                  <label class="fa fa-print"></label>
                </button>
            @endif
            @if (Auth::user()->akses('master pegawai','hapus') == true)
                <button type="button" onclick="hapus('{{ $d->id }}')" class="btn btn-danger btn-sm" title="hapus">
                  <label class="fa fa-trash"></label>
                </button>
            @endif
          </div>  
        </td>
      </tr>
    @endforeach
    @if (count($data) == null)
      <tr>
        <td colspan="9999" align="center">Tidak Ada Data</td>
      </tr>
    @endif
    <tr>
      <td colspan="100">
        <div class="row">
          <div class="col-md-8">
            {{ $data->links() }}
          </div>
          <div class="col-md-4 text-right">
           <label>Menampilkan {{ $data->firstItem() }} sampai {{ $data->lastItem() }} dari {{ $data->total() }}</label>
          </div>
        </div>
      </td>
    </tr>
  </tbody>
</table> 