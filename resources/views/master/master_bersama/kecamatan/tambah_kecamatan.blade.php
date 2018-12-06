<!-- Modal -->
<div id="modal_bispro" class="modal fade" role="dialog">
  <div class="modal-dialog modal-m">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header bg-gradient-primary">
        <h4 class="modal-title text-light">Form Kecamatan</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="row">
          <table class="table tabel_modal">
            <tr>
              <th>Nama</th>
              <td>
                <input type="text" name="nama" class="nama form-control form-control-sm clean wajib">
                <input type="hidden" name="id" class="id clean" >
                <input type="hidden" name="created_by" class="created_by" >
                <input type="hidden" name="updated_by" class="updated_by" >
                {{ csrf_field() }}
              </td>
            </tr>
            <tr>
              <td>Kota</td>
              <td>
                <select name="kota_id" class="kota_id option select2 form-control form-control-sm">
                  <option value="">Pilih - Kota</option>
                  @foreach($kota as $val)
                  <option value="{{ $val->id }}">{{ $val->nama }}</option>
                  @endforeach
                </select>
              </td>
            </tr>
          </table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-gradient-primary simpan">Save Data</button>
        <button type="button" class="btn btn-gradient-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>