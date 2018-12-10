<!-- Modal -->
<div id="modal_bispro" class="modal fade" role="dialog">
  <div class="modal-dialog modal-md">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header bg-gradient-primary">
        <h4 class="modal-title text-light">Form Group Menu</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <table class="table tabel_modal">
              <tr>
                <th>Kode</th>
                <td>
                  <input type="text" name="kode" class="kode form-control clean wajib huruf_besar">
                  <input type="hidden" name="id" class="id clean" >
                  <input type="hidden" name="created_by" class="created_by" >
                  <input type="hidden" name="updated_by" class="updated_by" >
                  {{ csrf_field() }}
                </td>
              </tr>
              <tr>
                <th>Nama</th>
                <td>
                  <input type="text" name="nama" class="nama form-control clean wajib huruf_besar">
                </td>
              </tr>
              <tr>
                <th>Alamat</th>
                <td>
                  <input type="text" name="alamat" class="alamat form-control clean wajib huruf_besar">
                </td>
              </tr>
                <th>Telpon</th>
                <td>
                  <input type="text" name="telpon" class="telpon wajib clean hanya_angka form-control huruf_besar">
                </td>
              </tr>
              <tr>
                <th>Fax</th>
                <td>
                  <input type="text" name="fax" class="fax wajib clean hanya_angka form-control huruf_besar">
                </td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-gradient-primary simpan">Save Data</button>
        <button type="button" class="btn btn-gradient-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>