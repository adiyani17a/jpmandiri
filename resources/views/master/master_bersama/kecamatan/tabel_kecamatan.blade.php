<table id="table_data" class="table table-bordered" cellspacing="0" >
  <thead class="bg-gradient-primary text-white">
    <th class="text-center">No</th>
    <th class="text-center">Nama</th>
    <th class="text-center">Provinsi</th>
    <th class="text-center">Kota</th>
    <th class="text-center">Aksi</th>
  </thead>
  <tbody>
    @foreach ($data as $i => $d)
      <tr>
        <td align="center" width="50px">{{ $i + $data->firstItem()}}</td>
        <td>{{ $d->nama}}</td>
        <td>{{ $d->kota->provinsi->nama}}</td>
        <td>{{ $d->kota->nama}}</td>
        <td align="center">
          @if (Auth::user()->akses('master kecamatan','ubah'))
            <div class="btn-group">
              <button type="button" onclick="edit('{{ $d->id }}')" class="btn btn-info btn-sm" title="edit">
                <label class="fa fa-pencil"></label>
              </button>
          @endif
          @if (Auth::user()->akses('master kecamatan','hapus'))
              <button type="button" onclick="hapus('{{ $d->id }}')" class="btn btn-danger btn-sm" title="hapus">
                <label class="fa fa-trash"></label>
              </button>
            </div>  
          @endif
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