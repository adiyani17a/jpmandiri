<!-- Modal -->
<div id="modal_bispro" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header bg-gradient-primary">
        <h4 class="modal-title text-light">Form Data Pegawai</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form id="save">
          <div class="row">
            <div class="col-sm-6">
              <table class="table tabel_modal">
                <tr>
                  <th>Nama</th>
                  <td>
                    <input maxlength="50" type="text" name="nama" class="nama form-control form-control-sm clean wajib" data-toggle="tooltip" data-placement="right" title="Wajib Diisi" type="text">
                    <input type="hidden" name="id" class="id clean" >
                    <input type="hidden" name="created_by" class="created_by clean">
                    <input type="hidden" name="updated_by" class="updated_by clean">
                    {{ csrf_field() }}
                  </td>
                </tr>
                <tr>
                  <th>NIP</th>
                  <td>
                    <input maxlength="20" data-toggle="tooltip" data-placement="right" title="Wajib Diisi" type="text" name="nip" class="nip form-control form-control-sm clean wajib">
                  </td>
                </tr>
                <tr>
                  <th>Bagian</th>
                  <td>
                    <select class="form-control option bagian select2" name="bagian" data-toggle="tooltip" data-placement="right" title="Wajib Diisi" type="text">
                      <option value="">Pilih - Bagian</option>
                      <option value="AKADEMIK">AKADEMIK</option>
                      <option value="NON AKADEMIK">NON AKADEMIK</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <th>Gelar Awal</th>
                  <td>
                    <input type="text" name="gelar_awal" class="gelar_awal form-control form-control-sm clean">
                  </td>
                </tr>
                <tr>
                  <th>Gelar Akhir</th>
                  <td>
                    <input type="text" name="gelar_akhir" class="gelar_akhir form-control form-control-sm clean">
                  </td>
                </tr>
                <tr>
                  <th>Panggilan</th>
                  <td>
                    <input type="text" name="panggilan" class="panggilan form-control form-control-sm clean">
                  </td>
                </tr>
                <tr>
                  <th>Jenis Kelamin</th>
                  <td>
                    <select class="form-control option jenis_kelamin select2 " name="jenis_kelamin" data-toggle="tooltip" data-placement="right" title="Wajib Diisi" type="text">
                      <option value="">Pilih - Jenis Kelamin</option>
                      <option value="L">LAKI</option>
                      <option value="P">PEREMPUAN</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <th>Tempat Lahir</th>
                  <td>
                    <input maxlength="30" type="text" name="tempat_lahir" class="tempat_lahir form-control form-control-sm clean wajib" data-toggle="tooltip" data-placement="right" title="Wajib Diisi" type="text">
                  </td>
                </tr>
                <tr>
                  <th>Tanggal Lahir</th>
                  <td>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i  style="color: black" class="fa fa-birthday-cake"></i></span>
                      </div>
                      <input type="text" class="form-control tanggal_lahir wajib" placeholder="yyyy-mm-dd" name="tanggal_lahir" aria-label="Username" aria-describedby="basic-addon1" data-toggle="tooltip" data-placement="right" title="Wajib Diisi" type="text">
                    </div>
                  </td>
                </tr>
                <tr>
                  <th>Status Menikah</th>
                  <td>
                    <select class="form-control option status_menikah select2" name="status_menikah" data-toggle="tooltip" data-placement="right" title="Wajib Diisi" type="text">
                      <option value="">Pilih - Status</option>
                      <option value="SUDAH">SUDAH</option>
                      <option value="BELUM">BELUM</option>
                    </select>
                  </td>
                </tr>
              </table>
            </div>
            <div class="col-sm-6">
              <table class="table tabel_modal">
                <tr>
                  <th>Agama</th>
                  <td>
                    <select class="form-control option agama select2" name="agama" data-toggle="tooltip" data-placement="right" title="Wajib Diisi" type="text">
                      <option value="">Pilih - Agama</option>
                      @foreach (agama() as $i => $d)
                        <option value="{{ $d->id }}">{{ $d->nama }}</option>
                      @endforeach
                    </select>
                  </td>
                </tr>
                <tr>
                  <th>Nomor Identitas</th>
                  <td>
                    <input maxlength="30" type="text" name="nomor_identitas" class="nomor_identitas form-control form-control-sm clean wajib" data-toggle="tooltip" data-placement="right" title="Wajib Diisi" type="text">
                  </td>
                </tr>
                <tr>
                  <th>Alamat</th>
                  <td>
                    <textarea data-toggle="tooltip" data-placement="right" title="Wajib Diisi" type="text" name="alamat" class="alamat form-control form-control-sm clean wajib" style="resize: none"></textarea>
                  </td>
                </tr>
                <tr>
                  <th>Telpon</th>
                  <td>
                    <input maxlength="20" type="text" name="telpon" class="telpon form-control form-control-sm clean wajib" data-toggle="tooltip" data-placement="right" title="Wajib Diisi" type="text">
                  </td>
                </tr>
                <tr>
                  <th>Email</th>
                  <td>
                    <input maxlength="50" type="text" name="email" class="email form-control form-control-sm clean">
                  </td>
                </tr>
                <tr>
                  <th>Keterangan</th>
                  <td>
                    <textarea type="text" name="keterangan" class="keterangan form-control form-control-sm clean" style="resize: none"></textarea>
                  </td>
                </tr>
                <tr>
                  <th>Foto</th>
                  <td>
                    <input type="file" name="foto" class="dropify foto form-control form-control-sm clean">
                  </td>
                </tr>
              </table>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-gradient-primary simpan">Save Data</button>
        <button type="button" class="btn btn-gradient-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>