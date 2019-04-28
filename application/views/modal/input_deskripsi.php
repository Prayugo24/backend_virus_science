        <div id="input-deskripsi" class="modal fade" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Deskripsi</h4>
              </div>
              <div class="modal-body">
                <form id="myForm" action="<?php echo base_url().'index.php/admin/add_deskripsi'; ?>" method="post" class="form-horizontal">
                  <input type="hidden" name="id_deskripsi">

                  <div class="form-group">
                    <label for="nama_organ" class="label-control col-md-4">Nama Materi</label>
                    <div class="col-md-8">
                      <input type="text" name="nama_materi" class="form-control" required>
                    </div>
                  </div>

                  <div class="form-group">
                  <label for="id_kategori" class="label-control col-md-4">Kategori</label>
                    <div class="col-md-8">
                      <select type="number" name="id_kategori" class="form-control" required>
                       <option value="0">-PILIH-</option>
                       <?php foreach($data_kategori->result() as $rel):?>
                        <option value="<?php echo $rel->id_kategori;?>"><?php echo $rel->kategori;?></option>
                      <?php endforeach;?>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="deskripsi" class="label-control col-md-4">Deskripsi Materi</label>
                  <div class="col-md-8">
                    <!-- <input type="text" name="kategori" class="form-control" required> -->
                    <textarea type="textarea" name="deskripsi" class="form-control" maxlength="870" required></textarea>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                <button type="submit" id="btnSave" class="btn btn-primary">Simpan</button>
              </div>
            </form>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->